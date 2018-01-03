<?php

if($_GET)
{
  include('core/model/class.acceso.php');
  $acceso=new acceso();
  $acceso->ingnotas();
}




?>
