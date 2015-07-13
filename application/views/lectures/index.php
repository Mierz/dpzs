<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li class="active">Перелік лекцій</li>
		</ol> 

		<?php if(isset($message)) : ?>
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<span class="glyphicon glyphicon-ok"></span> <?php echo $message; ?>		
		</div>
		<?php endif; ?>

		<h1><a title="Додати нову лекцію" href="/lectures/create" class="btn btn-success pull-right btn-xs"><span class="glyphicon-plus"></span> Додати лекцію</a> Перелік лекцій</h1>
		<hr/>
		
		<form class="form-inline" action="/lectures/search" method="get">
			<div class="form-group form-group-sm" >			    
			    <div class="input-group ">						    
			      	<input type="text" class="form-control" name="value" maxlength="30" placeholder="Знайти матеріал..." autocomplete="off">			      				      	
			    </div>
			    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
		  	</div>
		  	
		</form><br/>

		<?php if(!empty($lectures)) : ?>
		<table class="table table-striped table-bordered table-hover" border="0">
            <tr>
            	<th>#</th>
            	<th></th>             
                <th class="col-md-9">Назва лекції</th>                   
                <th class="col-md-2">Дата створення</th>
                <th class="col-md-1"></th>
            </tr>
			<?php

			foreach($lectures as $lecture)
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
			<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Матеріалів немає... <a href="/lectures/create">Додайте</a></div>
		<?php endif; ?>

		<?=$this->pagination->create_links();?>
	</div>
</div>