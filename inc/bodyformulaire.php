<div class="wrap">
   <br>
   <form action="formulaire.php" method="post">
      <?= buildInput('nom', 'text', $errors) ?>
      <br/>
      <?= buildInput('prenom', 'text', $errors) ?>
      <br/>
      <?= buildInput('mail', 'mail', $errors) ?>
      <br/>
      <?= buildTextArea('message', 8, 40, $errors); ?>
      <br/>
      <?= buildInput('age', 'number', $errors) ?>
      <br/>
      <?= buildSelectCouleur($couleurs, $errors); ?>
      <br/>
      <input type="submit" name="submitted" value="Envoyer">
   </form>
   <br>
</div>
