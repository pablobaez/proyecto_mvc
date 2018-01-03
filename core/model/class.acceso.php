<?php

class acceso{

public function login()
{
$usuario=strtolower(htmlentities($_POST['txtusuario'], ENT_QUOTES));
$password=md5($_POST['txtclave']);
session_start();
//require('class.conexion.php');
$pdo = new Conexion();

if($_POST['rad']=="profesores")
{
		if(trim($_POST["txtusuario"]) !="" && trim($_POST["txtclave"]) != "")
		{
  		//Resultado a traves de PDO
			 $result = $pdo->query("SELECT RutProfesor,ClaveProfesor,NombreProfesor  FROM Profesor WHERE RutProfesor='$usuario'");
			 if($row = $result->fetch(PDO::FETCH_ASSOC))
			 {
			 if($row["ClaveProfesor"]==$password)
			 	{

			 			if($row["RutProfesor"]==$usuario)
			 			{
			 				$_SESSION["k_username"] = $row['RutProfesor'];
			 				Header("Location:?view=menuprofe");
          	}
			 			else
			 			{
			 			echo"<script type=\"text/javascript\">alert('Usuario incorrecto'); window.location='?view=login';</script>";
			 			}
			 	}
			 	else
			 	{
			 		echo"<script type=\"text/javascript\">alert('Password incorrecto'); window.location='?view=login';</script>";
			 	}

			 }
       else {
         echo "no entre";
       }
			// mysql_free_result($result);
      //$pdo->liberar($result);
      //$pdo->close();
		}
		else
		{
			echo"<script type=\"text/javascript\">alert('Debe especificar un usuario y password'); window.location='?view=login';</script>";
		}
}
//cordinadores
if($_POST[rad]=="cordinadores")
{
	if(trim($_POST["txtusuario"]) !="" && trim($_POST["txtclave"]) != "")
	{
		$Cordinador=mysql_query("SELECT Cordinador.rutcordinador, Profesor.ClaveProfesor FROM Cordinador inner JOIN Profesor on Cordinador.rutcordinador=Profesor.RutProfesor where Cordinador.rutcordinador='$usuario'");
		$row=mysql_fetch_array($Cordinador);
		if ($row["rutcordinador"]==$usuario)
		{
			if ($row["ClaveProfesor"]==$password)
			{
				$_SESSION["k_username"] = $row['rutcordinador'];
				Header("Location:menucordinador.php");
			}
		}

  }
}
//funcionarios
if($_POST[rad]=="funcionarios")
{
	if(trim($_POST["txtusuario"]) !="" && trim($_POST["txtclave"]) != "")
	{
	Header("Location:menufuncionarios.php");
  }
}

if($_POST[rad]=="")
{
	echo"<script type=\"text/javascript\">alert('Debe elegir alguna opcion'); window.location='?view=login';</script>";
}
//mysql_close();
}
public function menuprofes()
{

	session_start();
	$pdo = new Conexion();
	$template =new Smarty();

		if (isset($_SESSION["k_username"]))
		{
			/*opcion distinta con pdo*/
			// $result_1=$pdo->prepare("SELECT * FROM profesor");
			// $result_1->execute();
			// $result_1->setFetchMode(PDO::FETCH_LAZY);
			$RutProfesor=$_SESSION["k_username"];

			$result_1=$pdo->query("SELECT RutProfesor,ClaveProfesor,NombreProfesor  FROM profesor WHERE RutProfesor='$RutProfesor'");
			$result_2=$pdo->query("SELECT distinct Ramo.Asignatura as asignatura, Ramo.Codigo as codigo from Ramo inner join Maestro on Ramo.Codigo=Maestro.CodigoRamo where Maestro.RutProfesor='$RutProfesor'");
			if ($row_1=$result_1->fetch(PDO::FETCH_ASSOC))
      {
			//$row_2=$result_2->fetch(PDO::FETCH_ASSOC);
			$template->assign('rutprofe', $RutProfesor);
			$template->assign('NombreProfesor',$row_1["NombreProfesor"]);
			//$template->assign('Asignatura',$row_2["Asignatura"]);
					while ($row_2=$result_2->fetch(PDO::FETCH_ASSOC))
					{
					$datos[]=array(
						'nombre_asignatura'=>$row_2['asignatura'],
						'codigo_asignatura'=>$row_2["codigo"]
					);
					}
					$template->assign('Result_Asig',$datos);
			}

		}
		$template->display('sisnotas/menuprofe.tpl');
}
public function ingnotas()
{
session_start();
$pdo = new Conexion();
$template =new Smarty();

	if (isset($_SESSION["k_username"]))
	{
		$RutProfesor=$_SESSION["k_username"];
		//$result_1=$pdo->query("SELECT RutProfesor,ClaveProfesor,NombreProfesor  FROM profesor WHERE RutProfesor='$RutProfesor'");
		$result_2=$pdo->prepare('SELECT distinct Ramo.Asignatura as asignatura, Ramo.Codigo as codigo from Ramo inner join Maestro on Ramo.Codigo=Maestro.CodigoRamo where Maestro.RutProfesor=:RutProfesor');
		$result_2->bindValue(':RutProfesor', $RutProfesor, PDO::PARAM_INT);
		$result_2->execute();
		//sql preparado
		$result_1=$pdo->prepare('SELECT RutProfesor,ClaveProfesor,NombreProfesor  FROM profesor WHERE RutProfesor=:RutProfesor');
		$result_1->bindValue(':RutProfesor', $RutProfesor, PDO::PARAM_INT);
		$result_1->execute();
		$row_1=$result_1->fetch(PDO::FETCH_ASSOC);
		$template->assign('rutprofe', $RutProfesor);
		$template->assign('NombreProfesor',$row_1["NombreProfesor"]);
		/*sql preparado*/
		while ($row_2=$result_2->fetch(PDO::FETCH_ASSOC))
		{
		$datos[]=array(
			'nombre_asignatura'=>$row_2['asignatura'],
			'codigo_asignatura'=>$row_2["codigo"]);
		}
		$template->assign('Result_Asig',$datos);



	}
$template->display('sisnotas/ingnotas.tpl');
}

public function buscarnotas()
{
	$link="http://localhost/dptofisica_mvc/";
	$alumno1="?view=ingnotas";
	$alumno2="?view=alumno";
	session_start();
	$pdo = new Conexion();
	$template =new Smarty();
	$asig=$_POST["Asignatura"];
	$secc=$_POST["seccion"];
	$profe=$_POST["nombreprofe"];
	$rutprofesor=$_SESSION["k_username"];

	//$_SESSION["seccion"]=$secc;
	$n=1;
//sentencia preparada con arreglos
	$result_1=$pdo->prepare('select RutAlumno, Alumno, Seccion from Maestro where RutProfesor=:rutprofesor and CodigoRamo=:asig and Seccion=:secc order by Alumno Asc');
	$result_1->bindValue(':rutprofesor', $rutprofesor, PDO::PARAM_STR);
	$result_1->bindValue(':asig',$asig, PDO::PARAM_INT);
	$result_1->bindValue(':secc',$secc, PDO::PARAM_INT);
	$result_1->execute();

	$result_2=$pdo->prepare('SELECT distinct Ramo.Asignatura as asignatura, Ramo.Codigo as codigo from Ramo inner join Maestro on Ramo.Codigo=Maestro.CodigoRamo where Maestro.RutProfesor=:RutProfesor');
	$result_2->bindValue(':RutProfesor', $rutprofesor, PDO::PARAM_STR);
	$result_2->execute();

	$ponderadores=$pdo->prepare('select p1,p2,p3,p4,p5 from Ponderadores where idramo=:asig');
	$ponderadores->bindValue(':asig',$asig, PDO::PARAM_INT);
	$ponderadores->execute();

		while($row_1=$result_1->fetch(PDO::FETCH_ASSOC))
		{
    // buscando notas
			if ($row_1["RutAlumno"]!="")
			{
				$rutalumno=$row_1["RutAlumno"];
				$buscanotas=$pdo->prepare('SELECT Reporte,Informe1,Informe2,Prueba1,Prueba2 from Notas where RutAlumno=:rutalumno');
				$buscanotas->bindValue(':rutalumno', $rutalumno, PDO::PARAM_STR);
				$buscanotas->execute();
				$notas=$buscanotas->fetch(PDO::FETCH_ASSOC);

				$NotaParcial=$pdo->prepare("SELECT Reporte * (SELECT p1/100 from ponderadores where idramo='$asig') as Reporte, Informe1 * (SELECT p2/100 from ponderadores where idramo='$asig') as Informe1, Informe2 * (SELECT p3/100 from ponderadores where idramo='$asig') as Informe2, Prueba1 * (SELECT p4/100 from ponderadores where idramo='$asig') as Prueba1, Prueba2 * (SELECT p5/100 from ponderadores where idramo='$asig') as Prueba2 from notas WHERE RutAlumno=:rutalumno");
				$NotaParcial->bindValue(':rutalumno', $rutalumno, PDO::PARAM_STR);
				$NotaParcial->execute();
				$NotaFinal=$NotaParcial->fetch(PDO::FETCH_ASSOC);

				$notafinal=$NotaFinal["Reporte"]+$NotaFinal["Informe1"]+$NotaFinal["Informe2"]+$NotaFinal["Prueba1"]+$NotaFinal["Prueba2"];
				// $notas=$buscanotas->fetch(PDO::FETCH_ASSOC);
			}

			$datosalumno[]=array(
			'RutAlumno'=> $row_1["RutAlumno"],
				'Alumno' => $row_1["Alumno"],
					'Reporte'=>	$notas["Reporte"],
						'Informe1'=>$notas["Informe1"],
					'Informe2'=>$notas["Informe2"],
				'Prueba1'=>$notas["Prueba1"],
			'Prueba2'=>$notas["Prueba2"],
			'notafinal'=>$notafinal);

		}

		while ($row_2=$result_2->fetch(PDO::FETCH_ASSOC))
		{
			$datos[]=array(
			'nombre_asignatura'=>$row_2['asignatura'],
			'codigo_asignatura'=>$row_2['codigo'],
			'seccion'=>$secc);

		}
		while($row_3=$ponderadores->fetch(PDO::FETCH_ASSOC))
		{
			$poderador[]=array(
				'p1'=>$row_3['p1'],
				'p2'=>$row_3['p2'],
				'p3'=>$row_3['p3'],
				'p4'=>$row_3['p4'],
				'p5'=>$row_3['p5']);
		}
		$template->assign('rutprofe', $rutprofesor);
		$template->assign('NombreProfesor', $profe);
		$template->assign('Result_Alum',$datosalumno);
		$template->assign('Result_Asig',$datos);
		$template->assign('Result_Ponderador',$poderador);
		$template->assign('n',$n);
		$template->assign('Result_Notas',$datosalumno);


//presionamos el lin reportes;

		if($_SERVER["HTTP_REFERER"]==$link.$alumno1 or $_SERVER["HTTP_REFERER"]==$link.$alumno2 )
		{
		$template->display('sisnotas/ingnotas.tpl');
		}
		else{
		$result_1=$pdo->prepare('select RutAlumno, Alumno, Seccion from Maestro where RutProfesor=:rutprofesor and CodigoRamo=:asig and Seccion=:secc order by Alumno Asc');
		$result_1->bindValue(':rutprofesor', $rutprofesor, PDO::PARAM_STR);
		$result_1->bindValue(':asig',$_GET["asig"], PDO::PARAM_INT);
		$result_1->bindValue(':secc',$_GET["secc"], PDO::PARAM_INT);
		$result_1->execute();

		$template->assign('NombreProfesor',$_GET["profe"]);
		$template->assign('nombre_asig',$_GET["nombreasig"]);
		$template->assign('codigo_asig',$_GET["asig"]);
		$template->assign('seccion',$_GET["secc"]);
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
			'Alumno' => $alumno["Alumno"],
			'NotasReport'=>array('Report'=>$notasreport));
			


		}
		// $template->assign('notas_report',$notapreport);
		$template->assign('Result_Alum',$datosalumno);
		// $template->assign('Result_Report',$notasreport);
		$template->display('sisnotas/ingreport.tpl');
		}
 }


}

 ?>
