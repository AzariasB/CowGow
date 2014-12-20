
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$css = Myglobals_model::$css;
$pictures = Myglobals_model::$pictures;
?>

<link href="<?php echo $css; ?>services.css" rel="stylesheet" />
<div class="scoped-content">
    <style>
        body{
            background: url(<?php echo $pictures . 'accueil2.png'; ?>) fixed no-repeat;
            background-size: cover;
        }
    </style>
</div>
<script>

</script>

<div class="container-smooth">
    <div class="row">

        <!-- Debut logement -->
        <div class="col-md-offset-2 col-md-2 text-center service text-info" onmouseenter="hide_link('logement-div', 'logement_suite');" onmouseleave="hide_link('logement_suite', 'logement-div');">
            <div id="logement-div" >
                <div class="row">
                    <div class="col-md-6">
                        <h1><span class="glyphicon icon-home"></span></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon icon-bank"></span></h1>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <h1><span class="glyphicon icon-lodging"></span></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon icon-building"></span></h1>
                    </div>
                </div>
                <div class="row">
                    <h2>Logement</h2>
                </div>
            </div>
            <div style="display: none;" id="logement_suite">
                <a href="#" data-target="#t_logement" data-toggle="modal" class="row modal_link">
                    <div class="col-md-12">
                        <h3><span class="glyphicon icon-campsite"></span>  Type</h3>
                    </div>
                </a>
                <a href="#" data-target="#l_logement" data-toggle="modal" class="row modal_link">
                    <div class="col-md-12">
                        <h3><span class="glyphicon glyphicon-flag"></span>  Lieu</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- fin logement -->

        <!-- Debut activite -->
        <div class="col-md-offset-1 col-md-2 text-center service" onmouseenter="hide_link('activite-div', 'activite_suite');" onmouseleave="hide_link('activite_suite', 'activite-div');">
            <div id="activite-div"  >
                <a href="#">
                    <div class="row">
                        <div class="col-md-6">
                            <h1><span class="glyphicon icon-golf"></span></h1>
                        </div>
                        <div class="col-md-6">
                            <h1><span class="glyphicon icon-skiing"></span></h1>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <h1><span class="glyphicon icon-pitch"></span></h1>
                        </div>
                        <div class="col-md-6">
                            <h1><span class="icon-bicycle"></span></h1>
                        </div>
                    </div>
                    <div class="row">
                        <h2>Activite</h2>
                    </div>
                </a>
            </div>
            <div style="display: none;" id="activite_suite">
                <a href="#" data-target="#s_activite" data-toggle="modal" class="row modal_link">
                    <div class="col-md-12">
                        <h3><span class="glyphicon icon-sun"></span>  Saison</h3>
                    </div>
                </a>
                <a href="#" data-target="#l_activite" data-toggle="modal" class="row modal_link">
                    <div class="col-md-12">
                        <h3><span class="glyphicon glyphicon-flag"></span>  Lieu</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- fin activite -->

        <!-- Debut transport -->
        <div class="col-md-offset-1 col-md-2 text-center service" onmouseenter="hide_link('transport-div', 'transport_suite');" onmouseleave="hide_link('transport_suite','transport-div');">
            <div  id="transport-div" >
                <a href="#">
                    <div class="row">
                        <div class="col-md-6">
                            <h1><span class="glyphicon glyphicon-road"></span></h1>
                        </div>
                        <div class="col-md-6">
                            <h1><span class="glyphicon glyphicon-plane"></span></h1>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <h1><span class="glyphicon icon-bus"></span></h1>
                        </div>
                        <div class="col-md-6">
                            <h1><span class="icon-cab"></span></h1>
                        </div>
                    </div>
                    <div class="row">
                        <h2>Transport</h2>
                    </div>
                </a>
            </div>
            <div style="display: none;" id="transport_suite" >
                <a href="#" data-target="#d_transport" data-toggle="modal" class="row modal_link">
                    <div class="col-md-12">
                        <h3>
                            <span class="glyphicon glyphicon-flag"></span>Départ</h3>
                    </div>
                </a>
                <a href="#" data-target="#a_transport" data-toggle="modal" class="row modal_link">
                    <div class="col-md-12">
                        <h3>
                            <span class="glyphicon glyphicon-flag"></span> Arrivé</h3>
                    </div>
                </a>
            </div>
        </div>
        <!-- fin transport -->
    </div>
    <br>


    <div class="row">

        <!-- Debut 'mon compte' -->
        <div class="col-md-offset-2 col-md-2 text-center personel">
            <a href="#">
                <div class="row">
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-pencil"></span> </h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-cog"></span></h1>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-edit"></span></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-user"></span> </h1>
                    </div>
                </div>
                <div class="row">
                    <h2>Mon compte</h2>
                </div>
            </a>
        </div>
        <!-- fin 'mon compte' -->

        <!-- Debut 'mon panier' -->
        <div class="col-md-offset-1 col-md-2 text-center personel">
            <a href="#">
                <div class="row">
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-pencil"></span></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-euro"></span></h1>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-inbox"></span></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-shopping-cart"></span></h1>
                    </div>
                </div>
                <div class="row">
                    <h2>Mon panier</h2>
                </div>
            </a>
        </div>
        <!-- fin 'mon panier' -->

        <!-- Debut 'mes packs' -->
        <div class="col-md-offset-1 col-md-2 text-center personel">
            <a href="#">
                <div class="row">
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-pencil"></span></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-book"></span></h1>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-tags"></span></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><span class="glyphicon glyphicon-calendar"></span></h1>
                    </div>
                </div>
                <div class="row">
                    <h2>Mes packs</h2>
                </div>
            </a>
        </div>
        <!-- fin 'mes packs' -->
    </div>
</div>
</div>
</body>
</html>