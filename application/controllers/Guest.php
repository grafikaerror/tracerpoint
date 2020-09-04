<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
    if ($this->session->userdata('email')) {
      if($this->session->userdata('role_id')==2){
        
        redirect('user');
      }
    }
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();
    $data['post'] = $this->db->query('SELECT * FROM blog ORDER BY id DESC LIMIT 2')->result_array();
    $data['uri']=$this->uri->segment(1);
    $data['title'] = 'Home';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('guest/index', $data);
    $this->load->view('guest/templates/footer', $data);
    
  }

  public function blog()
  {
    $this->load->model('Blog_model','blog');

    // Pagination
    $this->load->library('pagination');
    // Configuration
    $root = "http://" .$_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    $config['base_url'] = $root.'/guest/blog/';
    $config['total_rows'] = $this->blog->countAll();
    $config['per_page'] = 6;
    $config['num_links'] = 2;

    $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul></nav>';
    
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['uri']=$this->uri->segment(3);
    $data['post'] = $this->blog->getBlog($config['per_page'],$data['uri']);
    $data['title'] = 'Blog';
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();

    $this->load->view('guest/templates/header', $data);
    $this->load->view('guest/blog', $data);
    $this->load->view('guest/templates/footer', $data);
  }

  public function blogDetail($id)
  {

    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Blog';
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();

    $this->load->view('guest/templates/header', $data);
    $this->load->view('guest/blog-detail', $data);
    $this->load->view('guest/templates/footer', $data);
  }
  public function features()
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

    $data['uri']=$this->uri->segment(1);
    $data['title'] = 'Features';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('guest/features', $data);
    $this->load->view('guest/templates/footer', $data);
  }
  public function about()
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

    $data['uri']=$this->uri->segment(1);
    $data['title'] = 'About';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('guest/about', $data);
    $this->load->view('guest/templates/footer', $data);
  }
  public function contact()
  {
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

    $data['uri']=$this->uri->segment(1);
    $data['title'] = 'Contact';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('guest/contact', $data);
    $this->load->view('guest/templates/footer', $data);
  }
  public function report()
  {
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();

    $data['uri']=$this->uri->segment(1);
    $data['title'] = 'Reporting';
    $this->load->view('guest/templates/header', $data);
    $this->load->view('guest/report', $data);
    $this->load->view('guest/templates/footer', $data);

  }
  public function sendEmail()
  {
    $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'tracerpointofficial@gmail.com',
      'smtp_pass' => 'Qwerty123!!!ABC',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $this->email->initialize($config);
    $this->email->from($this->input->post('email'), $this->input->post('name'));
    $this->email->to('tracerpointofficial@gmail.com');

    $this->email->subject('Report');
    $this->email->message($this->input->post('message'));
    if ($this->email->send()) {
      
      redirect('guest/report','refresh');
      
    }else {
      echo $this->email->print_debugger();
      die;
    }
  }

}

/* End of file Guest.php */
