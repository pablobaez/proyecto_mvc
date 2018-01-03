<?php
/* Smarty version 3.1.31, created on 2017-11-22 19:56:14
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\home\vision.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a15c84e2c9103_26507838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb46b7927b6dbea6e3b5988a9a737fbca2a9d078' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\home\\vision.tpl',
      1 => 1511376962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./overall/header.tpl' => 1,
    'file:home/overall/aside.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a15c84e2c9103_26507838 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:./overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
<div class="historia-row row">
  <div class="historia-col col">
    <h1>VISION</h1>
    <hr>
    <div class="historia">
      La visión del Departamento de Física de la Universidad Tecnológica Metropolitana se centra en hacer de éste un espacio donde  cada línea de  investigación establecida  se consolide en el tiempo tal como lo ha sido la docencia teórica y experimental.
      Un Departamento que posea la estructura y los mecanismos administrativos para el desarrollo del quehacer en la transferencia tecnológica, la extensión y divulgación de su quehacer científico – tecnológico.
      Un Departamento cuya docencia e investigación posea una apertura hacia Centros nacionales e internacionales  permanentemente.  Privilegiando pasantías e intercambios.
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
