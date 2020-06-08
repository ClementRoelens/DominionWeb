<?php
	require 'ClasseCarte.php';
	require 'ClasseJoueur.php';
	$bdd = new PDO('mysql:host=localhost;dbname=dominion;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	//Création des cartes de base
	$cartes = $bdd->query("SELECT* FROM cartes_basiques");
	$cartesDeBase = [];
	for ($i=0;$i<8;$i++)
	{
		$donneesCarte = $cartes->fetch();
		$tempCarte = new Carte();
		$tempCarte->hydrate($donneesCarte);
		$cartesDeBase[] = $tempCarte;
	}
	$cartes->closeCursor();
	//Création des cartes royaume
	$cartes = $bdd->query("SELECT* FROM (SELECT* FROM cartes_royaume ORDER BY RAND() LIMIT 10) req ORDER BY Cout");
	$cartesRoyaume = [];
	for ($i=0;$i<10;$i++)
	{
		$donneesCarte = $cartes->fetch();
		$tempCarte = new Carte();
		$tempCarte->hydrate($donneesCarte);
		$cartesRoyaume[] = $tempCarte;
	}
	$cartes->closeCursor();
	
	//Création des joueurs
	//Pour la phase de développement et tests, on en crée deux par défaut
	$listeJoueurs = [];
	$joueur1 = new Joueur('Clément');
	$listeJoueurs[] = $joueur1;
	$joueur2 = new Joueur('Fred');
	$listeJoueurs[] = $joueur2;
	
	//Création des decks
	foreach ($listeJoueurs as $joueur)
	{
		foreach($cartesDeBase as $carte)
		{
			if ($carte->Nom == 'Cuivre')
			{
				for ($i=0;$i<7;$i++)
				{
					$tempCarte = clone $carte;
					$joueur->Deck[] = $tempCarte;
				}
			}
			if ($carte->Nom == 'Domaine')
			{
				for ($i=0;$i<3;$i++)
				{
					$tempCarte = clone $carte;
					$joueur->Deck[] = $tempCarte;
				}
			}
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Partie</title>
	<link rel="stylesheet" href="stylePartie.css"/>
	<meta charset="UTF-8"/>
</head>

<body>

	<div id='partie_superieure'>
		<div id='map'>
			<div id='cartes_de_base'>
			<?php
				foreach ($cartesDeBase as $carte)
				{  
					?>
					<div class='carte_div'>
						<img 
							<?php 
								echo "src='images/".$carte->Image."' alt='".$carte->Nom."' "; 
								foreach ($carte as $key=>$value)
								{
									if (($key != 'Image') AND ($key != 'Nom') AND ($key != 'EnJeu'))
									{ echo "data-".strtolower($key)."='".$value."' "; }
								}
							?> 
						class='carte'/>
					</div>
					<?php
				}
			?>
			</div>
			<div id='royaume'>
				<div id='cartes_royaume1'>
				
				<?php
				for ($i=0;$i<5;$i++)
				{  
					?>
					<div class='carte_div'>
						<img 
							<?php 
								echo"src='images/".$cartesRoyaume[$i]->Image."' alt='".$cartesRoyaume[$i]->Nom."' "; 
								foreach ($cartesRoyaume[$i] as $key=>$value)
								{
									if (($key != 'Image') AND ($key != 'Nom') AND ($key != 'EnJeu'))
									{ echo "data-".$key."=\"".$value."\" "; }
								}
							?> 
						class='carte'/>
					</div>
					<?php
				}
				?>
				</div>
				<div id='cartes_royaume2'>
				<?php
				for ($i=5;$i<10;$i++)
				{  
					?>
					<div class='carte_div'>
						<img 
							<?php 
								echo"src='images/".$cartesRoyaume[$i]->Image."' alt='".$cartesRoyaume[$i]->Nom."' "; 
								foreach ($cartesRoyaume[$i] as $key=>$value)
								{
									if (($key != 'Image') AND ($key != 'Nom') AND ($key != 'EnJeu'))
									{ echo "data-".$key."=\"".$value."\" "; }
								}
							?> 
						class='carte'/>
					</div>
					<?php
				}
				?>
				</div>
			</div>
		</div>
		<div id='superieure_droite'>
			<div id='apercu'>
				<div id='apercu_carte'>
					<img src='images/dosDeCarte.jpg' alt='Dos de carte'/>
				</div>
				<div id='apercu_droite'>
				</div>
			</div>
			<h1>Tour de Clément</h1>
			<div id='info'>
				<p>1 action</p>
				<p>1 achat</p>
				<p>Monnaie totale en main : 5</p>
				<p>Monnaie dispo : 5</p>
				<p>Jetons : 2</p>
			</div>
			<button type='button' onclick='FinDeTour()'>Finir le tour</button>
		</div>
	</div>
	<div id='partie_inferieure'>
		<div id='deck_defausse'>
			<div>
				<p>Deck : 5</p>
				<img src='images/dosdecarte.jpg' alt='Dos de carte' class='carte'/>
			</div>
			<div>
				<p>Défausse : 5</p>
				<img src='images/2Douves.jpg' alt='Dos de carte' class='carte'/>
			</div>
		</div>
		<div id='main'>
			
		</div>
	</div>
	<script src='script.js'></script>
<?php
	
?>
</body>

</html>