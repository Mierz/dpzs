<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
          <li><a href="/">Онлайн навчання ДПЗС</a></li>                 
          <li class="active"><?php echo $lectures[0]->title; ?></li>
        </ol> 

        <h1><?php echo $lectures[0]->title; ?></h1>
        <hr/>

        <div style="font-size: 10px; margin-bottom: 15px;">
            <span class="glyphicon glyphicon-time"></span> <?php echo $this->Lectures_model->get_date_format($lectures[0]->date_create); ?>
        </div>

        <?php echo $lectures[0]->text; ?>

		<div class="well" style="margin-top: 20px;">
            <a class="btn btn-success" href="/students/testing/<?php echo $lectures[0]->id; ?>">Пройти тестування</a>
        </div>
    </div>
</div>