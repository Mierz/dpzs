<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li><a href="/students">Перелік студентів</a></li>
		  <li class="active">Реєстрація нового</li>
		</ol> 

		<h1>Реєстрація нового студента</h1>
		<hr/>

		<?php echo form_open($this->uri->uri_string()); ?>
			
		<div class="form-group">
		    <label for="login">Ел. пошта</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Введіть ел.пошту">
		    <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
	 	</div>
	 	<hr/>

		<div class="form-group">
		   <label for="password">Пароль</label>    
		   <input type="password" class="form-control" name="password" size="30" id="password" placeholder="Пароль">
		   <?php echo form_error($password['name']); ?>
		</div> 
		<hr/>

		<div class="form-group">
		   <label for="password">Підтвердити пароль</label>    
		   <input type="password" class="form-control" name="confirm_password" size="30" id="confirm_password" placeholder="Пароль">
		   <?php echo form_error($confirm_password['name']); ?>
	 	</div> 
		<hr/>

		<div class="form-group">
			<div class="controls">
			<?php echo form_submit(['value' => 'Реєстрація', 'class' => 'btn btn-success']); ?>
			</div>
		</div>
	<?php echo form_close(); ?>

		
	</div>
</div>