<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="/">Онлайн навчання ДПЗС</a></li>                   
            <li class="active">Редагування тесту</li>
        </ol> 

        <h1>Додати питання</h1>
        <hr/>

        <?php echo validation_errors(); ?>

        <form class="form-horizontal" method="post" action="/tests/create/<?php echo $id; ?>">

        	<div class="form-group">
        		<label class="col-sm-2 control-label">Питання</label>        
                <div class="col-sm-10">
                	<input type="text" name="question" class="form-control">            
                </div>
            </div>
            <hr/>	

        	<div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Додати</button>
                </div>
            </div>
        </form>

    </div>
</div>