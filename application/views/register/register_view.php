<link href="<?php echo base_url('assets/css/register.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/css/bootstrap-multiselect.css'); ?>" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url('assets/js/bootstrap-multiselect.js'); ?>" type="text/javascript"></script>
</head>
<body>
    <?php
    $this->load->library('form_validation');


    if (!empty(validation_errors())) {
        $danger = 'alert-danger';
        $success = 'alert-success';
        $error_pseudo = form_error('pseudo');
        if (!empty($error_pseudo)) {
            $error_pseudo = $danger;
        } else {
            $error_pseudo = $success;
        }

        $error_mdp = form_error('mdp');
        if (!empty($error_mdp)) {
            $error_mdp = $danger;
        } else {
            $error_mdp = $success;
        }

        $error_mail = form_error('e-mail');
        if (!empty($error_mail)) {
            $error_mail = $danger;
        } else {
            $error_mail = $success;
        }

        $error_nom = form_error('nom');
        if (!empty($error_nom)) {
            $error_nom = $danger;
        } else {
            $error_nom = $success;
        }

        $error_prenom = form_error('prenom');
        if (!empty($error_prenom)) {
            $error_prenom = $danger;
        } else {
            $error_prenom = $success;
        }

        $error_tel = form_error('telephone');
        if (!empty($error_tel)) {
            $error_tel = $danger;
        } else {
            $error_tel = $success;
        }

        $error_postal = form_error('code_postal');
        if (!empty($error_postal)) {
            $error_postal = $danger;
        } else {
            $error_postal = $success;
        }

        $error_ville = form_error('ville');
        if (!empty($error_ville)) {
            $error_ville = $danger;
        } else {
            $error_ville = $success;
        }

        $error_date = form_error('naissance');
        if (!empty($error_date)) {
            $error_date = $danger;
        } else {
            $error_date = $success;
        }
    } else {
        $error_date = '';
        $error_mail = '';
        $error_mdp = '';
        $error_nom = '';
        $error_postal = '';
        $error_prenom = '';
        $error_pseudo = '';
        $error_tel = '';
        $error_ville = '';
    }
    ?>

    <h1>Inscription</h1>
    <h1><small>Vous pourrez ainsi acheter des pack, ou en créer</small></h1>

    <?php
    $attributes = array('class' => 'form-horizontal');
    echo validation_errors('<div class="alert-danger">', '</div>');
    echo form_open('verifyregister', $attributes);
    ?>
    <fieldset>

        <!-- Form Name -->

        <div class="control-group row">
            <label class="control-label col-md-4"> Civilité </label>
            <div class="controls col-md-4">
                <label class="radio-inline"> <input type="radio"  required="" name="civilite" <?php echo set_radio('civilite', 'monsieur'); ?> id="monsieur" value="monsieur" checked="" onclick="enable_enfants();
                        enable_marie();
                        become_man()"> M. </label>
                <label class="radio-inline"> <input type="radio" value="madame" name="civilite" <?php echo set_radio('civilite', 'madame'); ?> id="madame" onclick="enable_enfants();
                        enable_marie();
                        become_woman()"> Mme </label>
                <label class="radio-inline"> <input type="radio" value="mademoiselle" name="civilite" <?php echo set_radio('civilite', 'mademoiselle'); ?> id="mademoiselle" onclick="disable_enfants();
                        disable_marie();
                        become_woman()"> Mlle </label>
            </div>
        </div>
        <br>
        <!-- Text input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="Nom_u">Nom </label>
            <div class="controls col-md-4">
                <input id="Nom_u"  class="form-control <?php echo $error_nom; ?>" name="nom" type="text" placeholder="Dupont" required="" value="<?php echo set_value('nom'); ?>">
            </div>
            <div class="col-md-4">
                <span id="span_nom"></span>
                <p id="p_nom"></p>
            </div>
        </div>
        <br>
        <!-- Text input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="Prenom_u">Prénom</label>
            <div class="controls col-md-4">
                <input id="Prenom_u" class="form-control <?php echo $error_prenom; ?>" name="prenom" type="text" placeholder="Pierre" required="" value="<?php echo set_value('prenom'); ?>">
                <span id="pseudo_span"></span>
                <p id="pseudo_p"></p>
            </div>
            <div class="col-md-4">
                <span id="span_prenom"></span>
                <p id="p_prenom"></p>
            </div>
        </div>
        <br>
        <!-- Text input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="pseudo_u">Pseudo</label>
            <div class="controls col-md-4">
                <input id="pseudo_u" class="form-control <?php echo $error_pseudo; ?>" name="pseudo" type="text" placeholder="Pidu" required="" value="<?php echo set_value('pseudo'); ?>">
            </div>
            <div class="col-md-4">
                <span id="span_pseudo"></span>
                <p id="p_pseudo"></p>
            </div>
        </div>
        <br>
        <!-- Password input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="password_u_1">Mot de passe</label>
            <div class="controls col-md-4" >
                <input id="password_u_1" class="form-control <?php echo $error_mdp; ?>" name="mdp" type="password" required="" value="<?php echo set_value('mdp'); ?>" onchange="mdp_check(this.id, 'span_mdp1', 'p_mdp1');"/>
            </div>
            <div class="col-md-4">
                <p id="p_mdp1">
                    <span id="span_mdp1"></span>
                </p>
            </div>

        </div>
        <br>

        <!-- Password input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="password_u_2">Répétez le mot de passe</label>
            <div class="controls col-md-4">
                <input id="password_u_2" class="form-control  <?php echo $error_mdp; ?>" name="mdp2" type="password" required="" value="<?php echo set_value('mdp2'); ?>" onchange="mdp2_check(this.id, 'password_u_1', 'span_mdp2', 'p_mdp2')"/>
            </div>
            <div class="col-md-4">
                <p id="p_mdp2">
                    <span id="span_mdp2"></span>
                </p>
            </div>
        </div>
        <br>

        <!-- Text input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="adresse_u_1">Adresse e-mail</label>
            <div class="controls col-md-4">
                <input id="adresse_u_1" class="form-control  <?php echo $error_mail; ?>" name="e-mail" type="text" placeholder="pierre@dupont.com" required="" value="<?php echo set_value('e-mail'); ?>" onchange="check_ee-mail(this.id, 'span_e-mail', 'p_e-mail');">
            </div>
            <div class="col-md-4">
                <p id="p_e-mail">
                    <span id="span_e-mail"></span>
                </p>
            </div>
        </div>
        <br>

        <!-- Text input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="adresse_u_2">Retapez votre adresse e-e-mail</label>
            <div class="controls col-md-4">
                <input id="adresse_u_2" class="form-control  <?php echo $error_mail; ?>" name="e-mail2" type="text" placeholder="pierre@dupont.com" required="" value="<?php echo set_value('e-mail2'); ?>" onchange="check_ee-mail2(this.id, 'adresse_u_1', 'span_e-mail2', 'p_e-mail2');">
            </div>
            <div class="col-md-4">
                <p id="p_e-mail2">
                    <span id="span_e-mail2"></span>
                </p>
            </div>
        </div>
        <br>
        <!-- Text input-->
        <div class="control-group row">
            <label class="control-label col-md-4" for="tel_u">Numéro de telephone</label>
            <div class="controls col-md-4">
                <input id="tel_u" name="telephone"  class="form-control <?php echo $error_tel; ?>" type="tel" placeholder="06 ..." required="" value="<?php echo set_value('telephone'); ?>">
            </div>
            <div class="col-md-4">
                <span id="span_tel"></span>
                <p id="p_tel"></p>
            </div>
        </div>
        <br>
        <!-- Partie optionelle -->

        <div class="panel-group row" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="glyphicon glyphicon-chevron-up" id="chevron" onclick="chevron_change(this.id)"></span>
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="control-group">
                                <label for="naissance" class="control-label">Date de naissance</label>
                                <div id="selects">
                                    <input type="text" id="naissance" class="form-control <?php echo $error_date; ?>" name="naissance" value="<?php echo set_value('naissance'); ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="adresse" class="control-label">Adresse</label>
                                <div>
                                    <input type="text" id="adresse" class="form-control" placeholder="59 rue des palmiers" name="adresse" value="<?php echo set_value('adresse'); ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="code_postal" class="control-label">Code Postal</label>
                                <div>
                                    <input type="text" id="code_postal" class="form-control <?php echo $error_postal; ?>" placeholder="59100" id="postal" name="code_postal" value="<?php echo set_value('code_postal'); ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="ville" class="control-label">Ville</label>
                                <div>
                                    <input type="text" placeholder="Paris" id="ville" class="form-control <?php echo $error_ville; ?>" name="ville" value="<?php echo set_value('ville'); ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="emploi" class="control-label">Profession</label>
                                <div>
                                    <select class="select form-control" id="emploi" name="emploi">
                                        <?php
                                        foreach ($emplois as $value) {
                                            echo "<option value=\"$value\">$value</option>";
                                        }
                                        ?>
                                        <option value="autre">Autre...</option> <!-- A compléter pour afficher un text pour rentrer le nom de la fonction -->
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-group col-md-6">
                                    <label class="control-label">Situation</label>
                                    <br>
                                    <div class="controls">
                                        <label class="radio" for="celib">
                                            <input type="radio" name="situation" value="celibataire" id="celib">
                                            Celibataire
                                        </label>
                                        <label class="radio" for="couple">
                                            <input type="radio" name="situation" value="en_couple" id="couple">
                                            En couple
                                        </label>
                                        <label class="radio" for="marie" id="labelmarie">
                                            <input type="radio" name="situation"  id="marie" value="marie" >
                                            Marié
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group col-md-6">
                                    <label for="nombre_enfants" class="control-label">Nombre d'enfants</label>
                                    <div>
                                        <input type="number" id="nombre_enfants" class="input" max="10" min="0" value="<?php echo set_value('nombre_enfants'); ?>" id="enfants" name="nombre_enfants"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin de la div left-->
                        <div class="col-md-7 col-md-offset-1">
                            <fieldset>
                                <legend>Votre coin 'Favoris'</legend>
                                <div class="control-group row">
                                    <div class="col-md-6">
                                        <label for="destinations">Destinations favorites</label>
                                        <div>
                                            <select id="destinations" multiple="multiple" name="destinations[]">
                                                <?php
                                                $option = '';
                                                foreach ($station as $key => $value) {
                                                    if ($option != $value) {
                                                        if ($option != '') {
                                                            echo '</optgroup>';
                                                        }
                                                        $option = $value;
                                                        echo "<optgroup label=\"$value\">";
                                                    }
                                                    $affiche_option = "<option value=\"$key\" ";
                                                    $affiche_option = $affiche_option . set_select('destinations[]', $key) . '>';
                                                    $affiche_option = $affiche_option . "$key</option>";
                                                    echo $affiche_option;
                                                }
                                                echo '</optgroug>';
                                                ?>
                                            </select>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('#destinations').multiselect({
                                                        enableFiltering: true,
                                                        filterPlaceholder: 'Rechercher...',
                                                        maxHeight: 300,
                                                        buttonWidth: '100%',
                                                        nonSelectedText: 'Choisissez vos stations favorites',
                                                        allSelectedText: 'Toutes les stations !'
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>                                    
                                    <div class="control-group col-md-6">
                                        <label for="activite">Activite favorites</label>
                                        <div>
                                            <select id="activite" multiple="multiple" name="activite[]">
                                                <?php
                                                $option = '';
                                                foreach ($activites as $key => $value) {
                                                    if ($option != $value) {
                                                        if ($option != '') {
                                                            echo '</optgroup>';
                                                        }
                                                        $option = $value;
                                                        echo "<optgroup label=\"$value\">";
                                                    }
                                                    $affiche_option = "<option value=\"$key\" ";
                                                    $affiche_option = $affiche_option . set_select('activite[]', $key) . '>';
                                                    $affiche_option = $affiche_option . "$key</option>";
                                                    echo $affiche_option;
                                                }
                                                echo '</optgroug>';
                                                ?>
                                            </select>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('#activite').multiselect({
                                                        enableFiltering: true,
                                                        filterPlaceholder: 'Rechercher...',
                                                        maxHeight: 300,
                                                        buttonWidth: '100%',
                                                        nonSelectedText: 'Choisissez vos activite préférées',
                                                        allSelectedText: 'Toutes les activites !'
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </fieldset> 
                            <br>
                            <fieldset id="images">
                                <legend>Votre avatar</legend>
                                <div class="control-group row">
                                    <div class="col-md-12">
                                        <fieldset id="field_avatar">
                                            <div id="avatar">
                                                <div id="homme">
                                                    <?php
                                                    for ($i = 1; $i < 32; $i++) {
                                                        $img = '<label class="radio" ';
                                                        $img = $img . "for=\"homme$i\">";
                                                        $img = $img . '<input type="radio" name="radio_homme" class="radio" ';
                                                        $img = $img . "id =\"homme$i\" value=\"homme$i\">";
                                                        $img = $img . '<img src="';
                                                        $img = $img . base_url('assets/others/images/avatars/hommes/homme') . $i . '.png"';
                                                        $img = $img . ' alt ="Error"/>';
                                                        $img = $img . '</label>';
                                                        echo $img;
                                                    }
                                                    ?>
                                                </div>
                                                <div id="femme">
                                                    <?php
                                                    for ($i = 1; $i < 32; $i++) {
                                                        $img = '<label class="radio" ';
                                                        $img = $img . "for=\"femme$i\">";
                                                        $img = $img . '<input type="radio" name="radio_femme" class="radio" ';
                                                        $img = $img . "id =\"femme$i\" value=\"femme$i\"/>";
                                                        $img = $img . '<img src="';
                                                        $img = $img . base_url('assets/others/images/avatars/femmes/femme') . $i . '.png"';
                                                        $img = $img . ' alt ="Error"/>';
                                                        $img = $img . '</label>';
                                                        echo $img;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <label for="conditions">
            <input type="checkbox" id="conditions" required=""/>
            J'ai lu et j'accepte les conditions d'utilisation
        </label>
        <br>
        <div id="boutons">
            <input type="submit" class="validation btn btn-success" name="accept"/>
            <input type="reset" class="effacer btn btn-danger" value="Effacer"/>
            <a href="<?php echo site_url('Static_pages/accueil'); ?>" class="btn btn-default">Retour au menu</a>
        </div>

    </fieldset>
</form>


</div>

</body>
</html>