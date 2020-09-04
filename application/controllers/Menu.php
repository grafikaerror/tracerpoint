<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->query('SELECT * FROM user_menu ORDER BY user_menu.id ASC ')->result_array();
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => htmlspecialchars($this->input->post('menu',true))]);
            $this->session->set_flashdata('message',' Added!');
            
            redirect('menu','refresh');
        }
        

    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->db->query('SELECT
                                                user_menu.menu, 
                                                user_sub_menu.id, 
                                                user_sub_menu.title, 
                                                user_sub_menu.url, 
                                                user_sub_menu.icon, 
                                                user_sub_menu.is_active
                                            FROM
                                                user_menu
                                                INNER JOIN
                                                user_sub_menu
                                                ON 
                                                    user_menu.id = user_sub_menu.menu_id
                                                    ORDER BY user_sub_menu.id ASC')->result_array();
        
        $data['menu'] =  $this->db->get_where('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        // $this->form_validation->set_rules('icon', 'Icon', 'required');

        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title',TRUE)),
                'menu_id' => htmlspecialchars($this->input->post('menu_id',TRUE)),
                'url' => htmlspecialchars($this->input->post('url',TRUE)),
                'icon' => htmlspecialchars($this->input->post('icon',TRUE)),
                'is_active' => htmlspecialchars($this->input->post('is_active',TRUE)),
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message',' Added!');
            
            redirect('menu/submenu','refresh');
            
        }

    }

    public function editMenu($id)
    {
        // Example
        $data = array(
            'title' => $title,
            'name' => $name,
            'date' => $date
        );
        
        $this->db->where('id', $id);
        $this->db->update('mytable', $data);

    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message',' Deleted !');

        redirect('menu','refresh');
    }

    public function editSubMenu($id)
    {
        // Example
        // $data = arraysub_(
        //     'title' => $title,
        //     'name' => $name,
        //     'date' => $date
        // );
        
        // $this->db->where('id', $id);
        // $this->db->update('mytable', $data);

    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message',' Deleted !');

        redirect('menu/submenu','refresh');
    }

}

/* End of file Menu.php */
