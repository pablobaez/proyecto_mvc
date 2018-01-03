<?php
/* Smarty version 3.1.31, created on 2017-11-22 20:11:28
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\home\mision.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a15cbe0e817f4_15300431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '945198957764d2a9c12e7871539b97861e2d90ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\home\\mision.tpl',
      1 => 1511377138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/header.tpl' => 1,
    'file:home/overall/aside.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a15cbe0e817f4_15300431 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:home/overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
<div class="historia-row row">
  <div class="historia-col col">
    <h1>MISION</h1>
    <hr>
    <div class="historia">
      La  misión del Departamento de Física de la Universidad Tecnológica Metropolitana está centrada en  contribuir  a la formación de profesionales en el área científica y  tecnológica aportándoles herramientas que les  permitan integrarse a la sociedad como individuos, altamente calificados y conscientes de los cuidados del medioambiente.
      Aportar a la sociedad desde el quehacer de difusión y extensión respaldado por el cultivo de la disciplina en la búsqueda de la investigación aplicada para generar transferencia tecnológica.
      Establecer vínculos con el medio para educar e  incentivar a la sociedad en el manejo    equilibrado de su entorno natural y conservar de este modo la naturaleza
    </div>
  </div>
  <?php $_smarty_tpl->_subTemplateRender('file:home/overall/aside.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php $_smarty_tpl->_subTemplateRender('file:home/overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php }
}
