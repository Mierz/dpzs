<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Ел.пошта чи логін';
} else {
	$login_label = 'Ел.пошта';
}
?>


<div class="row">


	<div class="col-md-5 col-md-offset-4">
		<div class="well">	
			<h4>Відновити доступ</h4>
			<div class="form-group">
			<?php echo form_open($this->uri->uri_string()); ?>
			    <label for="login"><?php echo form_label($login_label, $login['id']); ?></label>
			    <input type="email" class="form-control" id="login" name="login" size="30" maxlength="30" placeholder="Введіть ел.пошту">
			    <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
		  	</div>
		  	<?php echo form_submit(['value' => 'Відновити', 'class' => 'btn btn-success']); ?>
			<?php echo form_close(); ?>
		</div>

	</div>

</div>