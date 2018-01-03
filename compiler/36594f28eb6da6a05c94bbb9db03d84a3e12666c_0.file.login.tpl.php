<?php
/* Smarty version 3.1.31, created on 2017-11-20 16:41:31
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\public\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a12f7ab132289_77518872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36594f28eb6da6a05c94bbb9db03d84a3e12666c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\public\\login.tpl',
      1 => 1511192489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/header.tpl' => 1,
    'file:home/overall/footer.tpl' => 1,
  ),
),false)) {
function content_5a12f7ab132289_77518872 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:home/overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="conteiner" >
  <div class="row mt-3">

    <div class="col-12">

      <form class="inicio" action="" method="post">
        <label for="">Usuario</label>
        <input type="text" name="txtusuario" value="">
        <label for="">Password</label>
        <input type="password" name="txtclave" value="">
        Profesor<input type="radio" name="rad" id="radprofesores" value="profesores">
        Cordinador<input type="radio" name="rad" id="radcordinadores" value="cordinadores">
        Funcionario<input type="radio" name="rad" id="radfuncionarios" value="funcionarios"/>
        <input type="submit" name="Aceptar" value="Aceptar">
      </form>
    </div>
  </div>

</div>
<?php $_smarty_tpl->_subTemplateRender('file:home/overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
