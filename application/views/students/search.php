<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li><a href="/students">Перелік студентів</a></li>
		  <li class="active">Пошук студента</li>
		</ol> 

		<h1>Результат: <i><?php echo $value; ?></i></h1>
		<hr/>

		<?php if(!empty($results)) : ?>
		<table class="table table-striped table-bordered table-hover">
            <tr>
            	<th>#</th>                
                <th class="col-md-10">ПІБ</th>                
                <th class="col-md-1">Група</th>
                <th class="col-md-1"></th>
            </tr>
			<?php

			foreach($results as $student)
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

        <?php else: ?>
        	<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Результатів пошуку немає...</div>
        <?php endif; ?>

		
	</div>
</div>