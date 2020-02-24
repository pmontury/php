<?php
   $title = 'Détails du film';
   require('inc/func.php');
   include('inc/data.php');

   $goodmovie = array();
   $goodmovie = findMovie($_GET['id']);

   include('inc/header.php');

   getDetails($goodmovie);

   include('inc/footer.php');
?>
