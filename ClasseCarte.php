<?php

class Carte
{
	public $Nom;
	public $Image;
	public $Cout;
	public $Type;
	public $CarteDonnee;
	public $ActionDonnee;
	public $AchatDonne;
	public $MonnaieDonnee;
	public $JetonPointDonne;
	public $Effet;
	public $PointDonne;
	public $EnJeu = false;
	
	public function hydrate(array $donnees)
	{
				
		if (isset($donnees['Nom']))
			{ $this->Nom = $donnees['Nom']; }
		
		if (isset($donnees['Image']))
			{ $this->Image = $donnees['Image']; }
		
		if (isset($donnees['Cout']))
			{ $this->Cout = $donnees['Cout']; }
		
		if (isset($donnees['Type']))
			{ $this->Type = $donnees['Type']; }
		
		if (isset($donnees['Effet']))
			{ $this->Effet = $donnees['Effet']; }
		
		if (isset($donnees['MonnaieDonnee']))
			{ $this->MonnaieDonnee = $donnees['MonnaieDonnee']; }
		
		if (isset($donnees['CarteDonnee']))
			{ $this->CarteDonnee = $donnees['CarteDonnee']; }
		
		if (isset($donnees['ActionDonnee']))
			{ $this->ActionDonnee = $donnees['ActionDonnee']; }
		
		if (isset($donnees['AchatDonne']))
			{ $this->AchatDonne = $donnees['AchatDonne']; }
		
		if (isset($donnees['JetonPointDonne']))
			{ $this->JetonPointDonne = $donnees['JetonPointDonne']; }
		
		if (isset($donnees['PointDonne']))
			{ $this->PointDonne = $donnees['PointDonne']; }
		
	}
	
	
	/*
	----> TO DO <----
	----> TO DO <----
	----> TO DO <----
	Il va falloir trouver comment gérer ça en PHP
	
	//On déclare le délégué sur lequel sera fixé la méthode d'attaque
	delegate void Attaque(Joueur cible);
	Attaque attaque;
	//Ce booléen passera à faux si l'adversaire annule l'attaque avec Douves par exemple
	public static $continuerAttaque = true;
	
	----> TO DO <----
	----> TO DO <----
	----> TO DO <----
	
	*/
	
	public function __construct(){}

	// public function __construct
		// ($Nom, $Image, $Cout, $Type, $EffetText, $MonnaieDonnee
		// , $CarteDonnee, $ActionDonnee, $AchatDonne, $JetonPointDonne, $PointDonne)
	// {
		// $this->Nom = $Nom;
		// $this->Image = $Image;
		// $this->Cout = $Cout;
		// $this->Type = $Type;
		// $this->EffetText = $EffetText;
		// $this->MonnaieDonnee = $MonnaieDonnee;
		// $this->CarteDonnee = $CarteDonnee;
		// $this->ActionDonnee = $ActionDonnee;
		// $this->AchatDonne = $AchatDonne;
		// $this->JetonPointDonne = $JetonPointDonne;
		// $this->PointDonne = $PointDonne;

	// }
		
	 /*public void Effet()
        {
            //Joueur $JoueurActuel = $JoueurActuel;
            //Joueur $ListeJoueurs = $ListeJoueurs;
			
			switch (this.Nom)
                {
                    case "Mascarade":
                        {
                            //Chaque joueur doit passer une carte de sa main au joueur suivant, puis le joueur ayant joué la carte peut écarter une carte

                            carteEcartees = [];
                            //On fait donc une boucle de tous les joueurs, et on va choisir la carte, l'écarter de la main puis l'ajouter dans celle du joueur suivant
                            for (int i = 0, c = ListeJoueurs.Count; i < c; i++)
                            {
                                //On utilise la méthode pour choisir une carte dans la main
                                carteEcartees.Add(ListeJoueurs[i].ChoisirUneCarte("Ecarter", ListeJoueurs[i].Main, true));
                                //Puis on écarte
                                ListeJoueurs[i].Ecarter(carteEcartees[i]);
                            }
                            //Puis la carte est passée au joueur suivant (ou au premier quand le compteur atteint la limite du nombre de joueurs)
                            for (int i = 0, c = ListeJoueurs.Count; i < c; i++)
                            {
                                if (ListeJoueurs[i] == ListeJoueurs[ListeJoueurs.Count - 1])
                                { ListeJoueurs[0].Main.Add(carteEcartees[i]); }
                                else
                                { ListeJoueurs[i + 1].Main.Add(carteEcartees[i]); }
                            }
                            JoueurActuel.MAJMain();

                            //Puis le deuxième effet : le joueur qui joue peut écarter une carte de sa main
                            Carte carteEcartee = new Carte();
                            carteEcartee = JoueurActuel.ChoisirUneCarte("Ecarter", JoueurActuel.Main, false);
                            if (!(carteEcartee is null))
                            { JoueurActuel.Ecarter(carteEcartee); }
                        }
                        break;

                    case "Évèque":
                        {
                            //Ici on ajoute 1 pièce et 1 jeton, puis on fait écarter une carte et on gagne d'autres jetons selon son coût, et les autres peuvent écarter également

                            Carte carteEcartee = new Carte();
                            //On fait choisir la carte puis on l'écarte
                            carteEcartee = JoueurActuel.ChoisirUneCarte("Ecarter", JoueurActuel.Main, true);
                            JoueurActuel.Ecarter(carteEcartee);
                            //Puis on ajoute le bon nombre de jetons de victoire
                            double tempCout = carteEcartee.Cout / 2;
                            JoueurActuel.JetonVictoireDispo += (int)Math.Floor(tempCout);

                            //Puis on boucle sur les autres joueurs pour qu'ils écartent
                            for (int i = 0; i < ListeJoueurs.Count; i++)
                            {
                                carteEcartee = null;
                                //Gérer le cas d'annulation
                                carteEcartee = ListeJoueurs[i].ChoisirUneCarte("Ecarter", ListeJoueurs[i].Main, false);
                                if (!(carteEcartee is null))
                                { ListeJoueurs[i].Ecarter(carteEcartee); }
                            }
                        }
                        break;

                    case "Bibliothèque":
                        {
                            //Le joueur va piocher des cartes jusqu'à en avoir 7 et peut défausser les cartes action

                            //On crée une liste pour les cartes allant être défaussées
                            List<Carte> deCoté = new List<Carte>();
                            while (JoueurActuel.Main.Count < 7)
                            {
                                JoueurActuel.Piocher(1);
                                Carte carte = JoueurActuel.Main[JoueurActuel.Main.Count - 1];
                                if (carte.Type.Contains("Action"))
                                {
                                    //On affiche la question.
                                    DialogResult dr = MessageBox.Show($"Voulez-vous mettre {carte.Nom} de côté?", "Choix", MessageBoxButtons.YesNo);
                                    //Si l'utilisateur répond oui, on ajoute la carte à la liste des cartes allant être défaussées
                                    if (dr == DialogResult.Yes)
                                    { deCoté.Add(carte); }
                                }
                            }
                            //Puis on défausse les cartes ayant été mises de côté
                            foreach (Carte carte in deCoté)
                            { JoueurActuel.Defausser(carte); }
                        }
                        break;

                    case "Aventurier":
                        {
                            //On va dévoiler des cartes jusqu'à trouver deux trésors. On défausse les autres

                            //On crée une List de cartes dévoilées
                            List<Carte> cartesDevoilees = new List<Carte>();
                            int i = 0;
                            //Le compteur sera incrémenté par les trésors uniquement
                            while (i < 2)
                            {
                                //Pour ne pas lever d'erreur, on vérifie que le deck contient au moins une carte
                                if (JoueurActuel.Deck.Count > 0)
                                {
                                    //Si la première carte du deck n'est pas un trésor, elle est ajoutée à la défausse
                                    if (JoueurActuel.Deck[0].Type != "Trésor")
                                    { JoueurActuel.Defausse.Add(JoueurActuel.Deck[0]); }
                                    else
                                    {
                                        //Sinon, elle est ajoutée à la main et le compteur est incrémenté
                                        JoueurActuel.Main.Add(JoueurActuel.Deck[0]);
                                        i++;
                                    }
                                    //Dans tous les cas, la carte est ajoutée à la List des cartes dévoilées, puis supprimée du Deck
                                    cartesDevoilees.Add(JoueurActuel.Deck[0]);
                                    JoueurActuel.Deck.RemoveAt(0);
                                }
                                //Si le deck est vide, on le mélange avec la défausse
                                else
                                { JoueurActuel.MelangerLeDeck(); }
                            }
                            //On affiche les cartes dévoilées
                            AffichageCartesDevoilees.listCartesDevoilees = cartesDevoilees;
                            AffichageCartesDevoilees form = new AffichageCartesDevoilees();
                            form.ShowDialog();
                            //Puis on met à jour les infos et la main

                        }
                        break;

                    case "Agrandissement":
                        {
                            //On écarte une carte de la main et reçoit une carte coûtant jusqu'à 3 de plus

                            //On fait d'abord choisir la carte à écarter dans la main
                            Carte carteEcartee = JoueurActuel.ChoisirUneCarte("Ecarter", JoueurActuel.Main, true);
                            JoueurActuel.Ecarter(carteEcartee);
                            MessageBox.Show("Choisissez une carte coûtant jusqu'à 3 de plus que la carte écartée");
                            //Puis on crée une liste de cartes coûtant au max 3 de plus que la carte écartée afin de la proposer en choix
                            List<Carte> piles = new List<Carte>();
                            //On crée une autre liste de Pile qu'on va trier pour afficher en premier les cartes les plus intéressantes
                            List<Pile> mapListe = new List<Pile>(PartieForm.mapListe);
                            mapListe = mapListe.OrderByDescending(x => x.carte.Cout).ToList();
                            foreach (Pile pile in mapListe)
                            {
                                //Les cartes proposées ne doivent pas coûter plus que 3 de plus que la carte écartée, mais elles doivent aussi encore être disponibles
                                if ((pile.nombre > 0) && (pile.carte.Cout <= carteEcartee.Cout + 3))
                                { piles.Add(pile.carte); }
                            }
                            //On choisit la carte et on la reçoit
                            Carte carteRecue = JoueurActuel.ChoisirUneCarte("Recevoir", piles, true);
                            JoueurActuel.Recevoir(carteRecue);
                        }
                        break;

                    case "Or des fous":
                        {
                            //Le trésor vaut 1 si c'est le premier joué, 4 si au moins un Or des fous a été joué précédemment

                            JoueurActuel.MonnaieDispo = ((JoueurActuel.Main.Find(x => (x.Nom == "Or des fous") && (x.EnJeu) && (x != this))) is null) ? JoueurActuel.MonnaieDispo + 1 : JoueurActuel.MonnaieDispo + 4;
                        }
                        break;

                    case "Rénovation":
                        {
                            //On écarte une carte de la main et on reçoit une carte coûtant jusqu'à 2 de plus
                            //(il s'agit ni plus ni moins que de l'effet d'agrandissement avec 2 à la place de 3)

                            //On fait d'abord choisir la carte à écarter dans la main
                            Carte carteEcartee = JoueurActuel.ChoisirUneCarte("Ecarter", JoueurActuel.Main, true);
                            JoueurActuel.Ecarter(carteEcartee);
                            MessageBox.Show("Choisissez une carte coûtant jusqu'à 2 de plus que la carte écartée");
                            //Puis on crée une liste de cartes coûtant au max 2 de plus que la carte écartée afin de la proposer en choix
                            List<Carte> piles = new List<Carte>();
                            //On crée une autre liste de Pile qu'on va trier pour afficher en premier les cartes les plus intéressantes
                            List<Pile> mapListe = new List<Pile>(PartieForm.mapListe);
                            mapListe = mapListe.OrderByDescending(x => x.carte.Cout).ToList();
                            foreach (Pile pile in mapListe)
                            {
                                //Les cartes proposées ne doivent pas coûter plus que 3 de plus que la carte écartée, mais elles doivent aussi encore être disponibles
                                if ((pile.nombre > 0) && (pile.carte.Cout <= carteEcartee.Cout + 2))
                                { piles.Add(pile.carte); }
                            }
                            //On choisit la carte et on la reçoit
                            Carte carteRecue = JoueurActuel.ChoisirUneCarte("Recevoir", piles, true);
                            JoueurActuel.Recevoir(carteRecue);
                        }
                        break;

                    case "Village agricole":
                        {
                            //Le joueur dévoile des cartes jusqu'à tomber sur une Action ou un Trésor

                            Carte carte = new Carte();

                            int i = 0;
                            do
                            {
                                carte = JoueurActuel.Deck[i];
                                i++;
                            }
                            while (!carte.Type.Contains("Action") && !carte.Type.Contains("Trésor"));
                            //Et on lance la fonction pour dévoiler le nombre de cartes approprié
                            List<Carte> cartesDevoilees = JoueurActuel.Devoiler(i);

                            //On sort la dernière carte de la List, on l'ajoute à la main, et on met les autres dans le défausse
                            JoueurActuel.Main.Add(cartesDevoilees.Last());
                            cartesDevoilees.RemoveAt(cartesDevoilees.Count - 1);
                            JoueurActuel.Defausse.AddRange(cartesDevoilees);
                        }
                        break;

                    case "Mine":
                        {
                            //Le joueur écarte un Trésor et en reçoit une dans la main coûtant jusqu'à 3 de plus
                            //Encore un code ressemblant à Agrandissement et Rénovation

                            //On fait choisir une carte Trésor et on l'écarte
                            Carte carteEcartee = JoueurActuel.ChoisirUneCarte("Ecarter", JoueurActuel.Main.FindAll(x => x.Type.Contains("Trésor")), true);
                            JoueurActuel.Ecarter(carteEcartee);
                            MessageBox.Show("Choisissez un Trésor coûtant jusqu'à 3 de plus que le Trésor écarté");
                            //Puis on crée une liste de trésors coûtant au max 3 de plus que le trésor écarté afin de la proposer en choix
                            List<Carte> piles = new List<Carte>();
                            //On crée une autre liste de Pile qu'on va trier pour afficher en premier les cartes les plus intéressantes
                            List<Pile> mapListe = new List<Pile>(PartieForm.mapListe);
                            mapListe = mapListe.OrderByDescending(x => x.carte.Cout).ToList();
                            foreach (Pile pile in mapListe)
                            {
                                //Les cartes proposées ne doivent pas coûter plus que 3 de plus que la carte écartée, mais elles doivent aussi encore être disponibles
                                if ((pile.nombre > 0) && (pile.carte.Cout <= carteEcartee.Cout + 3) && (pile.carte.Type.Contains("Trésor")))
                                { piles.Add(pile.carte); }
                            }
                            //On choisit la carte et on la reçoit
                            Carte carteRecue = JoueurActuel.ChoisirUneCarte("Recevoir", piles, true);
                            JoueurActuel.Recevoir(carteRecue, "En main");
                        }
                        break;

                    case "Marchand d'épices":
                        {
                            //Le joueur choisit une des possibiltiés en échange de l'écartement d'une carte de sa main

                            string choix = JoueurActuel.ChoisirUnePossibilite("+2 cartes +1 action", "+1 achat +2 monnaie");
                            Carte carteAecarter = JoueurActuel.ChoisirUneCarte("Ecarter", JoueurActuel.Main, true);
                            JoueurActuel.Ecarter(carteAecarter);
                            if (choix == "+2 cartes +1 action")
                            {
                                JoueurActuel.Piocher(2);
                                JoueurActuel.ActionDispo++;
                            }
                            else
                            {
                                JoueurActuel.AchatDispo++;
                                JoueurActuel.MonnaieDispo += 2;
                            }
                        }
                        break;

                    case "Ambassade":
                        {
                            //Après avoir pioché ses 5 cartes, le joueur doit en défausser 3.

                            List<Carte> aDefausser = JoueurActuel.ChoisirDesCartes("Défausser", JoueurActuel.Main, 3, true);
                            foreach (Carte carte in aDefausser)
                            { JoueurActuel.Defausser(carte); }
                        }
                        break;

                    case "Mandarin":
                        {
                            //Le joueur choisit une carte de sa main qu'il place sur son deck

                            Carte aDeplacer = JoueurActuel.ChoisirUneCarte("Deck", JoueurActuel.Main.FindAll(x => x.EnJeu == false), true);
                            JoueurActuel.Deck.Insert(0, aDeplacer);
                            JoueurActuel.Main.Remove(aDeplacer);
                        }  
                        break;
                }
		}
	*/	
}
?>