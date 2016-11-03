<aside id="left-sidebar-nav">
  <ul id="slide-out" class="side-nav fixed leftside-navigation">
    <li class="user-details cyan darken-2">
      <div class="row">
          <div class="col col s4 m4 l4">
              <img src="<?php echo base_url(); ?>images/profile-default.jpg" alt="" class="circle responsive-img valign profile-image">
          </div>
          <div class="col col s8 m8 l8">
              <ul id="profile-dropdown" class="dropdown-content">
                  <li><a href="#"><i class="mdi-action-face-unlock"></i> Perfil</a>
                  </li>
                  <li><a href="#"><i class="mdi-action-settings"></i> Config.</a>
                  </li>
                  <li><a href="exec_logoff.php"><i class="mdi-hardware-keyboard-tab"></i> Sair</a>
                  </li>
              </ul>
              <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown" >Administrador<?php //echo limitaTexto($_SESSION["strNomeUsuario"], 18); ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
              <p class="user-roal">admin@admin.com
              <?php
                //echo limitaTexto($_SESSION["strLoginUsuario"], 20);
              ?></p>
          </div>
      </div>
    </li>
    <li class="bold"><a href="#/" class="waves-effect waves-cyan"><i class="mdi-action-home"></i> Home</a></li>
    <li class="bold"><?php echo anchor('#/items', '<i class="mdi-action-home"></i> Adicionar Item', 'class="waves-effect waves-cyan"'); ?></li>
    <li class="bold"><?php echo anchor('login/logout', '<i class="mdi-action-home"></i> Logout', 'class="waves-effect waves-cyan"'); ?></li>
  </ul>
  <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
</aside>