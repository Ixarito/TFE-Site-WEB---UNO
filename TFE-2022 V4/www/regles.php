<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/private/css/main.css">
	<script src="assets/vendor/tailwind/tailwind.js"></script>
	<script src="assets/private/js/main.js"></script>
</head>

<body class="font-outfit">

	<!-- Navbar+Header -->
	<div class="header-min drop-shadow-md">
		<?php 
			include '../navbar.php';
		?>
		<!-- btn download -->
		<div class="w-60 cursor-pointer modal-open bg-blue-500 transition ease-in-out lg:rounded-l-mdbg-blue-500 hover:scale-110 hover:bg-indigo-500 duration-300 font-bold text-white text-3xl text-center py-2 rounded-3xl rounded-t-none rounded-l-none drop-shadow-lg">
			Télécharger
		</div>
	</div>


	<!-- cards -->
	<div class="lg:ml-20 ml-6 lg:text-left text-center mt-20">
		<p class="text-5xl lg:ml-20 mb-5 font-semibold ">Cartes</p>
	</div>
	<div class="lg:ml-20 lg:mr-20 grid lg:grid-cols-2 sm:grid-cols-1 flex ">
		<!-- card's img -->
		<div class="lg:ml-20 pt-5 lg:rounded-l-md drop-shadow-lg text-center bg-rules"
			style="background-image: url(assets/images/bg-regles-1.png);"></div>
		<!-- card's description -->
		<div class="lg:mr-20 p-10 lg:rounded-r text-lg bg-grey drop-shadow-lg lg:rounded-r-md text-center">
			<p class="text-4xl mb-10 font-medium">Cartes Classiques</p>
			<p class="text-2xl">
				Les cartes classiques sont disponibles dans toutes les couleurs du jeu (Gris, Mauve, Vert, Rouge, Bleu
				et Jaune). Elles sont numérotées de 0 à 9 et n’ont aucune fonction particulière.
			</p>
		</div>
	</div>

	<div class="lg:ml-20 lg:mr-20 grid lg:grid-cols-2 sm:grid-cols-1 flex  mt-10">
		<!-- card's description -->
		<div class="lg:ml-20 p-10 lg:rounded-r text-lg bg-grey drop-shadow-lg lg:rounded-l-md text-center">
			<p class="text-4xl mb-10">Cartes Inversion</p>
			<p class="text-2xl">
				Lorsque la carte Inversion est jouée le sens du jeu est inversé, passant du sens horloger à un sens
				anti-horloger ou vice versa. Ces cartes peuvent être jouées à n’importe quel moment et sont disponibles
				dans toutes les couleurs du jeu. Cette carte ne peut pas être jouée lorsqu’il n’y a que deux joueurs.
			</p>
		</div>
		<!-- card's img -->
		<div class="lg:mr-20 pt-5 lg:rounded-r-md drop-shadow-lg text-center bg-rules"
			style="background-image: url(assets/images/bg-regles-2.png);"></div>
	</div>
	<div class="lg:ml-20 lg:mr-20 grid lg:grid-cols-2 sm:grid-cols-1 flex  mt-10">
		<!-- card's img -->
		<div class="lg:ml-20 pt-5 lg:rounded-l-md drop-shadow-lg text-center bg-rules"
			style="background-image: url(assets/images/bg-regles-3.png);"></div>
		<!-- card's description -->
		<div class="lg:mr-20 p-10 lg:rounded-r text-lg bg-grey drop-shadow-lg lg:rounded-r-md text-center">
			<p class="text-4xl mb-10">Cartes Blocage</p>
			<p class="text-2xl">
				Ces cartes servent à changer le sens du jeu passant du sens horloger à un sens anti-horloger, ces cartes
				ne peuvent être utilisées que si la carte en haut du paquet a la même couleur ou le même type. Les
				cartes “Blocage” ne sont pas incluses dans les parties à deux joueurs. Ces cartes posèdent une des 6
				couleurs.
			</p>
		</div>
	</div>
	<div class="lg:ml-20 lg:mr-20 grid lg:grid-cols-2 sm:grid-cols-1 flex  mt-10">
		<!-- card's description -->
		<div class="lg:ml-20 p-10 lg:rounded-r text-lg bg-grey drop-shadow-lg lg:rounded-l-md text-center">
			<p class="text-4xl mb-10">Cartes +2</p>
			<p class="text-2xl">
				Ces cartes existent dans les 6 couleurs disponibles dans le jeu, elles forcent le joueur suivant à
				piocher deux cartes au hasard du paquet et à lui faire passer son tour. Cette carte peut être utilisée
				si la carte en haut du paquet a la même couleur. Si la première carte du jeu est une carte +2 alors seul
				la couleur sera prise en compte.
			</p>
		</div>
		<!-- card's img -->
		<div class="lg:mr-20 pt-5 lg:rounded-r-md drop-shadow-lg text-center bg-rules"
			style="background-image: url(assets/images/bg-regles-4.png);"></div>
	</div>
	<div class="lg:ml-20 lg:mr-20 grid lg:grid-cols-2 sm:grid-cols-1 flex  mt-10">
		<!-- card's img -->
		<div class="lg:ml-20 pt-5 lg:rounded-l-md drop-shadow-lg text-center bg-rules"
			style="background-image: url(assets/images/bg-regles-5.png);"></div>
		<!-- card's description -->
		<div class="lg:mr-20 p-10 lg:rounded-r text-lg bg-grey drop-shadow-lg lg:rounded-r-md text-center">
			<p class="text-4xl mb-10">Cartes -1 et -2</p>
			<p class="text-2xl">
				Ces cartes permettent au joueur qui l’a jouée de pouvoir se débarrasser d’une ou de deux cartes au
				hasard de son deck. Ces cartes sont disponibles dans les 6 couleurs du jeu.
			</p>
		</div>
	</div>
	<div class="lg:ml-20 lg:mr-20 grid lg:grid-cols-2 sm:grid-cols-1 flex  mt-10">
		<!-- card's description -->
		<div class="lg:ml-20 p-10 lg:rounded-r text-lg bg-grey drop-shadow-lg lg:rounded-l-md text-center">
			<p class="text-4xl mb-10">Carte Joker</p>
			<p class="text-2xl">
				Cette carte permet au joueur qui l’a tirée de choisir une couleur pour continuer la partie, le joueur
				peut changer de couleur parmis toutes les couleurs disponibles (Gris, Mauve, Bleu, Vert, Jaune, Rouge)
				ou continuer sur la couleur actuelle. Si cette carte est tirée en premier c'est au premier joueur actif
				de choisir la couleur.
			</p>
		</div>
		<!-- card's img -->
		<div class="lg:mr-20 pt-5 lg:rounded-r-md drop-shadow-lg text-center bg-rules"
			style="background-image: url(assets/images/bg-regles-6.png);"></div>
	</div>
	<div class="lg:ml-20 lg:mr-20 grid lg:grid-cols-2 sm:grid-cols-1 flex  mt-10">
		<!-- card's img -->
		<div class="lg:ml-20 pt-5 lg:rounded-l-md drop-shadow-lg text-center bg-rules"
			style="background-image: url(assets/images/bg-regles-7.png);"></div>
		<!-- card's description -->
		<div class="lg:mr-20 p-10 lg:rounded-r text-lg bg-grey drop-shadow-lg lg:rounded-r-md text-center">
			<p class="text-4xl mb-10">Carte Super Joker</p>
			<p class="text-2xl">
				Cette carte permet au joueur qui l’a joué de forcer le prochain joueur à piocher 4 cartes au hasard du
				paquet, à faire lui faire passer son tour et à changer de couleur.
			</p>
		</div>
	</div>

	<!-- etiquette -->
	<div class="flex justify-center mt-20 lg:mx-20 m-10">
		<span class="text-lg lg:lg:rounded-3xl w-full lg:mx-20">
			<p class="text-5xl mb-10 font-semibold lg:text-left text-center">Règles globales</p>
			<p class="text-lg">
			<p> 1.1 - Le jeu peut se jouer seulement de 2 à 10 joueurs. </p>
			<p class="mt-2">1.2 - Pour gagner le joueur doit s’être débarrassé de toutes ses cartes en premier.</p>
			<p class="mt-3">1.3 - Au début de la partie chaque joueur reçoit 10 cartes au hasard.</p>
			<p class="mt-3">1.4 - Les cartes restantes du paquet sont placées face cachée.</p>
			<p class="mt-3">1.5 - La carte du dessus du paquet est retournée de façon à ce qu’on puisse la voir.</p>
			<p class="mt-3">1.6 - N’importe quel type de cartes peut être tirée au sort en tant que première carte du
				paquet et seulement dans le cas d'une carte JOKER une couleur est tirée au hasard.</p>
			<p class="mt-3">1.7 - Lorsqu'une carte ACTION est tirée en tant que première carte du paquet son effet ne
				comptera pas sur les joueurs.</p>
			<p class="mt-3">1.8 - Le joueur peut voir seulement ses propres cartes et ne peut voir celles des autres
				joueurs</p>
			<p class="mt-3">1.9 - Pour se débarrasser d’une carte, la carte du joueur doit avoir : </p>
			<p class="ml-9">Soit, la même couleur que la première carte du paquet</p>
			<p class="ml-9">Soit, le même numéro que la première carte du paquet</p>
			<p class="ml-9">Soit, le même symbole que la première carte du paquet</p>
			<p class="ml-9">Exception : Les cartes JOKER ne tiennent pas compte de cette règle, on peut les jouer à
				n’importe quel moment</p>
			<p class="mt-3">1.10 - Lorsqu’un joueur se débarrasse d’une carte, sa carte vient remplacer celle qui se
				trouve au dessus du paquet</p>
			<p class="mt-3">1.11 - Le joueur n’a le droit de se débarrasser que d’une seule carte à la fois</p>
			<p class="mt-3">1.12 - Si un joueur ne peut se débarrasser d’aucune de ses cartes, il doit en piocher une
				nouvelle (elle sera tirée au hasard) et celui-ci doit passer son tour.</p>
			<p class="mt-3">1.13 - Au début de la partie le sens du jeu se fait dans le sens horloger.</p>
			<p class="mt-3">1.14 - Lorsqu’il y a UNIQUEMENT 2 joueurs, les cartes “Inversion” et "Passer" ne font pas
				partie du jeu.</p>
			</p>
		</span>
	</div>


	<?php 
			include '../footer.php';
			include '../modal.php';
	?>
</body>

</html>