<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SWAG - Steam Web Api Generator</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.rawgit.com/afeld/bootstrap-toc/v0.4.1/dist/bootstrap-toc.min.css">
    <style>
        nav[data-toggle='toc'] {
            margin-top: 30px;
        }

        nav[data-toggle=toc] .nav>li>a {
            color: #fff;
        }

        nav[data-toggle=toc] .nav .nav>.active:focus>a,
        nav[data-toggle=toc] .nav .nav>.active:hover>a,
        nav[data-toggle=toc] .nav .nav>.active>a,
        nav[data-toggle=toc] .nav>.active:focus>a,
        nav[data-toggle=toc] .nav>.active:hover>a,
        nav[data-toggle=toc] .nav>.active>a,
        nav[data-toggle=toc] .nav>li>a:focus,
        nav[data-toggle=toc] .nav>li>a:hover {
            color: #66c0f4;
            border-color: #66c0f4;
        }

        .api-method-heading {
            font-size: 14px;
            display: inline;
            font-weight: bold;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#toc">
{{ $slot }}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/afeld/bootstrap-toc/v0.4.1/dist/bootstrap-toc.min.js"></script>
<script type="text/javascript">
    $('#toc').affix({
        offset: {
            top: 100
            , bottom: function () {
                return (this.bottom = $('.footer').outerHeight(true))
            }
        }
    })
</script>
</body>
</html>