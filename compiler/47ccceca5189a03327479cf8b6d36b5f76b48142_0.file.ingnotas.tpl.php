<?php
/* Smarty version 3.1.31, created on 2017-12-12 15:56:38
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\sisnotas\ingnotas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2fee26780668_26861775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47ccceca5189a03327479cf8b6d36b5f76b48142' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\sisnotas\\ingnotas.tpl',
      1 => 1513090595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/header.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a2fee26780668_26861775 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:home/overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (isset($_GET['success'])) {?>
<div class="alert alert-success justify-content-center" role="alert"  style="text-align: center; margin: 10px;">
  Las Calificaciones han sido guardadas
</div>
<?php }?>

<table  class ="ingnotas"  style="text-align: left; margin: auto;">
  <form id="ingnotas" name="Notas_Reporte" action="?view=alumno" method="POST">
  <tr>
    <td colspan="3" align="center" style="border: 1px solid #aabcfe;"><h2>Ingreso de Notas Laboratorio</h2></td>
  </tr>
  <tr>
    <th><font size="5">Academico</font></th>
    <td><font size="5"><?php echo $_smarty_tpl->tpl_vars['NombreProfesor']->value;?>
 </font></td>
    <input type="hidden" name="nombreprofe" value='<?php echo $_smarty_tpl->tpl_vars['NombreProfesor']->value;?>
'>
  </tr>
  <tr>
    <th><font size="5">Rut</font></th>
    <td><font size="5"><?php echo $_smarty_tpl->tpl_vars['rutprofe']->value;?>
</font></td>
  </tr>
  <tr>
    <th><font size="5">Asignatura</font></th>
    <td><font size="5">
      <select name="Asignatura" id="Asignatura">
        <option value='0'>Seleccionar Asignatura</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Result_Asig']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
        <option value='<?php echo $_smarty_tpl->tpl_vars['result']->value['codigo_asignatura'];?>
'><?php echo $_smarty_tpl->tpl_vars['result']->value['nombre_asignatura'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

      </select>
    <input type="hidden" name="codigoasignatura" value='<?php echo $_smarty_tpl->tpl_vars['result']->value['codigo_asignatura'];?>
'>
    <input type="hidden" name="seccionhidden" value='<?php echo $_smarty_tpl->tpl_vars['result']->value['seccion'];?>
'>

  </font>
  </td>
  </tr>
  <tr>
    <th><font size="5">Sección</font></th>
    <td><font size="5"> <select name="seccion" id="seccion" ><option value='0'>Seleccionar Sección</option></select></font></td>
  </tr>
</table>
<table style="text-align: left; margin: auto;">
<tr>
 <td><input type="submit" value="Buscar Alumnos" name="btnbuscar" class="btn btn-primary"></td>
 <td><input type="submit" value="Ingresar Notas" name="btnnotas" class="btn btn-success"></td>
 <td><input type="submit" value="Export a Excel" name="btnexcel" class="btn btn-primary"></td>
 <td><input type="submit" value="Export a PDF" name="btnpdf" class="btn btn-primary"></td>
 <td><input type="submit" value="Volver" name="btnvolver" class="btn btn-primary"></td>
</tr>
<tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Result_Ponderador']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
  <td>Reportes % <input class="Ponderadores" type="text" name="p1" maxlength="2" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['p1'];?>
"></td>
  <td>Informe 1 %<input class="Ponderadores" type="text" name="p2" maxlength="2" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['p2'];?>
"></td>
  <td>Informe 2 %<input class="Ponderadores" type="text" name="p3" maxlength="2" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['p3'];?>
"></td>
  <td>Prueba 1 % <input class="Ponderadores" type="text" name="p4" maxlength="2" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['p4'];?>
"></td>
  <td>Prueba 2 % <input class="Ponderadores" type="text" name="p5" maxlength="2" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['p5'];?>
"></td>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</tr>
</table>
<?php if (isset($_GET['view']) && $_GET['view'] == 'alumno') {?>
<table style="text-align: left; margin: auto;">
<tr>
  <tr><th>N°</th>
  <th>RUT</th>
  <th>NOMBRE</th>
  <th><a href="?view=ingreport&asig=<?php echo $_smarty_tpl->tpl_vars['result']->value['codigo_asignatura'];?>
&nombreasig=<?php echo $_smarty_tpl->tpl_vars['result']->value['nombre_asignatura'];?>
&secc=<?php echo $_smarty_tpl->tpl_vars['result']->value['seccion'];?>
&profe=<?php echo $_smarty_tpl->tpl_vars['NombreProfesor']->value;?>
">REPORTE</a></th>
  <th>INFORME 1</th>
  <th>INFORME 2</th>
  <th>PRUEBA 1</th>
  <th>PRUEBA 2</th>
  <th></th>
  <th>NOTAL FINAL</th></tr>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Result_Alum']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
<tr>
  <td><?php echo $_smarty_tpl->tpl_vars['n']->value++;?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['result']->value['RutAlumno'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['result']->value['Alumno'];?>
</td>

  <input type="hidden" name="rutalumnohidden<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" value='<?php echo $_smarty_tpl->tpl_vars['result']->value['RutAlumno'];?>
'>
  <td><input type="text" name="Reportes<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="txt_campo_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" maxlength="3"  onchange="sumar(this.value);"size="1" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['Reporte'];?>
"></td>
  <td><input type="text" name="Informe1<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="txt_campo_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" maxlength="3"  onchange="sumar(this.value);" size="1" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['Informe1'];?>
"></td>
  <td><input type="text" name="Informe2<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="txt_campo_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" maxlength="3"  onchange="sumar(this.value);" size="1" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['Informe2'];?>
"></td>
  <td><input type="text" name="Prueba1<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"  id="txt_campo_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" maxlength="3"  onchange="sumar(this.value);" size="1" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['Prueba1'];?>
"></td>
  <td><input type="text" name="Prueba2<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="txt_campo_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"  maxlength="3"  onchange="sumar(this.value);" size="1" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['Prueba2'];?>
"></td>
  <td></td>
  <td><span id="spTotal"><?php echo $_smarty_tpl->tpl_vars['result']->value['notafinal'];?>
</span></td>
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<input type="hidden" name="cantidadhidden" value='<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
'>
</table>
<?php }?>
</form>
<?php $_smarty_tpl->_subTemplateRender('file:home/overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
$(document).ready(function(){
  $("#Asignatura").change(function () {
    $("#Asignatura option:selected").each(function () {
      codigo = $(this).val();
      $.post("core/model/seccion.php", { codigo: codigo }, function(data){
        $("#seccion").html(data);
      });
    });
  })
});


<?php echo '</script'; ?>
>
<?php }
}
