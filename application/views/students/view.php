<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li class="active">Перегляд успішності студента</li>
		</ol>

		<?php
		foreach ($profile as $user) {			
		?>
		<h1>Успішність студента: <?php echo $user->firstname ?> <?php echo $user->lastname ?> <small>Група <?php echo $user->groupnum; ?></small></h1>
		<hr/>
		<?php
		}
		?>

		<h2>Історія сеансів</h2>
		<hr/>
		<?php
		if(empty($activities)) :
			echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Історія сеансів не містить записів...</div>';
		else :
		?>
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Дата сеансу</th>
				<th>Час входу</th>
				<th>Час выходу</th>
			</tr>
		<?php
		foreach ($activities as $activity) {				
		?>		
			<tr>
				<td><?php echo $activity['date']; ?></td>
				<td><?php echo $activity['time_start']; ?></td>
				<td><?php echo $activity['time_end']; ?></td>
			</tr>		
		<?php
		} 
		echo '</table>';
		echo '<a href="#">Переглянути всю історію сеансів</a>';
		endif;
		?>

		<h2>Історія тестування</h2>
		<hr/>
		<?php
		if(empty($progress)) :
			echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Історія тестування не містить записів...</div>';
		else :
		?>
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>#</th>
				<th class="col-md-11">Лекція</th>
				<th class="col-md-1">Оцінка</th>
			</tr>					
		<?php
		foreach ($progress as $item) {			
		?>
		<tr>
			<td><?php echo $item->lecture_id; ?></td>		
			<td><?php echo $this->Lectures_model->get_lecture_title($item->lecture_id); ?></td>
			<td><?php echo $item->mark; ?></td>
		</tr>
		<?php
		} 
		echo '</table>';
		echo '<a href="#">Переглянути всю історію тестування</a>';
		endif;
		?>
	</div>

</div>