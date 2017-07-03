<?php include('header.php');?>

<section id="page">

<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="page-heading">Acreditaciones</h2>
  </div>
  <div class="col-lg-10 col-lg-offset-1">

    <?php
    $csv = array_map('str_getcsv', file('datos/acredita.csv'));
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    ?>



    <table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
    		<thead>
    			<tr>
    				<th class="">Carrera</th>
    				<th>Institución</th>
    				<th>Desde</th>
            	<th>Hasta</th>
    				<th>Documento Acreditador</th>

    			</tr>
    		</thead>
    		<tbody>

    			<?php for($a = 0; $a < $total = count($csv); $a++){?>


    			<tr>
    				<td><?php echo($csv[$a]["carrera"])?></td>
    				<td><?php echo($csv[$a]["institucion"])?></td>
    				<td><?php echo($csv[$a]["acreditada_desde"])?></td>
            <td><?php echo($csv[$a]["acreditada_hasta"])?></td>
    					<td>
              <a href="<?php echo($csv[$a]["enlace"])?>" target="_blank">
              <?php echo($csv[$a]["documento_acreditador"])?>



              </a></td>

    			</tr>

    			<?php };?>

    		</tbody>
    	</table>
      <br>
Fuentes: <a href="https://www.cnachile.cl/"> CNA Chile <br>
<a href=" http://www.aadsa.cl/convenios/"> Agencia Acreditadora de Arquitectura y Diseño <br>
<a href=" http://www.acreditaccion.cl/resultado_de_acreditacion.php"> Acreditación Agencia
  </div>
</div>
</div>

</section>

<?php include('footer.php');?>
