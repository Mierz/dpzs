<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
          <li><a href="/">Онлайн навчання ДПЗС</a></li>       
          <li><a href="/lectures">Перелік лекцій</a></li>
          <li class="active"><?php echo $lectures[0]->title; ?></li>
        </ol> 

        <h1><a title="Видалити лекцію" style="margin-left: 10px;" href="#" onclick="destroy('/lectures/delete/<?php echo $lectures[0]->id; ?>')" class="btn btn-danger pull-right btn-xs"><span class="glyphicon glyphicon-remove"></span> Видалити</a> <a title="Редагувати лекцію" href="/lectures/edit/<?php echo $lectures[0]->id; ?>" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-pencil"></span> Редагувати</a> <?php echo $lectures[0]->title; ?></h1>
        <hr/>

        <div style="font-size: 10px; margin-bottom: 15px;">
            <span class="glyphicon glyphicon-time"></span> <?php echo $this->Lectures_model->get_date_format($lectures[0]->date_create); ?>
        </div>

        <?php echo $lectures[0]->text; ?>

        

		<div class="well" style="margin-top: 20px;">
        <?php
        if($test) {
        	echo '<a href="/tests/view/'.$lectures[0]->id.'" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Редагувати тестові питання</a>';
        } else {
        	echo '<a href="/tests/view/'.$lectures[0]->id.'" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Додати тестові питання</a>';
        }
        ?>
        </div>
    </div>
</div>




