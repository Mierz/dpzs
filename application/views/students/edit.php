<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
          <li><a href="/">Онлайн навчання ДПЗС</a></li>       
          <li><a href="/students">Перелік студентів</a></li>
          <li class="active">Реєстрація нового</li>
        </ol> 

        <h1>Редагувати інформацію про студента</h1>
        <hr/>

        <?php echo validation_errors(); ?>

        <form class="form-horizontal" method="post" action="/students/edit/<?php echo $id; ?>">

            <div class="form-group">
                <label class="col-sm-2 control-label">Ім'я</label>        
                <div class="col-sm-10">
                    <input type="text" name="firstname" class="form-control" value="<?php echo $profile[0]->firstname; ?>">            
                </div>                
            </div>
            <hr/>

            <div class="form-group">
                <label class="col-sm-2 control-label">Прізвище</label>        
                <div class="col-sm-10">
                    <input type="text" name="lastname" class="form-control" value="<?php echo $profile[0]->lastname; ?>">            
                </div>                
            </div>
            <hr/>

            <div class="form-group">
                <label class="col-sm-2 control-label">Номер групи</label>        
                <div class="col-sm-2">
                    <select class="form-control" name="groupnum">
                    <?php
                    foreach($groups as $group) {
                        echo '<option value='.$group->num.'>'.$group->num.'</option>';
                    }
                    ?>
                    </select>            
                </div>                
            </div>
            <hr/>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Змінити</button>
                </div>
            </div>

        </form>

    </div>
</div> 