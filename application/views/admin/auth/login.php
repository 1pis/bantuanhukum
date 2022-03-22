
  <div class="login-box">
    <div class="login-logo">
    <h1><?php echo lang('login_heading');?></h1>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><?php echo lang('login_subheading');?></p>

        <?php //$this->load->view('admin/partials/_messages.php') ?>
        <div id="infoMessage"><?php echo $message;?></div>
        
        <?php echo form_open(base_url('admin/auth/login'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <!-- <input type="text" name="username" id="name" class="form-control" placeholder="Username" > -->
            <?php //echo lang('login_identity_label', 'identity');?>
            <?php echo form_input($identity,null,['class'=>'form-control','placeholder'=>'Email/ Username']);?>

          </div>
          <div class="form-group has-feedback">
            <!-- <input type="password" name="password" id="password" class="form-control" placeholder="Password" > -->
            <?php //echo lang('login_password_label', 'password');?>
            <?php echo form_input($password,null,['class'=>'form-control','placeholder'=>'Password']);?>

          </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck">

                <?php echo lang('login_remember_label', 'remember');?>
                <?php echo form_checkbox('remember', '1', false, 'id="remember"');?>

                <!--
                <label>
                  <input type="checkbox"> Remember Me
                </label>
                -->

              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
            </div>
            <!-- /.col -->
          </div>
        <?php echo form_close(); ?>

        <p class="mb-1">
          <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
        </p>

        <!--
        <p class="mb-0">
          <a href="<?php //base_url('admin/auth/register'); ?>" class="text-center">Register a new membership</a>
        </p>
        -->

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
          