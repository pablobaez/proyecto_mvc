{include 'home/overall/header.tpl'}
{if isset($smarty.get.success)}
<div class="alert alert-success justify-content-center" role="alert"  style="text-align: center; margin: 10px;">
  Las Calificaciones han sido guardadas
</div>
{/if}

<table  class ="ingnotas"  style="text-align: left; margin: auto;">
  <form id="ingnotas" name="Notas_Reporte" action="?view=alumno" method="POST">
  <tr>
    <td colspan="3" align="center" style="border: 1px solid #aabcfe;"><h2>Ingreso de Notas Laboratorio</h2></td>
  </tr>
  <tr>
    <th><font size="5">Academico</font></th>
    <td><font size="5">{$NombreProfesor} </font></td>
    <input type="hidden" name="nombreprofe" value='{$NombreProfesor}'>
  </tr>
  <tr>
    <th><font size="5">Rut</font></th>
    <td><font size="5">{$rutprofe}</font></td>
  </tr>
  <tr>
    <th><font size="5">Asignatura</font></th>
    <td><font size="5">
      <select name="Asignatura" id="Asignatura">
        <option value='0'>Seleccionar Asignatura</option>
        {foreach from=$Result_Asig item=result}
        <option value='{$result.codigo_asignatura}'>{$result.nombre_asignatura}</option>
        {/foreach}
      </select>
    <input type="hidden" name="codigoasignatura" value='{$result.codigo_asignatura}'>
    <input type="hidden" name="seccionhidden" value='{$result.seccion}'>

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
  {foreach from=$Result_Ponderador item=result}
  <td>Reportes % <input class="Ponderadores" type="text" name="p1" maxlength="2" value="{$result.p1}"></td>
  <td>Informe 1 %<input class="Ponderadores" type="text" name="p2" maxlength="2" value="{$result.p2}"></td>
  <td>Informe 2 %<input class="Ponderadores" type="text" name="p3" maxlength="2" value="{$result.p3}"></td>
  <td>Prueba 1 % <input class="Ponderadores" type="text" name="p4" maxlength="2" value="{$result.p4}"></td>
  <td>Prueba 2 % <input class="Ponderadores" type="text" name="p5" maxlength="2" value="{$result.p5}"></td>
  {/foreach}
</tr>
</table>
{if isset($smarty.get.view) and $smarty.get.view=='alumno'}
<table style="text-align: left; margin: auto;">
<tr>
  <tr><th>N°</th>
  <th>RUT</th>
  <th>NOMBRE</th>
  <th><a href="?view=ingreport&asig={$result.codigo_asignatura}&nombreasig={$result.nombre_asignatura}&secc={$result.seccion}&profe={$NombreProfesor}">REPORTE</a></th>
  <th>INFORME 1</th>
  <th>INFORME 2</th>
  <th>PRUEBA 1</th>
  <th>PRUEBA 2</th>
  <th></th>
  <th>NOTAL FINAL</th></tr>
</tr>
{foreach from=$Result_Alum item=result}
<tr>
  <td>{$n++}</td>
  <td>{$result.RutAlumno}</td>
  <td>{$result.Alumno}</td>

  <input type="hidden" name="rutalumnohidden{$n}" value='{$result.RutAlumno}'>
  <td><input type="text" name="Reportes{$n}" id="txt_campo_{$n}" maxlength="3"  onchange="sumar(this.value);"size="1" value="{$result.Reporte}"></td>
  <td><input type="text" name="Informe1{$n}" id="txt_campo_{$n}" maxlength="3"  onchange="sumar(this.value);" size="1" value="{$result.Informe1}"></td>
  <td><input type="text" name="Informe2{$n}" id="txt_campo_{$n}" maxlength="3"  onchange="sumar(this.value);" size="1" value="{$result.Informe2}"></td>
  <td><input type="text" name="Prueba1{$n}"  id="txt_campo_{$n}" maxlength="3"  onchange="sumar(this.value);" size="1" value="{$result.Prueba1}"></td>
  <td><input type="text" name="Prueba2{$n}" id="txt_campo_{$n}"  maxlength="3"  onchange="sumar(this.value);" size="1" value="{$result.Prueba2}"></td>
  <td></td>
  <td><span id="spTotal">{$result.notafinal}</span></td>
</tr>
{/foreach}
<input type="hidden" name="cantidadhidden" value='{$n}'>
</table>
{/if}
</form>
{include 'home/overall/footer.tpl'}
<script>
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


</script>
