
<?php
   $title = 'Les formulaires';
   require('inc/func.php');

   // debug($_GET);

   include('inc/header.php');
?>

<div class="wrap">
   <form action="" method="get">
      <label for="nom">Nom *</label>
      <input type="text" name="nom" id="nom" value="">
      <br/>
      <label for="prenom">Prénom *</label>
      <input type="text" name="prenom" id="prenom" value="">
      <input type="submit" name="submitted" value="Envoyer">
   </form>

   <?php
      if (!empty($_GET['nom']) AND !empty($_GET['prenom']))
      {  br();
         echo '<p>Bonjour ' . ($_GET['prenom']) . ' ' . ($_GET['nom']) . '</p>';
      }
    ?>
</div>

<?php include('inc/footer.php');
