<?php

 session_start();
require_once ("class.conexion.php");
$pdo = new Conexion();
$id_codigo =$_POST['codigo'];
$RutProfesor=$_SESSION["k_username"];
$Result_3=$pdo->query("SELECT  distinct Seccion  from Maestro where CodigoRamo='$id_codigo' and RutProfesor='$RutProfesor'");


    $html= "<option value='0'>Selecionar Seccion</option>";
      while($row=$Result_3->fetch(PDO::FETCH_ASSOC))
     {
     $html.= "<option value='".$row['Seccion']."'>".$row['Seccion']."</option>";
     }
     // $hmtl.="<input type='hidden' name='hiddenseccion' value='".$row['Seccion']."''>";

   echo $html;﻿

  ?>
