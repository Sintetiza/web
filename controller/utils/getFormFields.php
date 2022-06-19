<?php
function getFormField($fieldName)
{
  $field = $_POST[$fieldName];
  if (isset($field)) {
    return $field;
  }
  return null;
}

function getMultipleFormFields($fieldsNames)
{
  $fields = array();
  foreach ($fieldsNames as $fieldName) {
    $field = getFormField($fieldName);
    if (isset($field)) {
      $fields[] = $field;
    }
  }
  return $fields;
}
