<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

  public function getAll()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }
  public function update()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role');
        $this->db->where('id', $id)->update('user_role', ['role' => $role]);
    }

}

/* End of file ModelName.php */
