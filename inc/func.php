<?php

function br()
{  echo '<br/>';
}

function debug(array $array)
{  echo '<pre>';
   print_r($array);
   echo '</pre>';
}

function getErrorText($errors, $key)
{  if (count($errors) AND !empty($errors[$key]))
      return $errors[$key];
}

function forXSS($field)
{  return trim(strip_tags($_POST[$field]));
}

function getPostValue($key)
{  if (!empty($_POST[$key]))
   return trim(strip_tags($_POST[$key]));
}

function verifSaisie($field, $key, $minSize, $maxSize, $errors, $obligatoire = true)
{  if (empty($field))
   {  if ($obligatoire)
      {  $errors[$key] = 'Veuillez renseigner le champ';
      }
   }
   elseif (mb_strlen($field) < $minSize)
   {  $errors[$key] = 'Veuillez saisir au moins ' . $minSize . ' caractères';
   }
   elseif (mb_strlen($field) > $maxSize)
   {  $errors[$key] = 'Saisie limitée à ' . $maxSize . ' caractères';
   }
   return $errors;
}

function verifMail($field, $key, $errors, $obligatoire = true)
{  if (empty($field))
   {  if ($obligatoire)
      {  $errors[$key] = 'Veuillez renseigner l\'adresse mail';
      }
   }
   elseif (!filter_var($field, FILTER_VALIDATE_EMAIL))
   {  $errors[$key] = 'Adresse mail invalide';
   }
   return $errors;
}

function verifAge($field, $key, $errors, $obligatoire = true)
{  if (mb_strlen($field) == 0)
   {  if ($obligatoire)
      {  $errors[$key] = 'Veuillez saisir l\'âge';
      }
   }
   elseif ((int)$field != 0 AND !filter_var($field, FILTER_VALIDATE_INT))
   {  $errors[$key] = 'Age invalide';
   }
   elseif ((int)$field <= 0)
   {  $errors[$key] = 'L\'âge doit être supérieur à 0';
   }
   return $errors;
}

function verifCouleur($field, $key, $errors, $obligatoire = true)
{  if (empty($field) AND $obligatoire)
   {  $errors[$key] = 'Veuillez choisir une couleur';
   }
   return $errors;
}

function buildSelectCouleur($couleurs, $errors)
{  $selected = getPostValue('couleur');
   $select = '<label for="couleur">Couleur *</label>';
   $select .= '<select class="" name="couleur" id="couleur">';
   $select .= '<option value="">-- Sélectionnez une couleur --</option>';
   foreach ($couleurs as $couleur)
   {  if ($couleur == $selected)
      {  $select .= '<option value="' . $couleur . '" selected>' . ucfirst($couleur) . '</option>';
      }
      else
      {  $select .= '<option value="' . $couleur . '">' . ucfirst($couleur) . '</option>';
      }
   }
   $select .= '</select>';
   $select .= '<p class="error">' . getErrorText($errors, 'couleur') . '</p>';
   return $select;
}

function buildInput($name, $type, $errors)
{  $html = '<label for="'. $name . '">' . ucfirst($name) . '*</label>';
   $html .= '<input type="' . $type . '" name="' . $name . '" id="' . $name . '" value="' . getPostValue($name) . '">';
   $html .= '<p class="error">' . getErrorText($errors, $name) . '</p>';
   return $html;
}

function buildTextArea($name, $rows, $cols, $errors)
{  $html = '<label for="'. $name . '">' . ucfirst($name) . '*</label>';
   $html .= '<textarea name="'. $name .'" id="'. $name .'" rows="' . $rows . '" cols="' . $cols . '">' . getPostValue($name) . '</textarea>';
   $html .= '<p class="error">' . getErrorText($errors, $name) . '</p>';
   return $html;
}






?>
