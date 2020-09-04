<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_developer extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Web Developer';
        $data['queryNav'] = $this->db->query('SELECT * FROM user_sub_menu INNER JOIN user_menu ON  user_sub_menu.menu_id = user_menu.id WHERE user_menu.menu = "guest" ')->result_array();
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('guest/templates/header',$data);
        $this->load->view('web-developer/index',$data);
        $this->load->view('guest/templates/footer',$data);
    }

}

/* End of file Web_development.php */
