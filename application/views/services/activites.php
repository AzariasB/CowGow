<?php
$this->load->library('form_validation');
$this->load->model('activite_model', '', TRUE);
$slider = base_url() . 'assets/slider/';

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
        $photo = Myglobals_model::$pictures.'services/none.png';
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
                    <b> Gratuit </b> <input type="text" name="prix_act" class="span2 form-control" value="300,900" data-slider-min="0" data-slider-max="2000" data-slider-step="5" data-slider-value="[300,900]" id="sl2" > <b>2000 €</b>
                </fieldset>

                <label for="duree"> Duree : </label>
                <fieldset id="duree" class="form-control">
                    <input type="checkbox" name="demi-j" id="demi-j" value="duree"/>
                    <label for="demi-j">Demi-journée</label>
                    <input type="checkbox" name="journee" id="journee" value="duree" />
                    <label for="journee"> Journée</label>
                    <input type="checkbox" name="deux-j" id="deux-j" value="duree"/>
                    <label for="deux-j">Deux jours</label>
                    <input type="checkbox" name="plus" id="plus" value="duree"/>
                    <label for="plus">Plus...</label>
                </fieldset>

                <label for="creneau">Créneau horaire : </label>
                <fieldset id="creneau" class="form-control">
                    <input type="checkbox" name="matin" id="matin" value="creneau"/>
                    <label for="matin">Matin </label>
                    <input type="checkbox" name="midi" id="midi" value="creneau"/>
                    <label for="midi">Midi</label>
                    <input type="checkbox" name="ap-midi" id="ap-midi" value="creneau"/>
                    <label for="ap-midi">Après-midi</label>
                    <input type="checkbox" name="soir" id="soir" value="creneau"/>
                    <label for="soir">Soir</label>
                    <input type="checkbox" name="nuit" id="nuit" value="creneau" />
                    <label for="nuit">Nuit</label>
                </fieldset>
            </div>
            <div class="col-md-6 text-left">
                <label for="saison"> Saison : </label>
                <fieldset id="saison" class="form-control">
                    <input type="checkbox" name="hiver" id="hiver" value="saison"/>
                    <label for="hiver"> Hiver </label>
                    <input type="checkbox" name="ete" id="ete" value="saison" />
                    <label for="ete"> Eté </label>
                </fieldset>

                <label for="niveau"> Niveau : </label>
                <fieldset id="niveau" class="form-control">
                    <input type="checkbox" name="debutant" id="debutant" value="niveau" />
                    <label for="debutant"> Débutant </label>
                    <input type="checkbox" name="niv_moyen" id="moyen" value="niveau" />
                    <label for="moyen">Moyen</label>
                    <input type="checkbox" name="niv_prof" id="professionnel" value="niveau" />
                    <label for="professionnel">Professionnel</label>
                </fieldset>

            </div>
            <div class="col-md-6 text-right bottom">
                <input type="submit" name="filter" value="Filtrer" class="btn btn-default btn-info" id="activite_filter" />
            </div>
        </fieldset>
        <!-- Exemple parfait de slider !!! -->
        </form>
    </div>
    <div id="resutl">
        <?php
        foreach ($data as $value) {
            afficher_activite($value);
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