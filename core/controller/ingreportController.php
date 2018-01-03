<?php
// include('core/model/class.acceso.php');
// $acceso=new acceso();
// $acceso->buscarnotas();
if(isset($_GET["view"]))
{
  session_start();
	$pdo = new Conexion();
	$template =new Smarty();
  $rut=$_SESSION["k_username"];
  $asig=$_GET["asig"];
  $sec=$_GET["secc"];
  $n=1;

  $result_1=$pdo->prepare('select RutAlumno, Alumno from maestro where RutProfesor=:rut and CodigoRamo=:asig and Seccion=:secc order by Alumno Asc');
  $result_1->bindValue(':rut',$rut, PDO::PARAM_STR);
  $result_1->bindValue(':asig',$asig, PDO::PARAM_INT);
  $result_1->bindValue(':secc',$sec, PDO::PARAM_INT);
  $result_1->execute();
while($alumno=$result_1->fetch(PDO::FETCH_ASSOC))
{
    $result_2=$pdo->prepare('SELECT rut_alumno,notas_report from notas_reporte where rut_alumno=:rutalumno');
    $result_2->bindValue(':rutalumno', $alumno["RutAlumno"], PDO::PARAM_STR);
    $result_2->execute();
    while($reporte=$result_2->fetch(PDO::FETCH_ASSOC))
    {
    $notasreport[]=array('notasreport'=>$reporte["notas_report"]);
    }
    $datosalumno[]=array(
    'RutAlumno'=> $alumno["RutAlumno"],
    'Alumno' => $alumno["Alumno"]);
}
// var_dump($datosalumno,$notasreport);
// die();




  $template->assign('rutprofe',$rut);
  $template->assign('NombreProfesor',$_GET["profe"]);
  $template->assign('nombre_asig',$_GET["nombreasig"]);
  $template->assign('codigo_asig',$_GET["asig"]);
  $template->assign('seccion',$_GET["secc"]);
  $template->assign('n',$n);
  $template->assign('Result_Report',$notasreport);
  $template->assign('Result_Alum',$datosalumno);
  $template->assign('Result_Report',$notasreport);
  $template->display('sisnotas/ingreport.tpl');
}



?>
