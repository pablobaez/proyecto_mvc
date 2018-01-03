<?php

if($_POST)
{
  include('core/model/class.acceso.php');
  $acceso=new acceso();
  $acceso->Login();
}
else{
  $template=new Smarty();
  $template->display('sisnotas/login.tpl');
}
 ?>
