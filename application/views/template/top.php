<header id="header" class="page-topbar">
  <div class="navbar-fixed">
    <nav class="navbar-color">
      <div class="nav-wrapper">
        <ul class="left">
          <li><h1 class="logo-wrapper"><a href="#" class="brand-logo darken-1"><img src="<?php echo base_url(); ?>images/2.png" alt="control x logo"></a> <span class="logo-text">Materialize</span></h1></li>
        </ul>
        <div class="header-search-wrapper hide-on-med-and-down">
          <i class="mdi-action-search"></i>
          <input type="text" name="Search" class="header-search-input z-depth-2" placeholder=""/>
        </div>
        <ul class="right hide-on-med-and-down">
          <!-- <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown"><img src="<?php echo base_url(); ?>images/flag-icons/United-States.png" alt="USA" /></a></li> -->
          <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a></li>
          <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">1</small></i></a></li>
          <li><?php echo anchor('login/logout', '<i class="material-icons">power_settings_new</i>', 'class="waves-effect waves-block waves-light"'); ?></li>
        </ul>
        <!-- <ul id="translation-dropdown" class="dropdown-content">
          <li>
            <a href="#!"><img src="<?php echo base_url(); ?>images/flag-icons/United-States.png" alt="English" />  <span class="language-select">English</span></a>
          </li>
          <li>
            <a href="#!"><img src="<?php echo base_url(); ?>images/flag-icons/France.png" alt="French" />  <span class="language-select">French</span></a>
          </li>
          <li>
            <a href="#!"><img src="<?php echo base_url(); ?>images/flag-icons/China.png" alt="Chinese" />  <span class="language-select">Chinese</span></a>
          </li>
          <li>
            <a href="#!"><img src="<?php echo base_url(); ?>images/flag-icons/Germany.png" alt="German" />  <span class="language-select">German</span></a>
          </li>
        </ul> -->
        <ul id="notifications-dropdown" class="dropdown-content">
          <li><h5>NOTIFICAÇÕES <span class="new badge">1</span></h5></li>
          <li class="divider"></li>
          <li>
            <a href="#!"><i class="mdi-action-add-shopping-cart"></i> Esta é uma notificação</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>