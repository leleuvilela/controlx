<div id="login-page" class="row">
  <div class="col s12 z-depth-4 card-panel">
    <?php if(isset($already_installed) && $already_installed) { ?>
    Simple Task Board has already been installed.
    <?php } else { ?>
    <?php if(isset($already_installed) && !$already_installed) { echo form_open('install/run'); }
          else { echo form_open('login/validate'); } ?>
      <div class="row">
        <div class="input-field col s12 center">
          <img src="<?php echo base_url(); ?>images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
          <p class="center login-form-text">Conexão Propaganda</p>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="mdi-social-person-outline prefix"></i>
            <?php echo form_input('email', $email, array('id' => 'email')); ?>
            <?php echo form_label('Email', 'email', array('class' => 'center-align')); ?>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="mdi-action-lock-outline prefix"></i>
            <?php echo form_password('password', $password, array('id' => 'password')); ?>
            <?php echo form_label('Password', 'password', array('class' => 'center-align')); ?>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12 l12  login-text">
          <input type="checkbox" id="lembrar" />
          <label for="lembrar">Lembrar de mim</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <?php if(isset($already_installed) && !$already_installed) { echo '<button class="btn waves-effect waves-light col s12" type="submit">Instalar</button>'; }
                else { echo '<button class="btn waves-effect waves-light col s12" type="submit">Entrar</button>'; } ?>
        </div>
      </div>
      <div class="row">
        <?php if(isset($error) && $error) { ?>
        <p class="error">Algo está errado. Cheque suas informações.</p>
        <?php } ?>
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small"><a href="#">Esqueci a Senha</a></p>
        </div>
      </div>
    <?php echo form_close(); ?>
    <?php } ?>
  </div>
</div>