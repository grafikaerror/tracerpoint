<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

   public function index()
   {
      $data['title'] = 'My Profile';
      $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/index', $data);
      $this->load->view('templates/footer', $data);
      
   }

   public function edit()
   {
      $data['title'] = 'Edit Profile';
      $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
      
      
      if ($this->form_validation->run() == false) {
         
         $this->load->view('templates/header', $data);
         $this->load->view('templates/navbar', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('user/edit', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $name = $this->input->post('name');
         $email = $this->input->post('email');

         // Jika ada gambar yang di upload
         $upload_image = $_FILES['image']['name'];
         

         if($upload_image){
            $config['upload_path']     = './assets/img/profile/';
            $config['allowed_types']   = 'gif|jpg|png';
            $config['encrypt_name']    = TRUE;
            $config['image_width']   = 100;
            $config['image_height']   = 100;

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')){
               $old_image =  $data['user']['image'];

               if ($old_image != 'default.jpg') {
                  unlink(FCPATH . 'assets/img/profile/' . $old_image);
               }

               $new_image = $this->upload->data('file_name');
               
               $this->db->set('image',$new_image);
            }else{
               echo $this->upload->display_errors();
            }
         }

         $this->db->set('name',$name);
         $this->db->where('email', $email);
         $this->db->update('user');
         
         $this->session->set_flashdata('message',' Update');
         
         redirect('user','refresh');
         
      }
      
   }

   public function changePassword()
   {
      $data['title'] = 'Change Password';
      $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

      // $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
      $this->form_validation->set_rules('newPassword', 'New Password', 'trim|required|min_length[4]|matches[confirmPassword]');
      $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|min_length[4]|matches[newPassword]');
      
      
      if ($this->form_validation->run() == false) {
         
         $this->load->view('templates/header', $data);
         $this->load->view('templates/navbar', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('user/changepassword', $data);
         $this->load->view('templates/footer', $data);
         
      } else {
         $current_password = $this->input->post('currentPassword');
         $new_password = $this->input->post('newPassword');
         if (!password_verify($current_password, $data['user']['password'])) {
            $this->session->set_flashdata('error','Wrong current password!');
            // echo 'error 1';
            redirect('user/changepassword','refresh');
            
         }else{
            if($current_password == $new_password){
            $this->session->set_flashdata('error','New password cannot be the same as current password');
            // echo 'error 2';

            redirect('user/changepassword','refresh');

            }else{
               $password_hash = password_hash($new_password,PASSWORD_DEFAULT);
               
               $this->db->set('password',$password_hash);
               $this->db->where('email', $this->session->userdata('email'));
               $this->db->update('user');
               
               $this->session->set_flashdata('message',' Changed !');

               redirect('user/changepassword','refresh');
   
            }
         }
      }
      
      
   }
   public function uploadCv()
   {
      $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

      $config['upload_path']          = './assets/cv/';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 0;
      $config['encrypt_name']         = TRUE;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('cv'))
      {
         $error = array('error' => $this->upload->display_errors());
         print_r($error);
         // $this->load->view('jobinfo/profile', $error);
      }
      else
      {
         $old_cv =  $data['user']['cv'];

         if ($old_cv != null) {
            unlink(FCPATH . 'assets/cv/' . $old_cv);
         }
         $id = $this->input->post('id');
        
         $cv = $this->upload->data('file_name');
               
         $this->db->set('cv',$cv);
         $this->db->where('id', $id);
         $this->db->update('user');
         
         redirect('jobinfo/profile','refresh');
         
      }
   }
   public function user_profile()
   {
      $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "jobinfo" ')->result_array();
      $user = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
      $id_user = $user['id'];
      $data['user'] = $user;
      $data['title'] = 'Profile';
      $this->load->view('guest/templates/header', $data);
      $this->load->view('jobinfo/profile', $data);
      $this->load->view('guest/templates/footer', $data);
   }
}

/* End of file User.php */
