<?php
if(isset($_POST["btnreport"]))
{
  session_start();
  $pdo = new Conexion();
  $template =new Smarty();
  // include('core/model/class.ingreso.php');
  // $ingreso=new ingreso();
  $cantidadalu=$_POST["cantidadhidden"];
  $asig=$_POST["codigoasignatura"];
  $fecha = date("Y/m/d");
  $secc = $_POST["seccionhidden"];
  $profe= $_POST["nombreprofe"];
  $nombreasig=$_POST["nombreasignatura"];
  // var_dump("$nombreasig");
  // die();
  for($x=2;$x<=$cantidadalu;$x++)
  {
    $rutalumno=$_POST[rutalumnohidden.$x];
    $report=$_POST[reportes.$x];

    $result_1=$pdo->prepare('select count(*) as alumno from notas_reporte where rut_alumno=:rutalumno');
    $result_1->bindValue(':rutalumno', $rutalumno, PDO::PARAM_INT);
		$result_1->execute();
    $alumno=$result_1->fetch(PDO::FETCH_ASSOC);

    if (!empty($report)){
      $sql="INSERT INTO notas_reporte (rut_alumno, notas_report, fecha_add_notas_report) VALUES (:rut_alumno,:notas_report,:fecha_add_notas_report)";
      $result_2=$pdo->prepare($sql);
      $result_2->bindParam(':rut_alumno',$rutalumno);
      $result_2->bindParam(':notas_report',$report);
      $result_2->bindParam(':fecha_add_notas_report',$fecha);
      $result_2->execute();
    }

  }
header("location:?view=ingreport&asig=$asig&secc=$secc&profe=$profe&nombreasig=$nombreasig");
}
if (isset($_POST["btnvolver"]))
{
     header ("location:?view=ingnotas");
}
?>
