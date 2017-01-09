<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Controlador ControlX">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">

    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="/images/favicon/mstile-144x144.png">

    <title>Control X<?php if (isset($page_title)) { echo ' | '.$page_title; } ?></title>


    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
     
    <script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
     
    <script src="<?php echo base_url(); ?>assets/js/angular-route.min.js"></script>
     
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.php"></script>
    
    <link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
 
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-panel.css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <link href="<?php echo base_url(); ?>assets/css/custom/custom.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/ng-materialize.min.css" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/waves.min.css" /> -->

    <?php if ($page_title == 'Login') {
        echo "<link href=\"".base_url()."assets/css/layouts/page-center.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen,projection\">"; 
        }
    ?>
    
    <!--[if IE]>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleIE.css" />
    <![endif]-->
</head>
<body ng-app="controlx">