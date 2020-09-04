<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function index()
    {
        $data['title'] = 'List Blog';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['blog'] = $this->db->get('blog')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('blog/blog', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function upload()
    {
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $config['upload_path']          = './assets/img/blog/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['encrypt_name']         = TRUE;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            print_r($error);
        }
        else
        {

            $upload_data = $this->upload->data();
            $name = $upload_data['file_name'];
            $data = [
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'image' => $name,
                'date_created' => time()
            ];
            $this->db->insert('blog', $data);
            $this->session->set_flashdata('message',' Added!');
            redirect('blog','refresh');
            
        }
    }

    public function deleteBlog($id)
    {
        $blog = $this->db->query("SELECT * FROM blog WHERE id = $id")->row_array();
        unlink(FCPATH . 'assets/img/blog/' . $blog['image']);
        $this->db->where('id', $id);
        $this->db->delete('blog');
        $this->session->set_flashdata('message',' Deleted !');

        redirect('blog','refresh');    
    }
    public function detailBlog($id)
    {

        $data['title'] = 'List Blog';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->db->query("SELECT * FROM blog WHERE id = $id")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('blog/detail-blog', $data);
        $this->load->view('templates/footer', $data);

    }

}

/* End of file Blog.php */
