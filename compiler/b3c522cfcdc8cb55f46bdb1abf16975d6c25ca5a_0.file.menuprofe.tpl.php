<?php
/* Smarty version 3.1.31, created on 2017-11-20 20:33:39
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\public\menuprofe.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a132e134eca44_48360867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3c522cfcdc8cb55f46bdb1abf16975d6c25ca5a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\public\\menuprofe.tpl',
      1 => 1511206417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/header.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a132e134eca44_48360867 (Smarty_Internal_Template $_smarty_tpl) {
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
<tr>
  <td colspan="3" align="center"><?php echo $_smarty_tpl->tpl_vars['Asignatura']->value;?>
</td>  
</tr>
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
