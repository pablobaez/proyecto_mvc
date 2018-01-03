<?php
/* Smarty version 3.1.31, created on 2017-11-27 15:24:31
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\sisnotas\menuprofe.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a1c201f4c1323_91848802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e339d0a1edf98d940dd73145c75c693d1255f11' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\sisnotas\\menuprofe.tpl',
      1 => 1511792668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/header.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a1c201f4c1323_91848802 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:home/overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<table height="60%" width="30%" style="text-align: left; margin: auto;">
<form name ="menu" action="" method="POST">

<tr>
<td>
  <font size ="5", color ="#f56f3a">
    Rut:
  </font>
</td>
<td>
    <?php echo $_smarty_tpl->tpl_vars['rutprofe']->value;?>

</td>
</tr>
<tr>
<td><font size ="5", color ="#f56f3a">Académico:</font></td>
<td><?php echo $_smarty_tpl->tpl_vars['NombreProfesor']->value;?>
</td>
</tr>
<tr>
  <td colspan="3" align="center"><font size ="5", color ="#f56f3a">Asignaturas</td>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Result_Asig']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
<tr>
  <td colspan="3" align="center"><?php echo $_smarty_tpl->tpl_vars['result']->value['nombre_asignatura'];?>
</td>
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<tr>
      <td><input type="submit" name="btncontraseña" value="Cambio De Clave"></td>
      <td><input type="submit" name="btnreporte" value="Reporte Completo"></td>
</tr>


</form>
</table>
<?php $_smarty_tpl->_subTemplateRender('file:home/overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
