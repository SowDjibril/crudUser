<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.css">
	 <script src=" <?php echo base_url(); ?>public/JS/jquery-2.1.1.min.js"></script>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/font-awesome.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">
    <link href="<?php echo base_url(); ?>public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	</head>
<body>	
<nav class="navbar navbar-inverse ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Administration du site</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Accueil</a></li>
                <li><a href="<?php echo(base_url()); ?>main/entrer" title="">Utilisateur</a></li>
                <li><a href="<?php echo(base_url()); ?>/role/" title="">Role</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

