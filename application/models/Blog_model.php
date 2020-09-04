<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

  public function getBlog($limit, $start)
  {

    return $this->db->get('blog',$limit,$start)->result_array();
  }

  public function countAll()
  {
    return $this->db->get('blog')->num_rows();
  }

}

/* End of file Blog_model.php */
