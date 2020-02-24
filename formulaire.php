
<?php
   require('inc/func.php');
   $title = 'Les formulaires';

// Des couleurs
   $couleurs = array('bleu', 'noire', 'rouge', 'vert', 'jaune');

// Traitement du formulaire
   $errors = array();
   $success = false;

   if (!empty($_POST['submitted']))    // Formulaire soumis ?
   {  // Failles XSS
      $nom = forXSS('nom');
      $prenom = forXSS('prenom');
      $mail = forXSS('mail');
      $message = forXSS('message');
      $age = forXSS('age');
      $couleur = forXSS('couleur');

// Vérification de la saisie
      $errors = verifSaisie($nom, 'nom', 3, 100, $errors);
      $errors = verifSaisie($prenom, 'prenom', 2, 70, $errors);
      $errors = verifMail($mail, 'mail', $errors);
      $errors = verifSaisie($message, 'message', 10, 500, $errors);
      $errors = verifAge($age, 'age', $errors);
      $errors = verifCouleur($couleur, 'couleur', $errors);

      if (!count($errors))
      {   $success = true;
      }
   }

//   debug($_POST);

   include('inc/header.php');

   if (!$success)
   {  include('inc/bodyformulaire.php');
   }
   else
   {  include('inc/successformulaire.php');
   }

   include('inc/footer.php');
