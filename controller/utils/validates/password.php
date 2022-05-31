<?php
function validatePassword($password)
{
  if (strlen($password) < 8) {
    return 'Sua senha tem que ter mais de 8 caracteres';
  }
  if (!preg_match('/[A-Z]/', $password)) {
    return 'Sua senha precisa ter pelo menos uma letra maiúscula';
  }
  if (!preg_match('/[a-z]/', $password)) {
    return 'Sua senha precisa ter pelo menos uma letra minúscula';
  }
  if (!preg_match('/[0-9]/', $password)) {
    return 'Sua senha precisa ter pelo menos um número';
  }
  return null;
}
