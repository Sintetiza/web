<?php
function validateCPF($CPF)
{
  $CPF = preg_replace('/[^0-9]/', '', $CPF);
  $digitoA = 0;
  $digitoB = 0;
  $somaA = 0;
  $somaB = 0;
  $restoA = 0;
  $restoB = 0;
  $tamanho = strlen($CPF);
  if ($tamanho != 11) {
    return false;
  }
  $digitoA = substr($CPF, 9, 2);
  $somaA = ($CPF[0] * 10) + ($CPF[1] * 9) + ($CPF[2] * 8) + ($CPF[3] * 7) + ($CPF[4] * 6) + ($CPF[5] * 5) + ($CPF[6] * 4) + ($CPF[7] * 3) + ($CPF[8] * 2);
  $restoA = $somaA % 11;
  $digitoA = $restoA < 2 ? 0 : 11 - $restoA;
  $digitoB = substr($CPF, 10, 2);
  $somaB = ($CPF[0] * 11) + ($CPF[1] * 10) + ($CPF[2] * 9) + ($CPF[3] * 8) + ($CPF[4] * 7) + ($CPF[5] * 6) + ($CPF[6] * 5) + ($CPF[7] * 4) + ($CPF[8] * 3) + ($CPF[9] * 2);
  $restoB = $somaB % 11;
  $digitoB = $restoB < 2 ? 0 : 11 - $restoB;
  return ($digitoA == $digitoB);
}
