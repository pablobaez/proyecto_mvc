{include 'home/overall/header.tpl'}

<table height="60%" width="30%" style="text-align: left; margin: auto;">
<form name ="menu" action="" method="POST">

<tr>
<td>
  <font size ="5", color ="#f56f3a">
    Rut:
  </font>
</td>
<td>
    {$rutprofe}
</td>
</tr>
<tr>
<td><font size ="5", color ="#f56f3a">Académico:</font></td>
<td>{$NombreProfesor}</td>
</tr>
<tr>
  <td colspan="3" align="center"><font size ="5", color ="#f56f3a">Asignaturas</td>
</tr>
{foreach from=$Result_Asig item=result}
<tr>
  <td colspan="3" align="center">{$result.nombre_asignatura}</td>
</tr>
{/foreach}
<tr>
      <td><input type="submit" name="btncontraseña" value="Cambio De Clave"></td>
      <td><input type="submit" name="btnreporte" value="Reporte Completo"></td>
</tr>


</form>
</table>
{include 'home/overall/footer.tpl'}
