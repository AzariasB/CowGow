<!DOCTYPE html>
<!--A compléter :
    - Le lien pour pouvoir s'enregistrer
    - Le gestionnaire en cas d'oubli du mot de passe
-->
<html>
    <head>
        <title>Login</title>
    </head>
    <body>

        <div class="container">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Se connecter</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="<?php echo site_url('Static_pages/retrouver_mdp') ?>">Mot de passe oublié?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <?php echo validation_errors(); ?>
                        <?php echo form_open('verifylogin'); ?>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" type="text" class="form-control" name="pseudo" value="" placeholder="pseudo" required="">                                        
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="passwd" placeholder="mot de passe" required="">
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" class="btn btn-success">Connexion</button>
                                <a id="btn-fblogin" href="<?php echo site_url('static_pages/accueil') ?>" class="btn btn-primary">Revenir à l'accueil</a>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="padding-top:15px; font-size:85%" >
                                    Pas encore inscrit? 
                                    <a href="<?php echo site_url('Register'); ?>">Inscrivez vous ici!</a>
                                </div>
                            </div>
                        </div>    
                        </form>     



                    </div>                     
                </div>  
            </div>
    </body>
</html>