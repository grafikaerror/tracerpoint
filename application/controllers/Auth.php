<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    
    public function index()
    {

      if ($this->session->userdata('email')) {
        if($this->session->userdata('role_id')==1){
          
          redirect('admin');
        }else if($this->session->userdata('role_id')==3){

          
          redirect('blog','refresh');
        }else{
          $user = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
          $id_user = $user['id'];
          $vacancy = $this->db->query("SELECT * FROM user_vacancy WHERE id_user = $id_user")->row_array();
  
          if($user['agency'] == empty(1)){
                    
            redirect('jobhunter','refresh');
            
          }else{
            if ($vacancy == empty(1)) {
              redirect('jobinfo','refresh');
            }else{
              redirect('jobinfo/profile');
            }
          }
        }
      }

      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      
      
      if ($this->form_validation->run() == false) {
          
          $data['title'] = 'Login';
          $this->load->view('templates/auth_header',$data);
          $this->load->view('auth/login');
          $this->load->view('templates/auth_footer');

      } else {
          $this->_login();
      }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];
        $vacancy = $this->db->query("SELECT * FROM user_vacancy WHERE id_user = $id_user")->row_array();

        if ($user) {
            #Jika usernya aktif
            if ($user['is_active'] == 1) {
              # cek password
              if (password_verify($password,$user['password'])) {
                $data = [
                  'email' => $user['email'],
                  'role_id' => $user['role_id']
                ];
                $this->session->set_userdata( $data );
                
                if ($user['role_id'] == 1) {
                  
                  redirect('admin','refresh');
                  
                }else if($user['role_id'] == 3){

                  redirect('blog','refresh');

                }else{
                  if($user['agency'] == empty(1)){
                    
                    redirect('jobhunter','refresh');
                    
                  }else{
                    if ($vacancy == empty(1)) {
                      redirect('jobinfo','refresh');
                    }else{
                      redirect('jobinfo/profile');
                    }
                  }
                }
                
              }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>"');
          
                redirect('auth','refresh');      
              }
            }else{
              $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This email has not been activated!</div>"');
          
              redirect('auth','refresh');    
            }
        }else{
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>"');
          
          redirect('auth','refresh');
        }
    }

    public function registration()
    {
      if ($this->session->userdata('email')) {
        if($this->session->userdata('role_id')==1){
          
          redirect('admin');
        }else{
          
          redirect('user');
          
        }
      }

      $this->form_validation->set_rules('name','Name', 'trim|required');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash|is_unique[user.username]',[
        'is_unique' => 'This username has already registered!'
      ]);
      
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',[
        'is_unique' => 'This email has already registered!'
        ]);
      $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]',[
        'matches' => 'Password dont match!',
          'min_length' => 'Password to short!'
      ]);
      $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]',[
        'matches' => 'Password dont match!'
      ]);
            
      if($this->form_validation->run() == false){
          $data['title'] = 'Registration';
          $this->load->view('templates/auth_header',$data);
          $this->load->view('auth/registration');
          $this->load->view('templates/auth_footer');
      }else{
        $email = $this->input->post('email',true);
          $data = [
              'name' => htmlspecialchars($this->input->post('name',true)),
              'username' => htmlspecialchars($this->input->post('username',true)),
              'email' => htmlspecialchars($email),
              'image' => 'default.jpg',
              'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
              'agency' => htmlspecialchars($this->input->post('agency',true)),
              'role_id' => 2,
              'is_active' => 0,
              'date_created' => time()
          ];
          
          // Siapkan Token
          $token = base64_encode(random_bytes(32));
          $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time(),
          ];
          $this->db->insert('user', $data);
          $this->db->insert('user_token', $user_token);
          $this->_sendEmail($token,'verify');
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account!</div>');
          
          redirect('auth','refresh');
            
        }
    }

    public function _sendEmail($token,$type)
    {
      $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'sicarorium@gmail.com',
        'smtp_pass' => 'aq089619',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
      ];

      $this->email->initialize($config);

      $this->email->from('sicarorium@gmail.com', 'Tracerpoint');
      $this->email->to($this->input->post('email'));

      if ($type == 'verify') {
        
        $this->email->subject('Account Verification');
        $this->email->message('Click this link to verify you account : <a href="'.base_url(). 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'">Active</a>');
      }elseif ($type == 'forgot') {
        $this->email->subject('Reset Password');
        $this->email->message('Click this link to reset your password : <a href="'.base_url(). 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'">Reset Password</a>');
      }

      if ($this->email->send()) {
        echo "berhasil";
      }else {
        echo $this->email->print_debugger();
        die;
      }
      
    }

    public function verify()
    {
      $email = $this->input->get('email');
      $token = $this->input->get('token');

      $user = $this->db->get_where('user',['email' => $email])->row_array();
      if ($user) {
        $user_token = $this->db->get_where('user_token',['token'=>$token])->row_array();

        if ($user_token) {
          if (time() - $user_token['date_created'] < (60*60*24)) {
            $this->db->set('is_active',1);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->db->delete('user_token',['email' => $email]);
            $object = array(
              'email' => $email
            );
            $this->db->insert('user_data', $object);
            
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$email.' has been activated! Please login.</div>');          
            redirect('auth','refresh');  
  
            
          } else {
            $this->db->delete('user', ['email' => $email]);
            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>"');          
            redirect('auth','refresh');    
          }
          
        } else {
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Token invalid.</div>"');          
          redirect('auth','refresh');  
        }
        
        
      } else {
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>"');          
        redirect('auth','refresh');  
      }
      
      
    }

    public function logout()
    {
      
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You has been logged out!</div>');
          
      redirect('auth','refresh');
    }

    public function blocked()
    {
      $this->load->view('auth/error');
      
    }

    public function forgotPassword()
    {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
          
      if ($this->form_validation->run() == false) {
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/forgot-password');
        $this->load->view('templates/auth_footer');  
        
      } else {
        $email = $this->input->post('email');
        $user = $this->db->get_where('user',['email' => $email,'is_active' => 1])->row_array();
        if ($user) {
          $token = base64_encode(random_bytes(32));
          $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time(),
          ];
          $this->db->insert('user_token', $user_token);
          $this->_sendEmail($token,'forgot');

          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>"');
          redirect('auth');
        } else {
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>"');  
          redirect('auth/forgotPassword','refresh');              
        }
        
      }
      
    }

    public function resetPassword()
    {
      $email = $this->input->get('email');
      $token = $this->input->get('token');

      $user = $this->db->get_where('user',['email'=>$email])->row_array();

      if ($user) {
        $user_token = $this->db->get_where('user_token',['token'=>$token])->row_array();
        if ($user_token) {
          
          $this->session->set_userdata('reset_email', $email );
          $this->changePassword();
          
        } else {
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>"');  
          redirect('auth','refresh');              
          }
        
      } else {
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>"');  
        redirect('auth','refresh');              
      }
      
    }
    public function changePassword()
    {
      if (!$this->session->userdata('reset_email')) {
        
        redirect('auth','refresh');
        
      }
      $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
      $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[4]|matches[password1]');
      
      if ($this->form_validation->run() == false) {
        $data['title'] = 'Change Password';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/change-password');
        $this->load->view('templates/auth_footer');  
        
      } else {
        $password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
        $email =  $this->session->userdata('reset_email');

        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
        
        $this->session->unset_userdata('reset_email');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>"');  
        redirect('auth','refresh');              
        
      }
    }
}

/* End of file Controllername.php */
