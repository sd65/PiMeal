<?php

		 $bdd = new PDO("sqlite:../PIMEAL");	
		$heure = date(G) ;
		$N = date(d) ;
		$M = $_POST['plusmois'] ;
		
	
		    switch ($heure)	{
			
			case ($heure>=0 && $heure<=11) :
				$repas="Pe" ; $message="Petit d\351jeuner" ; break ;
			
			case ($heure>11 && $heure<=16) :
				$repas="De"  ; $message="D\351jeuner" ; break ;
			
			case ($heure>16) :
				$repas="Di"  ; $message="Diner" ; break ;
			
			} 
		
			
			$reponse = $bdd->exec('UPDATE ' . $M .' SET ' . $repas . '=1 WHERE n='. $N . '');
			
			
			
			
			
?>


<script type="text/javascript">
    alert( '<?php echo $message ; ?> pris en compte !');
    document.location.href = 'index.php';
</script>
