<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets/')?>index3.html" class="brand-link navbar-light">
      <img src="<?= base_url('assets/')?>dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">WPU Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('user'); ?>" class="d-block"><?=$user['name']?></a>
        </div>
      </div>

      <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`,`menu`,`user_menu`.`icon`
                      FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                      WHERE `user_access_menu`.`role_id` = $role_id
                      ORDER BY `user_access_menu`.`menu_id` ASC
                      ";
        $menu = $this->db->query($queryMenu)->result_array();
      ?>




      <!-- Sidebar Menu -->
      <nav class="mt-2">  
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Lopping Menu -->
          <?php
            foreach ($menu as $m ):
          ?>
          <?php 
            $uri=$this->uri->segment(1);
          ?>
          <?php if ($m['menu']== $uri):?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
          <?php endif;?>
          <?php if ($m['menu']!= $uri):?>
            <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
          <?php endif;?>
              <i class="<?= $m['icon'] ?>"></i>
              <p class="text-capitalize">
                <?= $m['menu']?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <?php
            $menuId = $m['id'];
            $querySubMenu = "    SELECT *
                                  FROM `user_sub_menu` JOIN `user_menu` 
                                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                                  ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>
          <?php if ($m['menu']== $uri):?>
            <ul class="nav nav-treeview" style="display: block;">
          <?php endif;?>
          <?php if ($m['menu']!= $uri):?>
            <ul class="nav nav-treeview" style="display: none;">
          <?php endif;?>
            <?php foreach($subMenu as $sm):?>
              <li class="nav-item">
              <?php if ($title == $sm['title']):?>
                <a href="<?= base_url($sm['url'])?>" class="nav-link active">
                <?php else:?>
                  <a href="<?= base_url($sm['url'])?>" class="nav-link">
              <?php endif;?>
                  <i class="far fa-circle nav-icon"></i>
                  <?= $sm['title']?>
                </a>
              </li>
              <?php endforeach;?>
            </ul>
          </li>
        <?php endforeach;?>
      
          
          
          
          


          

          <li class="nav-item">
            <a href=" <?= base_url('auth/logout')?> " class="nav-link" data-toggle="modal" data-target="#modal-default">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ready to Leave</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Select "Logout" bellow if you are ready to end your current session.</p>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url('auth/logout')?>"  class="btn btn-danger">Logout</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->