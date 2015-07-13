<!DOCTYPE html>
<html lang="uk">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <title><?php echo $title ?></title>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/summernote.css" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css" rel="stylesheet">

    <script src="/public/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>    
    
    <script src="/public/js/lodash.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/jsrender.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="/public/js/data_test.json" type="text/javascript" charset="utf-8"></script>-->
    <script src="/public/js/tests.js" type="text/javascript" charset="utf-8"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>        
        body {
          padding-top: 80px;
        }
        .cont {
            min-height: 50px;
        }
        .loader {            
            background: url('/public/ajax-loader.gif');
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>
</head>
<body>
    
    <!--<nav class="navbar navbar-inverse navbar-fixed-top">-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-education"></span> Онлайн навчання ДПЗС</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <?php echo $this->elements->getTabs(); ?>                
            </div>

        </div>
    </nav>

    <div class="container">
        <?php echo $content_for_layout ?>

        <div class="row" style="margin-top: 15px;border-top: 1px solid #ccc;">
            <div class="col-md-12 text-center" style="line-height: 40px; height: 40px;">
                <small>&copy; 2015 <a href="/">Онлайн навчання ДПЗС</a></small>
            </div>
        </div>
    </div>

    
    <script src="/public/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/summernote.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    function destroy(url, controller)
    {
        if (confirm("Ви впевнені що бажаєте видалити запис?")) {
            var x = new XMLHttpRequest();
            x.open("GET", url, true);
            x.onload = function () {
                window.location.replace("/" + controller + "/");
            }
            x.send(null);
        }
            
    }
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    </script>

</body>
</html>