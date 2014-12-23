<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
  $this->load->library('form_validation');  
?>

    </head>
    <body>

        <div class="container">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title"> Mot de passe oublié </div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div class="text-info">
                            <p>Nous allons vous aider à retrouver votre mot de passe.<br/>Pour cela, nous allons avoir besoin de l'adresse e-mail avec laquelle vous vous êtes inscrit. </p>
                        </div>
                        <?php
                        echo validation_errors();
                        echo form_open('User/forgot_passwd');
                        ?>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="password" type="email" class="form-control" name="emai" placeholder="e-mail" required="">
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" class="btn btn-success">Continuer</button>
                                <a id="btn-fblogin" href="<?php echo site_url('static_pages/accueil') ?>" class="btn btn-primary">Revenir à l'accueil</a>
                            </div>
                        </div> 
                        </form>     



                    </div>                     
                </div>  
            </div>
    </body>
</html>