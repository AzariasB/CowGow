<?php
//On récupère les infos concernant la création d'un pack
$pack = $this->session->userdata('creer');

?>

<div class="row" id="divLogement">
    <div class="col-md-8">
        <h2>Logement :</h2>
    </div>
    <div class="col-md-4">
        <h3>Prix : </h3>
    </div>
    
    
</div><!-- /.logement -->
<div class="row" id="divTransport">
    <div class="col-md-8">
        <h2>Transport :</h2>
    </div>
    <div class="col-md-4">
        <h3>Prix : </h3>
    </div>
    
   
</div><!-- /.transport -->


<div id="divActivites">
    <h2>Activité :</h2>
</div><!-- /.activites -->
<div class="row">
    <div class="col-md-4 text-center">
        <button type="button" class="btn btn-default">Sauvegarder le pack</button>
    </div>
    <div class="col-md-4 text-center">
        <button type="button" class="btn btn-success">Ajouter au panier</button>
    </div>
    <div class="col-md-4 text-center">
        <button type="button" class="btn btn-warning">Supprimer le pack</button>
    </div>
</div>
</div><!-- /.activities -->
<br/>

</body>
</html>