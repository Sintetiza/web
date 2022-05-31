<?php

require('../../controller/utils/insertInDatabase.php');
require('../../controller/utils/getFormFields.php');

$email = getFormField('email');
$password = getFormField('password');

// validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error = 'Invalid email';
  include('../../view/pages/register.php');
  exit;
}

// validate password

