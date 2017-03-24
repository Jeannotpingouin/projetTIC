<?php require_once ("Includes/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="bower_components/materialize/dist/css/materialize.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <header>  
<nav>
  <div class="nav-wrapper teal ">
    <a href="/projetTIC/index.php" class="brand-logo">  Agence de location</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
     <?php
      if (logged_on())
      {
      ?>
     <li><a href="/projetTIC/creation-et-modif-locataires.php">Créer/Modifier des locataires</a></li>
        <li><a href="/projetTIC/creation-et-modif-biens.php">Créer des biens</a></li>
        <li><a href="/projetTIC/creation-et-modif-bails.php">Créer un bail</a></li>
      <!-- Onglet de droite de connection-->
      <?php
       } if (logged_on())
      {
      ?>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown_connexion_normal"><i class="material-icons left">perm_identity</i><?php if (logged_on()) { echo (ucfirst($_SESSION['username']));} ?><i class="material-icons right">arrow_drop_down</i></a></li>
      <ul id='dropdown_connexion_normal' class='dropdown-content'>
        <li><a href="/projetTIC/logoff.php">Se déconnecter</a></li>
      </ul>
      <?php } else {?>
      <li><a href="/projetTIC/logon.php"><i class="material-icons left">power_settings_new</i>Se Connecter</a></li>
      <?php } ?>
    </ul>

   <ul class="side-nav" id="mobile-demo">
    <?php
      if (logged_on())
      {
      ?>
      <li><a href="/projetTIC/creation-et-modif-locataires.php">Créer/Modifier des locataires</a></li>
        <li><a href="/projetTIC/creation-et-modif-biens.php">Créer des biens</a></li>
        <li><a href="/projetTIC/creation-et-modif-bails.php">Créer un bail</a></li>
      <?php
      }if (logged_on())
      {
      ?>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown_connexion_mobile"><i class="material-icons left">perm_identity</i><?php if (logged_on()) { echo (ucfirst($_SESSION['username']));} ?><i class="material-icons right">arrow_drop_down</i></a></li>
      <ul id='dropdown_connexion_mobile' class='dropdown-content'>
        <li><a href="/projetTIC/logoff.php">Se déconnecter</a></li>
      </ul>
      <?php } else {?>
      <li><a href="/projetTIC/logon.php"><i class="material-icons left">power_settings_new</i>Se Connecter</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>
</header>
<main>

