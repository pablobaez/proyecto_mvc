{include 'home/overall/header.tpl'}
{if isset($smarty.get.success)}
<div class="alert alert-success justify-content-center" role="alert"  style="text-align: center; margin: 10px;">
  Las Calificaciones han sido guardadas
</div>
{/if}

<table  class ="ingnotas"  style="text-align: left; margin: auto;">
  <form id="ingnotas" name="Notas_Reporte" action="?view=report" method="POST">
  <tr>
    <td colspan="3" align="center" style="border: 1px solid #aabcfe;"><h2>Ingreso de Notas Reporte</h2></td>
  </tr>
  <tr>
    <th><font size="5">Academico</font></th>
    <td><font size="5">{$NombreProfesor} </font></td>
  </tr>
  <tr>
    <th><font size="5">Rut</font></th>
    <td><font size="5">{$rutprofe}</font></td>
  </tr>
  <tr>
    <th><font size="5">Asignatura</font></th>
    <td><font size="5">{$nombre_asig} </font></td>
  <input type="hidden" name="nombreprofe"      value='{$NombreProfesor}'>
  <input type="hidden" name="codigoasignatura" value='{$codigo_asig}'>
  <input type="hidden" name="seccionhidden"    value='{$seccion}'>
  <input type="hidden" name="nombreasignatura" value='{$nombre_asig}'>
  </tr>
  <tr>
    <th><font size="5">Sección</font></th>
    <td><font size="5">{$seccion}</font></td>
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
{if isset($smarty.get.view) and $smarty.get.view=='ingreport'}
<table style="text-align: left; margin: auto;">
<tr>
  <tr><th>N°</th>
  <th>RUT</th>
  <th>NOMBRE</th>
  <th>REPORTE</th>
  <th></th>
  <th>NOTAL FINAL</th></tr>
</tr>
{foreach from=$Result_Alum item=result}
<tr>
  <td>{$n++}</td>
  <td>{$result.RutAlumno}</td>
  <td>{$result.Alumno}</td>

  <input type="hidden" name="rutalumnohidden{$n}" value='{$result.RutAlumno}'>
  <td><input type="text" name="reportes{$n}" id="txt_campo_{$n}" maxlength="3"  onchange="sumar(this.value);"size="1" value="{$result.Reporte}"></td>

  <td>{$Result_Report.notasreport}</td>

  <td></td>
  <td><span id="spTotal">{$result.notafinal}</span></td>
  <td><span id="spTotal"><a href="#">Editar</a></span></td>
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
