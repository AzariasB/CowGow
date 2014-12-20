<?php
$this->load->library('form_validation');
$this->load->view('modals/login_modal');
$session = $this->session->userdata('logged_in');
$connected = isset($session['pseudo']) && $session['pseudo'] != NULL;
?>
<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top navbar-collapse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-center" href="#"><img src="<?php echo $pictures; ?>logo.png" alt="logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url('Static_pages/accueil'); ?>">Accueil</a></li>
                <?php
                if ($connected) {
                    //A compléter pour avoir des liens fonctionnels
                    echo '<li><a href="'.  site_url('Static_pages/services') ;
                    echo '">Consulter les offres</a></li>';
                    echo '<li><a href="#">Créer un pack</a></li>';
                    echo '<li class="disabled"><a href="#" class="disabled">Mon panier</a></li>';
                } else {
                    $register = site_url('Register');
                    echo "<li><a href=\"$register\">S'inscrire</a></li>";
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ($connected) {
                    $this->load->view('navbar/dropdown', array('pseudo' => $session['pseudo']));
                } else {
                    echo ' <li><a href="#" data-target="#connexion" data-toggle="modal">Se connecter</a></li>';
                }
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- Modal -->
