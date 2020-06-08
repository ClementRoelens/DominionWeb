var cartes = document.querySelectorAll('.carte');
var apercu_image = document.querySelector('#apercu_carte img');
var apercu = document.getElementById('apercu_droite');

//On va ajouter un listener pour déclencher l'évènement de l'aperçu de la carte sur toutes les cartes
for (var carte of cartes)
{
	carte.addEventListener('mouseover', function(e){
		apercu_image.src = e.target.src;
		apercu_image.alt = e.target.alt;
		var apercu_nom = document.createElement('h1');
		apercu_nom.innerHTML = e.target.alt;
		apercu.appendChild(apercu_nom);
		var dataset = Object.assign({},e.target.dataset);
		for (var key in dataset)
		{
			var data = dataset[key];
			if ((key != 'nom') && (key != 'type') && (key != 'cout') && (data != 0) && (data != ''))
			{
				var p = document.createElement('p');
				var textNode = '';
				if (key != 'effet')
				{ textNode = (data>0) ? '+' : '-' ;	}
				textNode += data;
				switch (key)
				{
					case 'actiondonnee' :
						textNode += ' action(s)';
						break;
					case 'achatdonne' :
						textNode += ' achat(s)';
						break;
					case 'cartedonnee' :
						textNode += ' carte(s)';
						break;
					case 'pointdonne' :
						textNode += ' point(s)';
						break;
				}
				var text = document.createTextNode(textNode);
				
				p.appendChild(text);
				if (key == 'jetonpointdonne')
				{
					var img = document.createElement('img');
					img.src = 'icones/tokenPoint.png';
					img.alt = 'jeton victoire';
					img.style.verticalAlign = 'middle';
					img.style.marginLeft = '3px';
					img.className = 'icone';
					p.appendChild(img);
				}
				if (key == 'monnaiedonnee')
				{
					var img = document.createElement('img');
					img.src = 'icones/monnaie.png';
					img.alt = 'monnaie';
					img.style.verticalAlign = 'middle';
					img.style.marginLeft = '3px';
					img.className = 'icone';
					p.appendChild(img);
				}
				apercu.appendChild(p);
			}
		}
		var div = document.createElement('div');
		var img = document.createElement('img');
		img.src = 'icones/'+e.target.dataset.cout+'.png';
		img.alt = 'Cout';
		div.appendChild(img);
		var apercu_type = document.createElement('h2');
		apercu_type.innerHTML = e.target.dataset.type;
		div.appendChild(apercu_type);
		apercu.appendChild(div);
		
		//Et on supprime tout quand la souris sort
		this.addEventListener('mouseout', function(){
			var carteDetails = apercu.childNodes;
			while (apercu.firstChild)
			{ apercu.removeChild(apercu.firstChild); }
			apercu_image.src ='images/dosDeCarte.jpg';
			apercu_image.alt = 'Dos de carte';
		}, true);
	}, true);
}

