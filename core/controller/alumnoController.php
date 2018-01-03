<?php


 if(isset($_POST["btnbuscar"]))
 {
   include('core/model/class.acceso.php');
   $acceso=new acceso();
   $acceso->buscarnotas();
 }
 if(isset($_POST["btnnotas"]))
 {

    if($_POST["cantidadhidden"]=="")
    {
    echo"<script type=\"text/javascript\">alert('Falta ingresar información'); window.location='?view=ingnotas';</script>";
    }
    else
      {
        include('core/model/class.ingreso.php');
        $ingreso=new ingreso();
        $ingreso->grabarnotas();
      }

 }

 if(isset($_POST["btnexcel"]))
 {
   include('core/model/class.report.php');
   $reporte=new Reportes();
   $reporte->reporteExcel();
 }


 if(isset($_POST["btnpdf"]))
 {
   include('core/model/class.report.php');
   $reporte=new Reportes();
   $reporte->reportePDF();
 }

 if(isset($_POST["btnvolver"]))
 {
     header ("location:?view=menuprofe");
 }
 ?>
