    <html>
    <head>
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/login.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/materialize.min.css">
        <script  type="text/javascript" src="<?php echo base_url(); ?>public/JS/jquery-2.1.1.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="<?php echo base_url(); ?>public/JS/jquery-migrate.js"></script>
    </head>
    <body>
    <div class="background-wrap">
        <video id="video-bg-elem" preload="auto" autoplay="true" muted="muted" loop="true">
            <source src="<?php echo base_url(); ?>public/files/1.mp4" type="video/mp4">
            Video Not Supported
        </video>
    </div>
    <div class="content">
        <form  class="login" method="post" action="<?=base_url()?>main/login_validation">
            <div id="log">
                <fieldset>
                    <legend class="legend">Connexion</legend>
                    <div class="input-field">
                        <i class="material-icons prefix"></i>
                        <input type="text" id="username" name="username" ><br>
                        <span class="text-danger"><?=form_error("username")?></span>
                        <label for="username">Login</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix"></i>
                        <input type="password" id="password" name="password"  ><br>
                        <span class="text-danger"><?=form_error("password")?></span>
                        <label for="password">Mot de Passe</label>
                    </div>
                </fieldset>
                <button class="submit1" type="submit">Se Connecter</button>
            </div>
        </form>
        <?php if(isset($_GET['erreur'])){
            echo "<div class='alert alert-danger'>Erreur!Login ou Mot de Passe Incorrect</div>";
        }
        ?>

        <button id="btn" class="submit">Gestion  Utilisateurs Fait Avec CodeIgniter</button>

    </div>
    <script src="<?php echo base_url(); ?>public/JS/materialize.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn').click(function(){
                $('#log').toggle(500);
                $('#btn').fadeOut(1000);
            });
        });

    </script>

    </body>
    </html>