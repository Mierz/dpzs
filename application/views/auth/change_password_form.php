<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="/">Онлайн навчання ДПЗС</a></li>                   
            <li class="active">Змінити пароль</li>
        </ol> 

        <h1>Змінити пароль</h1>
        <hr/>

		<?php echo form_open($this->uri->uri_string()); ?>

		<div class="form-group">
		    <label for="old_password">Старий пароль</label>
		    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Введіть старий пароль">
		    <?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?>
	 	</div>
	 	<hr/>

	 	<div class="form-group">
		    <label for="old_password">Новий пароль</label>
		    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Введіть новий пароль">
		    <?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?>
	 	</div>
	 	<hr/>

	 	<div class="form-group">
		    <label for="old_password">Підтвердити пароль пароль</label>
		    <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Введіть ще раз новий пароль">
		    <?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>
	 	</div>
	 	<hr/>
		<?php echo form_submit(['value' => 'Зберегти', 'class' => 'btn btn-success']); ?>
		<?php echo form_close(); ?>
	</div>
</div>