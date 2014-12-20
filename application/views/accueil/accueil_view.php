<?php
$pictures = Myglobals_model::$pictures;
$css = Myglobals_model::$css;
$session = $this->session->userdata('logged_in');
$connected = isset($session['pseudo']) && $session['pseudo'] != NULL;
?>
<link href="<?php echo $css ?>mycss.css" rel="stylesheet" />
<style>
    .parralax{
        background: url(<?php echo $pictures; ?>background.jpg) 10% 10% fixed no-repeat;
        background-size: cover;
    }
</style>
</head>
<body>
    <?php
    $this->load->view('required/navbar', array('pictures' => $pictures));
    ?>
    <div class="container parralax">
        <div class="row title-text">
            <div class ="col-md-8 col-md-offset-2 text-center block">
                <h1>Bienvenue sur CowGow</h1>
                <h3>Le site de vente de voyage en ligne</h3>
            </div>

        </div>
        <!-- Div pour les slides -->
        <div class="row">
            <div class="col-md-12">
                <div id="Carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#Carousel" data-slide-to="1"></li>
                        <li data-target="#Carousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo $pictures; ?>slide1.jpg" alt="ERROR">
                            <div class="carousel-caption">
                                <h1>Des montagnes enneigées</h1>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo $pictures; ?>slide2.jpg" alt="ERROR">
                            <div class="carousel-caption">
                                <h1>Des lacs scintillants</h1>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo $pictures; ?>slide3.jpg" alt="ERROR">
                            <div class="carousel-caption">
                                <h1>Des paysages à couper le souffle</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row block title-text">
            <?php
            if ($connected) {
                echo '            <div class=" spacer-md col-md-8 col-md-offset-2">
                <button type="button" class="btn btn-primary btn-block btn-lg">
                    <h2> Accéder à mon panier </h2>
                </button>
            </div>
            <div class="spacer-md col-md-8 col-md-offset-2">
                <button type="button" class="btn btn-primary btn-block btn-lg">
                    <h2>Changer mes options</h2>
                </button>
            </div>
            <div class="spacer-md col-md-8 col-md-offset-2">
                <h2 class="text-center">
                    <small>Bienvenue chez vous</small> 
                </h2>
            </div>';
            } else {
                echo '            <div class=" spacer-md col-md-8 col-md-offset-2">
                <a class="btn btn-primary btn-block btn-lg" href="' . site_url('Register') . '">
                    <h2> Inscrivez vous </h2>
                </a>
            </div>
            <div class="spacer-md col-md-8 col-md-offset-2">
                <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#connexion" aria-pressed="false" autocomplete="off">
                    <h2>Connectez vous </h2>
                </button>
            </div>
            <div class="spacer-md col-md-8 col-md-offset-2">
                <h3 class="text-center">
                    Vous ne pouvez créer un pack que si vous êts connecté
                </h3>
            </div>';
            }
            ?>



        </div>
        <!-- premier univers -->
        <div class="row text-center" style="background: url(<?php echo $pictures; ?>univers1.jpg) no-repeat fixed; background-size: auto 110%">
            <div class="col-md-12 block">
                <h1 style="color: white">L'aventure vous attend</h1>
            </div>
        </div>
        <!-- Les trois 'boutons'-->
        <div class="row text-center block title-text">
            <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <h3>Sélectionnez <br/> vos <br/> Activités </h3>
                </button>
            </div>
            <div class="col-md-1 vertical_align">
                <h2><span class="glyphicon glyphicon-plus"></span> </h2>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-block btn-lg " data-toggle="button" aria-pressed="false" autocomplete="off">
                    <h3>Sélectionnez <br/> votre <br/> Logement </h3>
                </button>
            </div>
            <div class="col-md-1 vertical_align">
                <h2><i class="glyphicon glyphicon-plus"></i> </h2>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <h3>Sélectionnez <br/> votre <br/> Transport </h3>
                </button>
            </div>
            <div class="col-md-1 vertical_align">
                <h2><span class="icon-eq"></span> </h2>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <h3>Créez <br/> votre <br/> Pack personalisé </h3>
                </button>
            </div>
        </div>

        <!-- second univers -->
        <div class="row block text-center" style="background: url(<?php echo $pictures; ?>univers3.jpeg) fixed no-repeat;background-size: auto 150%;">
            <h1>Faites le plein d'activités</h1>
        </div>

        <div class="row block title-text">
            <div class="col-md-8 col-md-offset-3">
                <h2>
                    <span class="glyphicon glyphicon-heart"></span>
                    Trouvez les packs qui vous correspondent
                </h2>
            </div>
            <div class="col-md-8 col-md-offset-3">
                <h2>
                    <span class="glyphicon glyphicon-camera"></span>
                    Partagez vos meilleurs expériences
                </h2>
            </div>
            <div class="col-md-8 col-md-offset-3">
                <h2>
                    <span class="glyphicon glyphicon-gift"></span>
                    Offrez des voyages à ceux que vous aimez
                </h2>
            </div>
            <div class="col-md-8 col-md-offset-3">
                <h2>
                    <span class="glyphicon glyphicon-wrench"></span>
                    Paramétrez vos recherche
                </h2>
            </div>
        </div>       
        <div class="row text-center" style="background: url(<?php echo $pictures; ?>univers2.jpg) fixed no-repeat;background-size: auto 100%">
            <div class="col-md-12 block">
                <h1 style="color: white">La montagne est là pour vous</h1>
            </div>
        </div>
    </div>