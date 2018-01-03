<?php
/* Smarty version 3.1.31, created on 2017-12-14 20:06:05
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\sisnotas\ingreport.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a32cb9d27a645_44931849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f403bf82054b06821a27d8469563f7154d824a5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\sisnotas\\ingreport.tpl',
      1 => 1513278363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/header.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a32cb9d27a645_44931849 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:home/overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (isset($_GET['success'])) {?>
<div class="alert alert-success justify-content-center" role="alert"  style="text-align: center; margin: 10px;">
  Las Calificaciones han sido guardadas
</div>
<?php }?>

<table  class ="ingnotas"  style="text-align: left; margin: auto;">
  <form id="ingnotas" name="Notas_Reporte" action="?view=report" method="POST">
  <tr>
    <td colspan="3" align="center" style="border: 1px solid #aabcfe;"><h2>Ingreso de Notas Reporte</h2></td>
  </tr>
  <tr>
    <th><font size="5">Academico</font></th>
    <td><font size="5"><?php echo $_smarty_tpl->tpl_vars['NombreProfesor']->value;?>
 </font></td>
  </tr>
  <tr>
    <th><font size="5">Rut</font></th>
    <td><font size="5"><?php echo $_smarty_tpl->tpl_vars['rutprofe']->value;?>
</font></td>
  </tr>
  <tr>
    <th><font size="5">Asignatura</font></th>
    <td><font size="5"><?php echo $_smarty_tpl->tpl_vars['nombre_asig']->value;?>
 </font></td>
  <input type="hidden" name="nombreprofe"      value='<?php echo $_smarty_tpl->tpl_vars['NombreProfesor']->value;?>
'>
  <input type="hidden" name="codigoasignatura" value='<?php echo $_smarty_tpl->tpl_vars['codigo_asig']->value;?>
'>
  <input type="hidden" name="seccionhidden"    value='<?php echo $_smarty_tpl->tpl_vars['seccion']->value;?>
'>
  <input type="hidden" name="nombreasignatura" value='<?php echo $_smarty_tpl->tpl_vars['nombre_asig']->value;?>
'>
  </tr>
  <tr>
    <th><font size="5">Sección</font></th>
    <td><font size="5"><?php echo $_smarty_tpl->tpl_vars['seccion']->value;?>
</font></td>
  </tr>
</table>
<table style="text-align: left; margin: auto;">
<tr>
 <td><input type="submit" value="Ingresar Notas" name="btnreport" class="btn btn-success"></td>
 <td><input type="submit" value="Export a Excel" name="btnexcel" class="btn btn-primary"></td>
 <td><input type="submit" value="Export a PDF" name="btnpdf" class="btn btn-primary"></td>
 <td><input type="submit" value="Volver" name="btnvolver" class="btn btn-primary"></td>
</tr>
</table>
<?php if (isset($_GET['view']) && $_GET['view'] == 'ingreport') {?>
<table style="text-align: left; margin: auto;">
<tr>
  <tr><th>N°</th>
  <th>RUT</th>
  <th>NOMBRE</th>
  <th>REPORTE</th>
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
  <td><input type="text" name="reportes<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="txt_campo_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" maxlength="3"  onchange="sumar(this.value);"size="1" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['Reporte'];?>
"></td>

  <td><?php echo $_smarty_tpl->tpl_vars['Result_Report']->value['notasreport'];?>
</td>

  <td></td>
  <td><span id="spTotal"><?php echo $_smarty_tpl->tpl_vars['result']->value['notafinal'];?>
</span></td>
  <td><span id="spTotal"><a href="#">Editar</a></span></td>
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
