<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
          <li><a href="/">Онлайн навчання ДПЗС</a></li>                 
          <li class="active">Проходження тесту</li>
        </ol> 

        <div class="lecture_num" style="display: none;"><?php echo $id; ?></div>

        <script id="item_template" type="text/x-jsrender">
      <h1>{{:title}}</h1>
      <h3>{{:item.question}}</h3> 
      {{for item.options}}
        <div class="radio">
          <label>
            <input type="radio" class="question" name="optionsRadios" value="{{:id}}">
            {{:text}}
          </label>
        </div>
      {{/for}}
      <div class="error_wrapper"></div>
      <button class="next_btn btn btn-success" rel="{{:num_question}}">Next</button>
      <div class="progress" style="margin-top: 15px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{:procent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{:procent}}%">
          <span class="sr-only">{{:procent}}% Complete</span>
        </div>
      </div>
    </script>
    <script id="correct_answer" type="text/x-jsrender">
      <h1>Ваша оцінка: {{:correct_answ}}</h1>
      <p><a href="/" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span> Завершити тест</a></p>
    </script>

	    <div class="cont">

    	</div>

    </div>
</div>