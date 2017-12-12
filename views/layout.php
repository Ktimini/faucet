<!doctype html>
<html lang="en, fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="faucet bitcoin" content="">
    <meta name="author" content="Stéphane Perrin">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Faucet Bitcoin</title>
    <!-- Re-Captcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="nav nav-tabs">
            <li class="nav-item active">
                <a class="nav-link" href="/faucet">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">
        <?php require_once('routes.php'); ?>
    </div>

</main><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="http://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
<script src="http://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
