<?php
$this->load->library('form_validation');
$this->load->model('activite_model', '', TRUE);
$slider = base_url() . 'assets/slider/';

$variables = array();
if_filter($data, $variables);
if (isset($data['filter'])) {
    unset($data['filter']);
    unset($data['post']);
}
extract($variables);
?>
<div class="container">
    <div class="row text-center" id="filtre">
        <h1>Activités</h1>
        <?php
        $attributes = array('class' => 'form-horizontal');
        echo form_open('verify_filter/activite', $attributes);
        ?>
        <fieldset class="border_fieldset text-left">
            <div class="col-md-6 text-left">
                <label for="prix">Prix de l'activité : </label>
                <fieldset id="prix" class="form-control">
                    <b> Gratuit </b> <input type="text" name="prix_act" class="span2 form-control" value="<?php echo $prix; ?>" data-slider-min="0" data-slider-max="200" data-slider-step="5" data-slider-value="[<?php echo $prix; ?>]" id="sl2" > <b>200 €</b>
                </fieldset>

                <label for="duree"> Duree : </label>
                <fieldset id="duree" class="form-control">
                    <!-- Ici, on met comme nom, la durée maximale de l'activite -->
                    <input type="checkbox" name="demi_j" id="demi-j" value="duree" <?php echo $demi_j; ?>/>
                    <label for="demi-j">Demi-journée</label>
                    <input type="checkbox" name="journee" id="journee" value="duree" <?php echo $journee; ?> />
                    <label for="journee"> Journée</label>
                </fieldset>

                <label for="creneau">Créneau horaire : </label>
                <fieldset id="creneau" class="form-control">
                    <input type="checkbox" name="matin" id="matin" value="creneau" <?php echo $matin; ?> />
                    <label for="matin">Matin </label>
                    <input type="checkbox" name="apmidi" id="apmidi" value="creneau" <?php echo $apmidi; ?> />
                    <label for="apmidi">Après-midi</label>
                    <input type="checkbox" name="soir" id="soir" value="creneau" <?php echo $soir; ?>/>
                    <label for="soir">Soir</label>
                </fieldset>
            </div>
            <div class="col-md-6 text-left">
                <label for="saison"> Saison : </label>
                <fieldset id="saison" class="form-control">
                    <label>
                        <input type="checkbox" name="Hiver" id="hiver" value="saison" <?php echo $Hiver; ?> />
                        Hiver
                    </label>
                    <label>
                        <input type="checkbox" name="Ete" id="ete" value="saison" <?php echo $Ete; ?>  />
                        Eté
                    </label>
                </fieldset>

                <label for="niveau"> Niveau : </label>
                <fieldset id="niveau" class="form-control">
                    <input type="checkbox" name="Debutant" id="debutant" value="niveau" <?php echo $Debutant; ?>  />
                    <label for="debutant"> Débutant </label>
                    <input type="checkbox" name="Confirme" id="moyen" value="niveau" <?php echo $Confirme; ?> />
                    <label for="moyen"> Confirmé </label>
                    <input type="checkbox" name="Professionel" id="professionnel" value="niveau" <?php echo $Professionel; ?>  />
                    <label for="professionnel">Professionnel</label>
                </fieldset>

                <label for="lieu">Lieu : </label>
                <fieldset>
                    <input type="text" name="Lieu" id="lieu" placeholder="Grenoble" class="form-control" value="<?php echo $Lieu; ?>" />
                </fieldset>
            </div>
            <div class="col-md-6 text-left bottom">
                <input type="submit" name="filter" value="Filtrer" class="btn btn-default btn-info" id="activite_filter" />
            </div>
        </fieldset>
        <!-- Exemple parfait de slider !!! -->
        </form>
    </div>
    <div id="resutl">
        <?php
        if ($data == NULL || empty($data)) {
            echo '        <div class="row">
            <div class="col-md-12 text-center">
                <h4>
                <br/><br/><br/>
                    Aucune activité n\'a été trouvée
                    <br/><br/>
                    Allégez les filtre affin de visualiser plus de résultats
                    <br/>
                </h4>
            </div>
        </div>';
        } else {
            foreach ($data as $value) {
                afficher_activite($value);
            }
        }
        ?>

    </div>

</div>



<script>
    $(function() {
        $('#sl2').slider();
    });
</script>


</body>
</html>
<?php
/*
 * Fonctions : 
 *  - Fonction 'afficher_activite' afficher une activite sur une colonne (affichage à améliorer
 *  - Fonction 'if_filter' active certaines variables si un premier filtrage a été fait
 */

function if_filter(&$data, &$array) {
    
    // Dans cet array, on met tout les noms de chaines qui ont un input dans le filtre
    $names = array('demi_j', 'journee', 'matin', 'apmidi', 'soir', 'Ete', 'Hiver', 'Debutant', 'Confirme', 'Professionel');

    //On change le nom et la clé pour le extract (plus loin)
    $names = array_flip($names);
    if (isset($data['post'])) {
        //S'il y a déjà eu un filtre avant 
        $post = $data['post'];
        $prix = $post['prix'];
        unset($post['prix']);
        $prix = $prix[0] . ',' . $prix[1];
        
        if(isset($post['Lieu'])){
            $Lieu = $post['Lieu'];
        }

        foreach ($names as $key => $value) {
            if (isset($post[$key])) {
                //Pour que les input soient coché
                $names[$key] = 'checked=""';
            } else {
                $names[$key] = '';
            }
        }
    } else {
        foreach ($names as $key => $value) {
            $names[$key] = "";
            //Pour ne pas avoir de variable vide
        }
        $prix = '10,100';
        $Lieu = "";
    }
    $names['prix'] = $prix;
    $names['Lieu'] = $Lieu;
    $array = $names;
}

function afficher_activite($data) {
    // On traite un peu les données passée en paramètres (surtout au niveau de l'heure)
    $debut = $data['horaire_deb'];
    $fin = $data['horaire_fin'];

    //On change les ':' par 'h'
    $debut = str_replace(':', "h", $debut);
    $fin = str_replace(':', "h", $fin);

    //Puis on enlève les secondes ...
    $debut = substr($debut, 0, 5);
    $fin = substr($fin, 0, 5);

    //Changement du chemin pour la photo
    if ($data['photo'] == NULL) {
        $photo = Myglobals_model::$pictures . 'services/none.png';
    } else {
        $photo = Myglobals_model::$pictures . 'services/' . $data['photo'];
    }
    //Pour finir, on affiche les informations principales de l'activite
    echo '        <div class="row activite">
            <a href="#">
            <div class="col-md-3 text-center">
                <img src=' . $photo . ' />
            </div>
            <div class="col-md-9">
                <div class="col-md-4 text-center">
                    <h3>
                        ' . $data['t_typeact'] . '
                    </h3>
                </div>
                <div class="col-md-4 text-center">
                    <h3>
                        Niveau : ' . $data['niveau'] . '
                    </h3>
                </div>
                <div class="col-md-4 text-center">
                    <h3>
                        ' . $data['destination'] . '
                    </h3>
                </div>
                <div class="col-md-4 text-center">
                    <h3>
                        Début : ' . $debut . '
                    </h3>
                </div>
                <div class="col-md-4 text-center">
                    <h3>
                        Fin : ' . $fin . '
                    </h3>
                </div>
                <div class="col-md-4 text-center">
                    <h3>
                        Prix : ' . $data['prix'] . ' €
                    </h3>
                </div>
            </div>
            </a>
        </div>';
}
?>