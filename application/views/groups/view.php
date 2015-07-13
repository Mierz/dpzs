<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li><a href="/groups/">Перелік груп</a></li>
		  <li class="active">Успішність групи: <?php echo $num; ?></li>
		</ol> 

		<h1>Успішність групи: <?php echo $num; ?></h1>
		<hr/>
		
		<?php if(isset($students)) : ?>

		<table class="table table-striped table-bordered table-hover" border="0">
            <tr>
            	<th>#</th>
                <th class="col-md-10">ПІБ</th>    
                <th class="col-md-1">Здано</th>                
                <th class="col-md-1">Залишилось</th>                
            </tr>            
            <?php
            foreach ($students as $student) {
            	$ost = $this->Lectures_model->record_count() - ($this->Students_model->count_progress($student->id));


            	echo '<tr>
            		<td>'.$student->id.'</td>
            		<td>'.$student->firstname.' '.$student->lastname.'</td>
            		<td>'.$this->Students_model->count_progress($student->id).'</td>
            		<td>'.$ost.'</td>
            	</tr>';
            }
			?>			
		</table>
		<?php else : ?>		
			<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Студентів в групі немає...</div>
		<?php endif; ?>
	</div>
</div>