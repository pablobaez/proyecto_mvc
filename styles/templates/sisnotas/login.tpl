{include 'home/overall/header.tpl'}
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
{include 'home/overall/footer.tpl'}
