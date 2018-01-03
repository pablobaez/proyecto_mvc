<?php
/* Smarty version 3.1.31, created on 2017-12-11 20:44:10
  from "C:\xampp\htdocs\dptofisica_mvc\styles\templates\home\overall\section.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2ee00aa99fe6_96141018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8493a19122a8179730d1bace191c851d70f57f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dptofisica_mvc\\styles\\templates\\home\\overall\\section.tpl',
      1 => 1513021448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/overall/aside.tpl' => 1,
  ),
),false)) {
function content_5a2ee00aa99fe6_96141018 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
  <section class="contenedor-raiz row">
    <main class="col-md-8">
      <div class="carousel slide" id="principal-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#principal-carousel" data-slid-to="0" class="active"></li>
          <li data-target="#principal-carousel" data-slid-to="1"></li>
          <li data-target="#principal-carousel" data-slid-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="styles/img/slide1.jpg" class="w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="styles/img/slide2.jpg" class="w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="styles/img/slide3.jpg" class="w-100" alt="">
          </div>
        </div>

        <a href="#principal-carousel" class="carousel-control-prev" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>

        <a href="#principal-carousel" class="carousel-control-next" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
    </main>
    <?php $_smarty_tpl->_subTemplateRender('file:home/overall/aside.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </section>
  <section class="row widgets justify-content-between">
    <div class="env-home col-12 col-md-4 col-lg-3 mt-5">
      <div class="info-home">
       <h3>ACADEMICOS</h3>
       <ul class="fecha-simp-home">
        <li>
         <h4 style="font-size: 18px;">Dr. Rafael Correa</h4>
         <p style="font-size: 12px; line-height: 16px;">Director del Departamento de Física<br>
        </li>
        <li>
         <h4 style="font-size: 18px;">Mg. Cecilia Rios</h4>
         <p style="font-size: 12px; line-height: 16px;">Coordinador Academica<br>
        </li>
        <li>
         <h4 style="font-size: 18px;">Dra. Sofia Camilla</h4>
         <p style="font-size: 12px; line-height: 16px;">Coordinadora de Homologaciones<br>
        </li>
        <li>
         <h4 style="font-size: 18px;">Dr. Pedro Miranda</h4>
         <p style="font-size: 12px; line-height: 16px;">Coordinador de Investagación<br>
        </li>
        <li>
         <h4 style="font-size: 18px;">Mg. Voltarie Fuente</h4>
         <p style="font-size: 12px; line-height: 16px;">Coordinador de Laboratorio<br>
        </li>
        <li>
         <h4 style="font-size: 18px;">Dr. Javier Watcher</h4>
         <p style="font-size: 12px; line-height: 16px;">Coordinador de Laboratorio Investigación y Postgrado<br>
        </li>
       </ul>
      </div>
    </div>


    <div class="env-home col-12 col-md-4 col-lg-3 mt-5">
    <div class="info-home2">
      <div class="marquee marqueeH">
        <h3>AVISOS</h3>
        <p class="text-info" style="font-size: 20px; padding:5px;"><marquee direction="up" height="450" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat.</marquee></p>
      </div>
    </div>
    </div>

    <div class="env-home col-12 col-md-4 col-lg-3 mt-5">
      <div class="info-home">
       <h3>SITIOS DE INTERES</h3>
       <ul>
        <li><a href="http://www.utem.cl" target="_blank">UTEM</a></li>
        <li><a href="https://reko.utem.cl" target="_blank">REKO</a></li>
        <li><a href="https://dirdoc.utem.cl"  target="_blank">DIRDOC</a></li>
        <li><a href="http://www.utemvirtual.cl" target="_blank">UTEM VIRTUAL</li>
        <li><a href="https://sochifi.cl/" target="_blank">SOCHIFI</a></li>

       </ul>
      </div>
    </div>


  </section>
  </div>
<?php }
}
