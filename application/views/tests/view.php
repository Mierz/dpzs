<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  	<li><a href="/">Онлайн навчання ДПЗС</a></li>	            
  		  	<li><a href="/lectures/view/<?php echo $lecture_href; ?>"><?php echo $lecture_title; ?></a></li>   
		  	<li class="active">Редагування тесту</li>
		</ol> 

		<h1><a title="Додати нове питання" href="/tests/create/<?php echo $id; ?>" class="btn btn-success pull-right btn-xs"><span class="glyphicon-plus"></span> Додати питання</a> Питання</h1>
        <hr/>

        <?php if(!empty($tests)) : ?> 
    	<table class="table table-striped table-bordered table-hover">    	
        <?php
        foreach($tests as $test) {
        	echo '<tr><td class="col-md-12"><a href="/tests/edit/'.$test->id.'">' . $test->question . '</a></td><td><button class="btn btn-link btn-xs" data-toggle="tooltip" title="Видалити" onclick="destroy(\'/tests/delete/'. $test->id .'/question\', \'tests/view/' . $id . '\')"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
        }
        ?>        
        </table>
        <?php else: ?>
            <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Питання відсутні...</div>
        <?php endif; ?>
    </div>
</div>