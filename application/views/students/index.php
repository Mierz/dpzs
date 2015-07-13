<div class="row">
    <div class="col-md-12">

    	<ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li class="active">Перелік студентів</li>
		</ol> 

		<h1><a title="Додати нового студента" href="/auth/register" class="btn btn-success pull-right btn-xs"><span class="glyphicon-plus"></span> Додати студента</a> Перелік студентів</h1>
		<hr/>

		<form class="form-inline" action="/students/search" method="get">
			<div class="form-group form-group-sm" >			    
			    <div class="input-group ">						    
			      	<input type="text" class="form-control" name="value" maxlength="30" placeholder="Знайти студента..." autocomplete="off">			      				      	
			    </div>
			    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
		  	</div>
		  	
		</form><br/>
		
		<?php if(!empty($students)) : ?>
		<table class="table table-striped table-bordered table-hover">
            <tr>
            	<th>#</th>                
                <th class="col-md-10">ПІБ</th>                
                <th class="col-md-1">Група</th>
                <th class="col-md-1"></th>
            </tr>
			<?php

			foreach($students as $student)
			{
				if($student->id != 1) {
			?>
			<tr>
				<td><?php echo $student->id; ?></td>
				<td><a href="/students/view/<?php echo $student->id; ?>"><?php echo $this->Students_model->get_username($student->id); ?></a></td>							
				<td><?php echo $this->Students_model->get_group($student->id); ?></a></td>							
				<td>
					<div class="pull-right">
						<button data-toggle="tooltip" title="Редагувати" class="btn btn-link btn-xs" onclick="location.href='/students/edit/<?php echo $student->id; ?>'"><span class="glyphicon glyphicon-pencil"></span></button>
						<button data-toggle="tooltip" title="Видалити" onclick="destroy('/students/delete/<?php echo $student->id; ?>', 'students')" class="btn btn-link btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
					</div>
				
				</td>
			</tr>
			<?php	
			} }
			?>
		</table>
		<?php else : ?>
			<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Студентів немає... <a href="/auth/register">Додайте</a></div>
		<?php endif; ?>

		<?=$this->pagination->create_links();?>
	</div>
</div>