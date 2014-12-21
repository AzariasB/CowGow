
<!-- Modal -->
<head>
    <link  rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/services.css" />
    
    <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.css"/>
    <script  type="text/javascript" src="assets/js/jquery.js"></script>
    <script  type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script  type="text/javascript" src="assets/js/jquery.js"></script>
</head>

<body>
    <div class="logement" id="divLogement">
        <h1>Logement :</h1>
                <table class="table table-bordered">
                    <td><p> <img src="pictures/logement.jpg" alt="img_logement" height="120" width="200"></p></td>
                    <td><h3>Intitulé</h3>
                        <table>
                            <td><a class="text-center" href="#"><img src="pictures/etoile-notation.png" alt="logo" height="27" width="27"></a></td>
                            <td><a class="text-center" href="#"><img src="pictures/etoile-notation.png" alt="logo" height="27" width="27"></a></td>
                            <td><a class="text-center" href="#"><img src="pictures/etoile-notation.png" alt="logo" height="27" width="27"></a></td>
                            <td><a class="text-center" href="#"><img src="pictures/etoile-notation.png" alt="logo" height="27" width="27"></a></td>
                            <td><a class="text-center" href="#"><img src="pictures/etoile-notation-vide.png" alt="logo" height="27" width="27"></a></td>
                        </table>
                        <h3>Description :</h3><h5>Chalet posey tranquille pour 100 personnes au soleil</td>
                    <td><h3>Prix : </h3><td>
                </table>';        
    </div><!-- /.logement -->
    <div class="transport" id="divTransport">
        <h1>Transport :</h1>
        <table class="table table-bordered">
            <td><p> <img src="pictures/transport.jpg" alt="Smiley face" height="120" width="200"> </p></td>
            <td><h3>Intitulé</h3>
                <table>
                    <td><a class="text-center" href="#"><img src="pictures/etoile-notation.png" alt="logo" height="27" width="27"></a></td>
                    <td><a class="text-center" href="#"><img src="pictures/etoile-notation.png" alt="logo" height="27" width="27"></a></td>
                    <td><a class="text-center" href="#"><img src="pictures/etoile-notation.png" alt="logo" height="27" width="27"></a></td>
                    <td><a class="text-center" href="#"><img src="pictures/etoile-notation-vide.png" alt="logo" height="27" width="27"></a></td>
                    <td><a class="text-center" href="#"><img src="pictures/etoile-notation-vide.png" alt="logo" height="27" width="27"></a></td>
                </table>
                <h3>Description :</h3><h5>Limousine posey tranquille pour 30 personnes au soleil</td>
            <td><h3>Prix : </h3><td>
        </table><!-- /.table-bordered -->
    </div><!-- /.transport -->
    <div id="divActivites">
        <h1>Activité :</h1>
        <table class="table table-bordered">
            <td><table class="table table-bordered table-scroll">
                    <th><h2><span class="glyphicon glyphicon-arrow-left"></h2></span></th>
                    <?php
                    $j = 6 - getdate()["wday"];
                    for ($i = 0; $i < 8; $i++) {
                        printf('<th class="text-center">');
                        $today = date("l d/n/Y", mktime(0, 0, 0, date("n"), date("j") + $i + $j, date("Y")));
                        printf($today);
                        printf(" </th>");
                    }
                    printf("</tr>");
                    for ($i = 0; $i < 25; $i++) {
                        echo '<tr><th><div class="row text-center">';
                        echo $i;
                        echo ':00';
                        printf("</div></th>\n");
                        for ($j = 0; $j < 8; $j++) {
                            echo '<td><div>';

                            echo '<img src="pictures/logo.png" alt="logo"/></div>';
                            echo "</td>\n";
                        }
                    }
                        ?>
                    </table><!-- /.table-bordered -->
                <h5>Choisissez vos activités ci dessus</h5></td>
                    <h3>Description :</h3>
                        <td><h3>Prix total : </h3></td>
                            </table><!-- /.table-bordered -->
                            </div><!-- /.activites -->
                            <div>
                                <table class="table table-bordered">
                                    <td><button type="button" class="btn btn-default">Sauvegarder le pack</button></td>
                                    <td><button type="button" class="btn btn-warning">Supprimer le pack</button></td>
                                    <td><button type="button" class="btn btn-success">Ajouter au panier</button></td>
                                </table>
                            </div>
     </div><!-- /.activities -->
       
                            
</body>