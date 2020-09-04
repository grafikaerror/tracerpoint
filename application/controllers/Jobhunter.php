<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobhunter extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
  public function index()
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "jobhunter" ')->result_array();
    $data['vacancy'] = $this->db->query("SELECT * FROM user_vacancy ORDER BY user_vacancy.id DESC")->result_array();
    
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Vacancy';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('jobhunter/index', $data);
    $this->load->view('guest/templates/footer', $data);
  }

  public function profile($username)
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "jobhunter" ')->result_array();

    $user = $this->db->get_where('user',['username' => $username])->row_array();

    $any_user = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $id_user = $any_user['id'];
    $email_user = $user['email'];
    $user_data = $this->db->query("SELECT * FROM user_data WHERE email = '$email_user'")->row_array();
    // var_dump($user_data);die;
    $data['user_data'] = $user_data;

    $data['user'] = $user;
    $data['title'] = 'Profile';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('jobhunter/profile', $data);
    $this->load->view('guest/templates/footer', $data);
  }

  public function updateProfil()
  {
    $user = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

    $email_user = $user['email'];

    $data = array(
        'skill' => $this->input->post('skill'),
        'address' => $this->input->post('address'),
        'phone' => $this->input->post('phone')
    );

    $this->db->where('email', $email_user);
    $this->db->update('user_data', $data);
    
    redirect('jobhunter/profile','refresh');
    
  }

}

/* End of file Jobhunter.php */
