<div class="row">
    <div class="col-md-12">
        
        <ol class="breadcrumb">
          <li><a href="/">Онлайн навчання ДПЗС</a></li>       
          <li class="active">Перелік лекцій</li>
        </ol>

        <h1>Лекції</h1>
        <hr/>

        <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Доступні</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Пройдені</a></li>    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="home">
      
    <?php
        if(empty($lectures)) {
            echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Доступних лекцій немає...</div>';
        } else {
        ?>
        <table class="table table-striped table-bordered table-hover" style="margin-top: 20px;">
        <tr>
            <th style="width: 35px;">#</th>
            <th class="col-md-12">Назва лекції</th>
        </tr>
        <?php
        foreach ($lectures as $lecture) {
            echo '<tr><td>'.$lecture["id"].'</td><td><a href="/students/lecture/'.$lecture["id"].'">'.$lecture["title"].'</a></td></tr>';
        }
        echo '</table>';
        } 
    ?>  

  </div>
  <div role="tabpanel" class="tab-pane fade" id="profile">
      
     <?php
        if(empty($progress)) {
            echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Пройдених лекцій немає...</div>';
        } else {
        ?>
        <table class="table table-striped table-bordered table-hover" style="margin-top: 20px;">
        <tr>
            <th  style="width: 35px;">#</th>
            <th class="col-md-12">Назва лекції</th>
        </tr>
        <?php
        foreach ($progress as $lecture) {            
            echo '<tr><td>'.$lecture["id"].'</td><td>'.$lecture["title"].'</td></tr>';
        }
        echo '</table>';
        } 
    ?>  

  </div>  
</div>

</div>
    		
          
    </div>
</div>