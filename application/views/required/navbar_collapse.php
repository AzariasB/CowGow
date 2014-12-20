<?php
$css = Myglobals_model::$css;
?>

<!-- Custom CSS -->
<link href="<?php echo $css; ?>simple-sidebar.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br><br>
                <hr>
                <li>
                    <a href="#">Mon compte</a>

                </li>
                <li>
                    <a href="#">Mes options</a>

                </li>
                <li>
                    <a href="#">Mon panier</a>
                </li>
                <hr>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="change_groupe_chevron('logement', ['transport', 'activite']);">
                                    Logement
                                    <span class="glyphicon glyphicon-chevron-up pull-right" id="logement" ></span>    
                                </a>
                            </h4>    
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <li>
                                    <a href="#" data-target="#t_logement" data-toggle="modal">
                                        Par type
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-target="#l_logement" data-toggle="modal">
                                        Par lieu
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"  onclick="change_groupe_chevron('transport', ['logement', 'activite']);">
                                    Transport
                                    <span class="glyphicon glyphicon-chevron-down pull-right" id="transport"></span>    
                                </a>
                            </h4>    
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <li>
                                    <a href="#" data-target="#a_transport" data-toggle="modal">
                                        Par lieu d'arrivée
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-target="#d_transport" data-toggle="modal">
                                        Par lieu de départ
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" onclick="change_groupe_chevron('activite', ['transport', 'logement']);">
                                    Activités
                                    <span class="glyphicon glyphicon-chevron-down pull-right" id="activite"></span>    
                                </a>
                            </h4>    
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <li>
                                    <a href="#" data-target="#l_activite" data-toggle="modal">
                                        Par lieu
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-target="#s_activite" data-toggle="modal">
                                        Par saison
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">Déconnexion</a>
                </li>
            </ul>
        </div>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid navbar navbar-fixed-top">
                <div class="row" id="bouton" style="padding-top: 10px;">
                    <div class="col-sm-1">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                            <span class="btn-default glyphicon icon-menu"></span> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- Menu Toggle Script -->
    <script>
        $(function() {
            $("#wrapper").toggleClass("toggled");
        })

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
