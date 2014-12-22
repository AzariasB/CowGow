<?php
$this->load->library('form_validation');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Contact</h1>
        </div> 
    </div>
    <br/>
    <?php
    if (!isset($validate)) {
        echo form_open('verify_contact');
        echo '<div class = "row">
    <div class = "col-md-2 text-right">
    <label for = "nom">
    Nom :
    </label>
    </div>
    <div class = "col-md-8">
    <input type = "text" name = "nom" id = "nom" class = "form-control" required = "">
    </div>
    </div>
    <br/>
    <div class = "row">
    <div class = "col-md-2 text-right">
    <label for = "e-mail">
    E-mail :
    </label>
    </div>
    <div class = "col-md-8">
    <input type = "email" name = "email" id = "e-mail" class = "form-control" required = "">
    </div>
    </div>
    <br/>
    <div class = "row">
    <div class = "col-md-2 text-right">
    <label for = "objet">
    Objet :
    </label>
    </div>
    <div class = "col-md-8">
    <input type = "text" name = "objet" id = "objet" class = "form-control">
    </div>
    </div>
    <br/>
    <div class = "row">
    <div class = "col-md-2 text-right">
    <label for = "message">Votre message : </label>
    </div>
    <div class = "col-md-8">
    <textarea class = "form-control" name = "message" required = "" rows = "10" id = "message" placeholder = "Rentrez votre message ici"></textarea>
    </div>
    </div>
    <br/>
    <div class = "row">
    <div class = "col-md-offset-6 col-md-2">
    <input type = "reset" class = "form-control btn btn-danger" value = "Effacer" />
    </div>
    <div class = "col-md-2">
    <input type = "submit" class = "form-control btn btn-success" value = "Envoyer" />
    </div>
    </div>
    </form>';
    } else if ($validate == FALSE) {
        //Afficher un message d'erreur
        echo '    <div class="row alert-danger">
        <div class="col-md-12 text-danger danger text-center">
            <h4>
            <span class="glyphicon glyphicon-remove"></span>
                Une erreur s\'est produite lors de l\'envoi du message, veuillez réessayer plus tard.
            </h4>
        </div>
        <div class="col-md-12 text-center">
            <a href="' . site_url('Static_pages/accueil') . '" >Accueil</a>
        </div>
    </div>';
    } else {
        //On a bien envoyé le message. No problemo.
        echo '    <div class="row alert-success">
        <div class="col-md-12 text-success success text-center">
            <h4>
            <span class="glyphicon glyphicon-ok">  </span>
                Votre mail a bien été envoyé.
            </h4>
        </div>
        <div class="col-md-12 text-center">
            <a href="' . site_url('Static_pages/accueil') . '" >Accueil</a>
        </div>
    </div>
';
    }
    ?>
</div>

</body>
</html>
