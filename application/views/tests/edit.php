<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="/">Онлайн навчання ДПЗС</a></li>                   
            <li class="active">Редагування питань</li>
        </ol> 


        <h1>Відповіді</h1>
        <hr/>
        <?php
        if(empty($answers)) {
            echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Відповідей немає</div>';
        } else {
            echo '<table class="table table-striped table-bordered table-hover">';
            foreach($answers as $answer) {        
                echo '<tr><td class="col-md-12">' . $answer->text . '</td><td><button class="btn btn-link btn-xs" data-toggle="tooltip" title="Видалити" onclick="destroy(\'/tests/delete/'. $answer->id .'/answer\', \'tests/edit/' . $id . '\')"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
            }
            echo '</table>';
        }
        ?>


        <div class="well">

            <h4>Додати</h4>

            <?php echo validation_errors(); ?>

            <form class="form-horizontal" method="post" action="/tests/edit/<?php echo $id; ?>">

            	<div class="form-group">
            		<label class="col-sm-2 control-label">Відповідь</label>        
                    <div class="col-sm-10">
                    	<input type="text" name="text" class="form-control">            
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Вірна?</label>        
                    <div class="col-sm-2">
                        <select name="true" class="form-control">
                            <option value="0">Ні</option>
                            <option value="1">Так</option>
                        </select>
                    </div>
                    
                </div>

            	<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Додати</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>