<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li><a href="/lectures">Перелік лекцій</a></li>
		  <li class="active">Пошук матеріалу</li>
		</ol> 

		<h1>Результат: <i><?php echo $value; ?></i></h1>
		<hr/>

		<?php if(!empty($results)) : ?>
		<table class="table table-striped table-bordered table-hover" border="0">
            <tr>
            	<th>#</th>
            	<th></th>             
                <th class="col-md-9">Назва лекції</th>                   
                <th class="col-md-2">Дата створення</th>
                <th class="col-md-1"></th>
            </tr>
            <?php
			foreach($results as $lecture)
			{				
				if($lecture->visible == 1) :
					$action = 'unvisible';
					$visible = '<span data-toggle="tooltip" title="Опубліковано" class="glyphicon glyphicon-eye-open"></span>';
				else:
					$action = 'visible';
					$visible = '<span data-toggle="tooltip" title="Опублікувати" class="glyphicon glyphicon-eye-close"></span>';
				endif;
			?>
			<tr>
				<td><?php echo $lecture->id; ?></td>
				<td><button onclick="location.href='/lectures/<?php echo $action; ?>/<?php echo $lecture->id; ?>'" class="btn btn-link btn-xs"><?php echo $visible; ?></button></td>
				<td><a href="/lectures/view/<?php echo $lecture->id ?>"><?php echo $lecture->title; ?></a></td>			
				<td><?php echo $this->Lectures_model->get_date_format($lecture->date_create); ?></td>
				<td>
					<div class="pull-right">
						<button data-toggle="tooltip" title="Редагувати" class="btn btn-link btn-xs" onclick="location.href='/lectures/edit/<?php echo $lecture->id; ?>'"><span class="glyphicon glyphicon-pencil"></span></button>
						<button data-toggle="tooltip" title="Видалити" onclick="destroy('/lectures/delete/<?php echo $lecture->id; ?>', 'lectures')" class="btn btn-link btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
					</div>
				</td>
			</tr>
			<?php	
			}
			?>
		</table>

        <?php else: ?>
        	<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Результатів пошуку немає...</div>
        <?php endif; ?>

		
	</div>
</div>