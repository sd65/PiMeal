<?php

if (!isset($_POST['mois'])) { $_POST['mois'] = "mai" ; }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
<meta content="width=480" name="viewport">
<title>PiMeal</title>
  <link rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="rec1"></div><div id="rec2"></div>


	<div id="page">
	<h1> PiMeal </h1>



		<p>
			<table>
				<caption>

							<form method="post" action="index.php">

								<label>Mois :</label>
								<select id="choix" name="mois">
									<option value="mai" <?php if ($_POST['mois'] == 'mai') { echo "selected" ;} ?>>Mai</option>
									<option value="juin" <?php if ($_POST['mois'] == 'juin') { echo "selected" ;} ?>>Juin</option>
									<option value="aout" <?php if ($_POST['mois'] == 'aout') { echo "selected" ;} ?>>Aout</option>
								</select>
		
								<button type="submit" class="btn">Ok</button>
							</form>
				
				</caption>
				<thead>
					<th>Jour</th>
        		  	<th>N°</th>
          			<th>Petit Déj'</th>
          			<th>Déjeuner</th>
          			<th>Diner</th>
				</thead>
				
				
				
				
				
				<tbody>
				
				<?php  
				
				$sommePe = 0 ;
				$sommeDe = 0 ;
				$sommeDi = 0 ;
				
				 $bdd = new PDO("sqlite:../PIMEAL");
				
				$query = $bdd->query('SELECT * FROM ' . $_POST['mois'] .' ORDER BY n');
			
				
				while ($row = $query->fetch() ) { ?>

					<tr <?php if ($row['jour'] == 'samedi' || $row['jour'] == 'dimanche' ) { echo "class=\"we\"" ;} ?> >
						<td align=center ><?php echo ucfirst($row['jour']); ?></td>
						<td align=center ><?php echo $row['n']; ?></td>
						<td align=center ><?php if ($row['Pe'] == 1) { echo "X" ; $sommePe++ ;} ?></td>
						<td align=center ><?php if ($row['De'] == 1) { echo "X" ; $sommeDe++ ;} ?></td>
						<td align=center ><?php if ($row['Di'] == 1) { echo "X" ; $sommeDi++ ;} ?></td>
					<tr>
					
				<?php	} ?>
				
								
				</tbody>
				
				<tfoot>		
					<tr>
							<td align=center colspan="5" id="calcul">Calcul</td>
					</tr>
					
					<tr>
						<td align=center colspan="2" >&sum; Repas</td>
						<td align = center ><?php echo $sommePe ; ?></td>
						<td align = center ><?php echo $sommeDe ; ?></td>
						<td align = center ><?php echo $sommeDi ; ?></td>
					</tr>
					
					<tr>
						<td align=center colspan="2" >Prix Repas</td>
						<td align = center >2€</td>
						<td align = center >4€</td>
						<td align = center >4€</td>
					</tr>
					
					<tr>
						<td align=center colspan="2" >Total (€)</td>
						<td align = center ><?php echo $totalSommePe = $sommePe * 2 ; ?></td>
						<td align = center ><?php echo $totalSommeDe = $sommeDe * 4 ; ?></td>
						<td align = center ><?php echo $totalSommeDi = $sommeDi * 4 ; ?></td>
					</tr>
					
					<tr class="we" >
						<td align=center colspan="2" >Grand Total (€)</td>
						<td align = center colspan="3" ><?php echo $totalSommePe + $totalSommeDe + $totalSommeDi  ; ?></td>
						
					</tr>
				
				</tfoot>
		
		
			</table>
			
			<div id="plus">
				
				<form method="post" action="plus.php">
									
					<input type="hidden" name="plusmois" value="<?php echo $_POST['mois'] ; ?>">						
					<button type="submit" id="soumettre">Soumettre un nouveau repas maintenant</button>
				
				</form>
				
			</div>

	</div>
</body>
</html>
