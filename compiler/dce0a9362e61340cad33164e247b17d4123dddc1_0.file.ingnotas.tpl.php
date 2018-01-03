<?php
/* Smarty version 3.1.31, created on 2017-11-22 13:12:05
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\public\ingnotas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a156995167ce1_61900460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dce0a9362e61340cad33164e247b17d4123dddc1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\public\\ingnotas.tpl',
      1 => 1511295779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/header.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a156995167ce1_61900460 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\dptofisica_mvc\\core\\libs\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender('file:home/overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table  class ="ingnotas2"  height="60%" width="30%">
  <form id="ingnotas" name="Notas_Reporte" action="" method="POST">
  <tr>
    <td  colspan="3" align="center"><h2>Ingreso de Notas Reporte</h2></td>
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
    <td><font size="5">
      <select name="Asignatura" id="Asignatura">
        <option value='0'>Seleccionar Asignatura</option>
          <?php echo smarty_function_html_options(array('name'=>"Asignatura",'options'=>$_smarty_tpl->tpl_vars['Result_Asig']->value,'selected'=>$_smarty_tpl->tpl_vars['Asignatura']->value),$_smarty_tpl);?>


      </select>
    </font></td>
  </tr>
  <tr>
    <th><font size="5">Sección</font></th>
    <td><font size="5"></font></td>
  </tr>
</table>
<?php $_smarty_tpl->_subTemplateRender('file:home/overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
