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
	<div class="header drop-shadow-md">
		<?php 
			include '../navbar.php';
		?>
		<!-- btn download -->
		<div class="w-60 cursor-pointer modal-open bg-blue-500 transition ease-in-out lg:rounded-l-mdbg-blue-500 hover:scale-110 hover:bg-indigo-500 duration-300 font-bold text-white text-3xl text-center py-2 rounded-3xl rounded-t-none rounded-l-none drop-shadow-lg">
			Télécharger
		</div>
	</div>

	<!-- etiquette -->
	<div class="flex justify-center font-outfit">
		<span class="etiquette p-8 text-lg drop-shadow-lg rounded-3xl text-center lg:w-1/2 sm:w-full">
			<p class="text-4xl font-medium">Notre projet</p>
			<p class="text-2xl mt-5">
				Pour notre TFE (Travail de Fin d’Étude) nous devons développer un jeu de cartes en Python relié à une base de données avec un site web fait en HTML/CSS et PhP sur le côté, notre choix s’est porté sur le célèbre jeu Uno auquel nous rajouterons une petite particularité. 
			</p>
			
		</span>
	</div>

	<!-- Marcel -->
	<div class="mt-20 lg:ml-20 lg:mr-20 grid lg:grid-cols-3 sm:grid-cols-1 flex">
		<!-- img -->
		<div class="lg:ml-20 lg:rounded-3xl drop-shadow-lg text-center pp-l pp" style="background-image: url(assets/images/pp-1.jpg); z-index: 1;"></div>
		<!-- description -->
		<div class="lg:col-span-2 mb-20 lg:pl-20 lg:mr-20 lg:mt-20 p-10 text-lg bg-grey drop-shadow-lg lg:rounded-3xl lg:text-left text-center pp-desc-l">
			<p class="text-4xl mb-12 mt-12 font-medium">Marcel</p>
			<p class="text-2xl">
				19 ans, élève depuis 2018 à l’IPET en informatique.
			</p>
		</div>
	</div>

	<!-- Marie -->
	<div class="mt-20 lg:ml-20 lg:mr-20 grid lg:grid-cols-3 sm:grid-cols-1 flex">
			<!-- description -->
		<div class="lg:col-span-2 lg:pr-20 lg:ml-20 lg:mb-20 lg:mt-20 p-10 text-lg bg-grey drop-shadow-lg lg:rounded-3xl lg:text-right text-center pp-desc-r">
		<p class="text-4xl mb-12 mt-12 font-medium">Marie</p>
			<p class="text-2xl">
				19 ans, élève depuis 2018 à l’IPET en informatique.
			</p>
		</div>
		<!-- img -->
		<div class="lg:mr-20 lg:rounded-3xl drop-shadow-lg text-center pp-r pp" style="background-image: url(assets/images/pp-2.jpg); z-index: 1;"></div>
	</div>

	<!-- Marcel -->
	<div class="mt-20 lg:ml-20 lg:mr-20 grid lg:grid-cols-3 sm:grid-cols-1 flex">
		<!-- img -->
		<div class="lg:ml-20 lg:rounded-3xl drop-shadow-lg text-center pp-l pp" style="background-image: url(assets/images/pp-3.jpg); z-index: 1;"></div>
		<!-- description -->
		<div class="lg:col-span-2 mb-20 lg:pl-20 lg:mr-20 lg:mt-20 p-10 text-lg bg-grey drop-shadow-lg lg:rounded-3xl lg:text-left text-center pp-desc-l">
			<p class="text-4xl mb-12 mt-12 font-medium">Jennyfer</p>
			<p class="text-2xl">
				19 ans, élève depuis 2018 à l’IPET en informatique. 
				<p class="text-base text-transparent">(Encore, Oui.)</p>
			</p>
		</div>
	</div>





	<?php 
			include '../footer.php';
			include '../modal.php';
	?>

</body>

</html>