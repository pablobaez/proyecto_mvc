<?php
/* Smarty version 3.1.31, created on 2017-11-22 18:55:18
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\home\overall\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a15ba06b44f19_74865651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cb5824177f49928ac4cae810859a317c37e6185' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\home\\overall\\header.tpl',
      1 => 1511373304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a15ba06b44f19_74865651 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="styles/css/estilo.css">
	 <link rel="stylesheet" href="styles/css/bootstrap.min.css">
	</head>
<body>

	<header>
		<div class="row p-4">
			<div class="container p-3">
				<h1 class="titulo">Departamento de Física</h1>
			</div>
			<div class="logo mt-3" >
				<ul>
					<li><img class="logo" src="styles/img/LogoUtem.jpg" alt="LogoUtem"></li>
				</ul>
			</div>
		</div>
	<div class="row">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg bg-dark p-0">
			<div class="container">
				<button class="navbar-toggler navbar-light" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" type="button" name="button">
				<span class="navbar-toggler-icon"></span>
				</button>
					<div class="collapse navbar-collapse" id="navbar">
					  <ul class="navbar-nav mr-auto">
							<?php if (!isset($_SESSION['k_username'])) {?>
							<?php echo $_SESSION['user'];?>

					    <li class="nav-item"><a href="?view=index" class="nav-link">Inicio</a></li>
					    <li class="nav-item"><a href="#" class="nav-link">Laboratorio</a></li>
					    <li class="nav-item"><a href="#" class="nav-link">Investigacion</a></li>
							<li class="nav-item"><a href="?view=login" class="nav-link">Registro</a></li>
							<?php } else { ?>
							<li class="nav-item"><a href="?view=ingnotas" class="nav-link">Notas</a></li>
							<li class="nav-item"><a href="#" class="nav-link">Asistencia</a></li>
							<li class="nav-item justify-content-end"><a href="?view=logout" class="nav-link">Cerrar Sesion</a></li>
						</ul>
					</div>
						<?php }?>
				</div>
		  	</nav>
		</div>
	</div>
	</header>
<?php }
}
