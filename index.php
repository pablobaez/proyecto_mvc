<?php
$view = isset($_GET['view'])? $_GET['view']: 'index';
require('core/libs/smarty/libs/Smarty.class.php');
require('core/model/class.conexion.php');
if(file_exists('core/controller/'.$view.'Controller.php'))
{
  include('core/controller/'.$view.'Controller.php');
}
else
{

}
 ?>
