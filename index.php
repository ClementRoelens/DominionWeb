<!DOCTYPE html>
<html>
<head>
	<title>Dominion</title>
	<meta charset="UTF-8"/>
	<style>
		body > * {
			text-align:center;
		}
		
		input {
			opacity:0.85;
		}
		
		input,button {
			width:100px;
			margin:auto;
			margin-bottom:5px;
			display:block;
		}
		
		p {
			font-size:1.4em;
		}
	</style>
</head>

<body>

<p>Bienvenue à Dominion</p>
<p>Choisissez votre pseudo avant de jouer</p>
<input type='text' id='pseudo' value='Votre pseudo' display='block'>
<button type='button' onclick="window.location.href = 'partie.htm';">Lancer la partie</button>

</body>

</html>