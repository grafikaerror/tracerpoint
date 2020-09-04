<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobinfo extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
  public function index()
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "jobinfo" ')->result_array();
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    if ($data['user']['agency'] == empty(1)) {
      
      redirect('jobhunter','refresh');
      
    }
    $data['title'] = 'Dashboard';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('jobinfo/index', $data);
    $this->load->view('guest/templates/footer', $data);
    
  }
  public function post()
  {
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    if ($data['user']['agency'] == empty(1)) {
      
      redirect('jobhunter','refresh');
      
    }
    $one_day = 60 * 60 * 24;
    $day=$this->input->post('day');
    $all = ($one_day * $day);
    $data = [
      'id_user' => $data['user']['id'],
      'content' => $this->input->post('content',TRUE),
      'date_upload' => time() + $all,
    ];
    $this->db->insert('user_vacancy', $data);
    $this->session->set_flashdata('message',' Added!');
    redirect('jobinfo/profile','refresh');
    
  }
  public function talent()
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "jobinfo"')->result_array();
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['alluser'] = $this->db->query("SELECT * FROM user_data INNER JOIN user ON user_data.email = user.email WHERE user.is_active=1 AND user.agency='' ORDER BY user.id DESC LIMIT 6")->result_array();
    $data['title'] = 'Talent';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('jobinfo/talent', $data);
    $this->load->view('guest/templates/footer', $data);

  }
  public function profile($username)
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "jobinfo" ')->result_array();

    $user = $this->db->get_where('user',['username' => $username])->row_array();

    $any_user = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $id_user = $any_user['id'];
    $email_user = $user['email'];
    $user_data = $this->db->query("SELECT * FROM user_data WHERE email = '$email_user'")->row_array();
    // var_dump($user_data);die;
    $data['user_data'] = $user_data;

    $data['user']= $any_user;
    $data['title'] = 'Profile';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('jobinfo/profile', $data);
    $this->load->view('guest/templates/footer', $data);
  }

}

/* End of file Jobinfo.php */
