<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        $this->load->helper('url');
        $pictures = Myglobals_model::$pictures;
        $css = Myglobals_model::$css;
        $javascript = Myglobals_model::$javascript;
        ?>
        <meta charset="utf-8">
        <title>Cow Gow.fr</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" type="image/png" href="<?php echo $pictures ?>logo.png "/>

        <link rel="stylesheet" href="<?php echo $css; ?>bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/glyphicon/css/fontello.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/glyphicon/css/animation.css"/>
        <link rel="stylesheet" href="<?php echo $javascript?>jquery-ui/jquery-ui.css" />

        <script  type="text/javascript" src="<?php echo $javascript; ?>jquery.js"></script>
        <script  type="text/javascript" src="<?php echo $javascript; ?>bootstrap.js"></script>
        <script  type="text/javascript" src="<?php echo $javascript; ?>jquery-ui/jquery-ui.js"></script>
        <script  type="text/javascript" src="<?php echo $javascript; ?>init.js"></script>
        <script  type="text/javascript" src="<?php echo $javascript; ?>myjavascript.js"></script>
