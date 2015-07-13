<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="/">Онлайн навчання ДПЗС</a></li>       
            <li><a href="/lectures">Перелік лекцій</a></li>
            <li class="active">Створення нової</li>
        </ol>

        <h1>Додати лекцію</h1>
        <hr/>

        <?php echo validation_errors(); ?>

        <form class="form-horizontal" method="post" action="/lectures/create">

        	<div class="form-group">
        		<label class="col-sm-2 control-label">Заголовок</label>        
                <div class="col-sm-10">
                	<input type="text" name="title" class="form-control">            
                </div>
                <div class="col-sm-10">
                    
                </div>
            </div>
            <hr/>

        	<div class="form-group">
                <label class="col-sm-2 control-label">Лекція</label>  
                <div class="col-sm-10">
                    <textarea name="text" id="summernote"></textarea>
                </div>
                <div class="col-sm-10">
                    
                </div>
            </div>
            <hr/>

        	<div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Додати</button>
                </div>
            </div>

        </form>
        <script>
            $(document).ready(function () {
                $('#summernote').summernote({
                    height: 300,
                    minHeight: 300,
                    maxHeight: 500,
                    focus: true,
                });
            });
        </script>
    </div>
</div>