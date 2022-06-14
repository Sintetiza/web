<?php

function singnout()
{
  session_start();
  session_destroy();
  header('Location: ../index.php');
}

singnout();
