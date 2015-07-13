<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form_control'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Ел.пошта чи логін';
} else if ($login_by_username) {
	$login_label = 'Логін';
} else {
	$login_label = 'Ел.пошта';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,	
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<div class="row">


	<div class="col-md-5 col-md-offset-4">
		<div class="well">
		
		<h4>Вхід в систему</h4>

		<?php echo form_open($this->uri->uri_string()); ?>
  <div class="form-group">
    <label for="login">Ел.пошта</label>
    <input type="email" class="form-control" id="login" name="login" placeholder="Введіть ел.пошту">
    <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
  </div>
  <div class="form-group">
    <label for="password">Пароль</label>    
    <input type="password" class="form-control" name="password" size="30" id="password" placeholder="Пароль">
    <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
  </div> 
  <div class="checkbox">
    <label>
      	<?php echo form_checkbox($remember); ?>
		<?php echo form_label('Запам\'ятати мене', $remember['id']); ?>
    </label>
  </div>
  <?php echo form_submit(['value' => 'Увійти', 'class' => 'btn btn-success']); ?>
  <div><?php echo anchor('/auth/forgot_password/', 'Забув пароль'); ?>	</div>
<?php echo form_close(); ?>


		</div>		
	</div>
	

</div>