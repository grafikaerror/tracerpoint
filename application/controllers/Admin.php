<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Role_model');


    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->query('SELECT * FROM user_role ORDER BY user_role.id ASC ')->result_array();
        
        $this->form_validation->set_rules('role', 'Role', 'required');

        
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->db->insert('user_role', ['role' => htmlspecialchars($this->input->post('role',true))]);
            $this->session->set_flashdata('message',' Added!');
            redirect('admin/role','refresh');
        }
    }
    
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id = '$role_id' ORDER BY user_role.id ASC ")->row_array();

        $this->db->where('id !=',1);
        
        $data['menu'] = $this->db->get('user_menu')->result_array();
        

        $this->form_validation->set_rules('role', 'Role', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
            
        ];

        $result = $this->db->get_where('user_access_menu',$data);
        
        if($result->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        }else {
            $this->db->delete('user_access_menu',$data);
        }

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Access change</div>');

    }

    public function deleteRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->db->where('role_id', $id);
        $this->db->delete('user_access_menu');
        $this->session->set_flashdata('message',' Deleted !');

        redirect('admin/role','refresh');
    }

    
    public function roleEdit($id)
    {
        $data['title'] = 'Role Edit';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->Role_model->getById($id);
        
        $this->form_validation->set_rules('role', 'Role', 'required');

        
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/role-edit', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->Role_model->update();

            $this->session->set_flashdata('message',' Added!');
            redirect('admin/role');
        }
    }

    public function blog()
    {
        $data['title'] = 'Blog';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['blog'] = $this->db->get('blog')->result_array();
        
        $this->form_validation->set_rules('title', 'Title', 'required');

        
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/blog', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title',TRUE)),
                'content' => $this->input->post('content',TRUE),
                'date_created' => time(),
            ];
            $this->db->insert('blog', $data);
            $this->session->set_flashdata('message',' Added!');
            redirect('admin/blog','refresh');
        }
    }

}

/* End of file Admin.php */
