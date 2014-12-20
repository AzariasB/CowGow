<?php
$this->load->library('form_validation');
$slider = base_url() . 'assets/slider/';
$css = Myglobals_model::$css;
?>

<link href="<?php echo $slider; ?>slider.css" rel="stylesheet" />
<link href="<?php echo $css; ?>services.css" rel="stylesheet" />
<script src="<?php echo $slider; ?>bootstrap-slider.js" ></script>

<div class="container">
    <div class="row text-center">
        <h1>Logement</h1>
        <?php
        $attributes = array('class' => 'form-horizontal');
        echo form_open('verify_filter/logement', $attributes);
        ?>
        <fieldset class="border_fieldset text-left">
            <div class="col-md-6 text-left">
                <label for="prix">Prix du logement par semaine : </label>
                <fieldset id="prix" class="form-control">
                    <b> Gratuit </b> <input type="text" name="prix_tran" class="span2 form-control" value="300,900" data-slider-min="0" data-slider-max="2000" data-slider-step="5" data-slider-value="[300,900]" id="sl2" > <b>2000 €</b>
                </fieldset>
                <label for="destinations">Ville : </label>
                <fieldset id="destinations">
                    <input id="tags" class="form-control">  
                </fieldset>
                <label for="type"> Type : </label>
                <fieldset id="type" class="form-control">
                    <input type="checkbox" name="chalet" id="chalet" value="type"/>
                    <label for="chalet">Chalet</label>
                    <input type="checkbox" name="appartement" id="appartement" value="type" />
                    <label for="appartement">Appartement</label>
                    <input type="checkbox" name="hotel" id="hotel" value="type"/>
                    <label for="hotel">Hotel</label>
                    <input type="checkbox" name="maisonhote" id="maisonhote" value="type"/>
                    <label for="maisonhote">Maisons d'hôtes</label>
                </fieldset>
            </div>
            <div class="col-md-6 text-left">
                <label for="surface">Surface totale : </label>
                <fieldset id="surface" class="form-control">
                    <b> 0 </b> <input type="text" name="surface" class="span2 form-control" value="30,100" data-slider-min="0" data-slider-max="200" data-slider-step="5" data-slider-value="[30,100]" id="sl3" > <b>200 m²</b>
                </fieldset>
                <label for="NbPlace"> Nombre de places : </label>
                <select id="NbPlace" name="NbPlace" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <div class="col-md-6 text-right bottom">
                <input type="submit" name="filter" value="Filtrer" class="btn btn-default btn-info" id="filter_submit" />
            </div>
        </fieldset>
        <!-- Exemple parfait de slider !!! -->
        </form>
    </div>
</div>

<script>
    $(function() {
        var availableTags = [
            "L'Alpe du Grand Serre",
            "L'Alpe d'Huez",
            "Huez",
            "Vaujany",
            "Auris en Oisans",
            "Arêches-Beaufort",
            "Les Arcs",
            "L'Audibergue - La Moulière",
            "Auron",
            "Autrans",
            "Avoriaz",
            "Bramans",
            "Les Brasses",
            "Bogève, Onnion",
            "Saint-Jeoire-en-Faucigny",
            "Viuz-en-Sallaz",
            "Chamonix",
            "Chamrousse",
            "La Chèvrerie (Espace Roc d'Enfer)",
            "La Clusaz",
            "Le Collet d'Allevard",
            "Col du Feu (Lullin)",
            "Combloux",
            "Les Contamines",
            "Cordon",
            "Crévoux",
            "La Colmiane",
            "Les Carroz",
            "Les Deux Alpes",
            "Espace Diamant",
            "Les Saisies",
            "Crest-Voland",
            "Notre-Dame-de-Bellecombe",
            "Flumet",
            "Praz-sur-Arly",
            "Flaine",
            "Font d'Urle Chaud Clapier",
            "Les Gets",
            "Les Grands-Montet (Chamonix)",
            "Le Grand-Bornand",
            "Greolieres-les-neiges",
            "Gresse-en-Vercor",
            "Habère-Poche",
            "Espace Killy (Val-d'Isère, Tignes)",
            "Hirmentaz (Bellevaux, Haute-Savoie)",
            "Isola 2000",
            "Lans-en-Vercors",
            "Les Karellis",
            "Les Orres",
            "Manigod",
            "Méaudre",
            "Megève",
            "Montgenèvre",
            "Morillon",
            "Morzine",
            "La Norma",
            "Orcières-Merlette",
            "La Plagne",
            "Les Portes du Soleil",
            "Praz de Lys - Sommand",
            "Pra Loup",
            "Pralognan-la-Vanoise",
            "Réallon",
            "Rencurel",
            "Risoul 1850",
            "La Rosière",
            "Roubion",
            "La Ruchère en Chartreuse",
            "La Sambuy-Seythenex",
            "Samoëns",
            "Le Sauze",
            "Les 7 laux",
            "Saint Hilaire du Touvet",
            "Saint Pierre de Chartreuse",
            "Sainte-Anne-la-Condamine",
            "Sainte-Foy-Tarentaise",
            "St Jean d'Aulps",
            "Espace Roc d'Enfer",
            "La Grande-Terche",
            "Serre Chevalier",
            "Le Semnoz",
            "Sixt-Fer-à-Cheval",
            "Sommand",
            "Super-Châtel",
            "Super Dévoluy - La Joue du Loup",
            "Super-Saxel",
            "Les Sybelles",
            "La Toussuire",
            "Le Corbier",
            "Saint-Jean-d'Arves",
            "Saint-Sorlin-d'Arves",
            "Saint-Colomban-des-Villards",
            "Les Bottières",
            "Courchevel",
            "Méribel",
            "La Tania",
            "Brides-les-Bains",
            "Saint-Martin-de-Belleville",
            "Les Menuires",
            "Val Thorens",
            "Maurienne Orelle",
            "Valberg",
            "Val Cenis",
            "Valfréjus",
            "Valloire",
            "Valmeinier",
            "Valmorel",
            "Vars",
            "Vaujany",
            "Villard-de-Lans Corrençon-en-Vercors",
            "Arette",
            "Artouste",
            "Ax 3 Domaines",
            "Barèges",
            "Bourg-d'Oueil",
            "Cauterets",
            "Font-Romeu",
            "Formiguères",
            "Gourette",
            "Guzet-neige",
            "Hautacam",
            "La Mongie",
            "La Pierre Saint-Martin",
            "Le Mourtis",
            "Les Angles (Pyrénées-Orientales)",
            "Le Somport",
            "Luchon-Superbagnères",
            "Luz-Ardiden",
            "Nistos cap nestes",
            "Peyragudes",
            "Piau-Engaly",
            "Porté-Puymorens",
            "Puyvalador",
            "Puigmal",
            "Station de ski de Saint-Lary",
            "Superbagnères",
            "Val-Louron",
            "Le Lioran",
            "Super-Besse",
            "Mont-Dore",
            "Chastreix-Sancy",
            "Chalmazel",
            "Prat Peyrot",
            "Brameloup",
            "Laguiole",
            "St urcize",
            "Les Fourgs",
            "Métabief Mont d'Or",
            "Monts Jura",
            "Les Rousses",
            "Ballon d'Alsace",
            "Bussang",
            "Champ du Feu",
            "Col de la Schlucht",
            "Cornimont",
            "La Bresse(Hohneck,Lischpach,Brabant)",
            "Lac Blanc/Le Bonhomme",
            "Le Frenz/Saint-Amarin",
            "Le Gaschney",
            "Le Haut du Tôt",
            "Le Schnepfenried",
            "Le Tanet",
            "Le Valtin",
            "Les Trois-Fours",
            "Gérardmer-Ski",
            "Girmont/Val d'Ajol",
            "Markstein",
            "Saint-Maurice-sur-Moselle/Rouge-Gazon",
            "Ventron Frère-Joseph",
            "Xonrupt-Longemer",
            "Ghisoni-Capanelle",
            "Val d'Ese",
            "Vergio",
            "Haut-Asco"
        ];
        $("#tags").autocomplete({
            source: availableTags
        });
    });
</script>

<script>
    $(function() {
        $('#sl2').slider();
    });
</script>

<script>
    $(function() {
        $('#sl3').slider();
    });
</script>


</body>
</html>