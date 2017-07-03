<?php include('header.php');?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="jquery.tabletoCSV.js"></script>
<section id="page">

<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="page-heading">Aranceles</h2>
  </div>
  <div class="col-lg-10 col-lg-offset-1">



    <?php
    $csv = array_map('str_getcsv', file('datos/arancel.csv'));
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);


    ?>

                        <table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">


                          <thead>
                      			<tr>
                      				<th>Carrera</th>
                      				<th>Institución</th>
                      				<th>Arancel anual</th>
                      				<th>Arancel total formal</th>
                      				<th>Duración formal</th>

                      			</tr>
                      		</thead>
                      		<tbody>

                      			<?php for($a = 0; $a < $total = count($csv); $a++){?>

                      			<tr>
                      				<td><?php echo($csv[$a]["carrera"])?></td>
                      				<td><?php echo($csv[$a]["institucion"])?></td>
                      				<td><?php echo($csv[$a]["arancel"]);?></td>
                      				<td><?php echo(($csv[$a]["duracion_formal"]*$csv[$a]["arancel"])/2);?></td>

                      				<td><?php echo($csv[$a]["duracion_formal"])?></td>

                      			</tr>

                      			<?php };?>

                      		</tbody>
                      	</table>
<br>
Fuentes: <br>
Arancel y Duración: Sitio oficial de las Instituciones

  </div>
</div>
</div>
</section>



<?php include('footer.php');?>
