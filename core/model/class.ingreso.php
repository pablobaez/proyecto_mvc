<?php

class ingreso{
  public function grabarnotas()
  {
  session_start();
  $pdo = new Conexion();
  $rutprofesor=$_SESSION["k_username"];
  $cantidad =$_POST["cantidadhidden"];
  $asignatura=$_POST["codigoasignatura"];
    // $cantidad= $cantidad -1;
  $Contarponderadores=$pdo->query("select count(*) as result from  Ponderadores where idramo=$asignatura");
  $ponde=$Contarponderadores->fetch(PDO::FETCH_ASSOC);
  $ponde=$ponde["result"];


   if($ponde=='0')
   {
    $sql="INSERT INTO Ponderadores (idramo, p1, p2, p3, p4, p5) VALUES (:CodigoAsig,:P1,:P2,:P3,:P4,:P5)";
    $ponderador=$pdo->prepare($sql);
    $ponderador->blinParam(':CodigoAsig',$asignatura);
    $ponderador->blinParam(':P1',$_POST[p1]);
    $ponderador->blinParam(':P2',$_POST[p2]);
    $ponderador->blinParam(':P3',$_POST[p3]);
    $ponderador->blinParam(':P4',$_POST[p4]);
    $ponderador->blinParam(':P5',$_POST[p5]);
    $ponderador->execute();
   }
   elseif ($ponde=='1')
   {
    $p1=$_POST["p1"];
    $p2=$_POST["p2"];
    $p3=$_POST["p3"];
    $p4=$_POST["p4"];
    $p5=$_POST["p5"];
    $query=$pdo->prepare("UPDATE ponderadores set p1=:p1, p2=:p2, p3=:p3, p4=:p4, p5=:p5 where idramo=:idramo");
    $ponderadores=$query->execute(['idramo'=>$asignatura,'p1'=>$p1,'p2'=>$p2,'p3'=>$p3,'p4'=>$p4,'p5'=>$p5]);
    // var_dump($p1);
    // die();
   }
    for($x=2; $x<=$cantidad;$x++)
    {
      $rutalumno=$_POST[rutalumnohidden.$x];
      $report=$_POST[Reportes.$x];
      $informe1=$_POST[Informe1.$x];
      $informe2=$_POST[Informe2.$x];
      $prueba1=$_POST[Prueba1.$x];
      $prueba2=$_POST[Prueba2.$x];
      $result_1=$pdo->query("select count(*) as cantalu from Notas where RutAlumno='$rutalumno'");
      $row_1=$result_1->fetch(PDO::FETCH_ASSOC);

      if ($row_1["cantalu"]=='0')
      {
        $sql="INSERT INTO notas (RutAlumno, CodigoRamo, Reporte, Informe1, Informe2, Prueba1, Prueba2) VALUES (:RutAlumno,:asig,:report,:Informe1,:Informe2,:Prueba1,:Prueba2)";
        $result_1=$pdo->prepare($sql);
        $result_1->bindParam(':RutAlumno',$rutalumno);
        $result_1->bindParam(':asig',$asignatura);
        $result_1->bindParam(':report',$report);
        $result_1->bindParam(':Informe1',$informe1);
        $result_1->bindParam(':Informe2',$informe2);
        $result_1->bindParam(':Prueba1',$prueba1);
        $result_1->bindParam(':Prueba2',$prueba2);
        $result_1->execute();
      }
      elseif($row_1["cantalu"]=='1')
      {
        $query=$pdo->prepare("UPDATE notas set Reporte=:Reporte, Informe1=:Informe1, Informe2=:Informe2, Prueba1=:Prueba1, Prueba2=:Prueba2 where RutAlumno=:rutalumno");
        $result_1=$query->execute(['rutalumno'=>$rutalumno,'Reporte'=>$report,'Informe1'=>$informe1,'Informe2'=>$informe2,'Prueba1'=>$prueba1,'Prueba2'=>$prueba2]);
      }

      header ("location:?view=ingnotas&success");


      mysql_close;
    }


}
}

  ?>
