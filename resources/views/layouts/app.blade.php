<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset=utf-8>
    <meta content="IE=edge" http-equiv=X-UA-Compatible>
    <meta content="" name=description>
    <meta content="Alx" name=author>
    <title>{{ config('app.name') }}</title>
    <link href="/css/bootstrap.css" rel=stylesheet>
    <!--[if lt IE 9]><script src=/js/ie8-responsive-file-warning.js></script><![endif]-->
    <!--[if lt IE 9]> <script src=https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js></script> <script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script> <![endif]-->
    <link href="/css/abilix.css?v=0.04" rel=stylesheet>
    <link href="/apple-touch-icon.png" rel=apple-touch-icon>
    <link href="container" rel=icon>
    <script src=/js/jquery.min.js></script>
    <script language="javascript">
        document.ontouchmove = function(e){
            e.preventDefault();
        }
        var _s = window.screen.width / 750;
        document.write('<meta name="viewport" content="width=750, minimum-scale = ' + _s + ', maximum-scale = ' + _s + ', user-scalable=no, target-densitydpi=device-dpi, shrink-to-fit=no">');
    </script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="abilix">
<header>
    <div class="container text-center">
        <img src="/images/header.png"  >
    </div>
</header>
@yield('content')
<div class="modal fade" id="modal-tip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Loading...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script src=/js/bootstrap.min.js></script>
@yield('scripts')
<script>
    $().ready(function () {
        $(window).resize(function () {
            location.reload();
        })
    })
</script>
</body>
</html>
