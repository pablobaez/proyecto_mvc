<?php

if($_GET)
{
  include('core/model/class.acceso.php');
  $acceso=new acceso();
  $acceso->menuprofes();
  // $template=new Smarty();
  // $template->assign('rutprofe', 'hola');
  // $template->display('public/menuprofe.tpl');

}
else{
  $template=new Smarty();
  $template->display('sisnotas/login.tpl');
}
 ?>
