<?php
	include '../config.php';

	if(isset($_POST['register'])) {
		$error = false;
		// Pseudo set verification
		if(isset($_POST['pseudo']) and preg_match("/^[a-zA-Z0-9_.-]{3,16}$/", $_POST['pseudo'])) {
			$pseudo = $_POST['pseudo'];
		} else {
			$error = true;
			$pseudoError = "Pseudo invalide";
		}
		// Email set verification and validation
		if(isset($_POST['email']) and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$sql = "SELECT num_joueur FROM joueurs WHERE email_joueur='".$_POST['email']."' LIMIT 1";
			$result = $conn->query($sql);
			if ($result->num_rows == 0) {
				$email = $_POST['email'];
			} else {
				$error = true;
				$emailError = "Email déjà prise";
			}
		} else {
			$error = true;
			$emailError = "Email invalide";
		}

		// Password set verification
		if(isset($_POST['password']) and preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $_POST['password'])) {
			$password = $_POST['password'];
		} else {
			$error = true;
			$passwordError = "Mot de passe invalide";
		}

		// Password check set verification
		if(!isset($_POST['checkpassword']) or $_POST['checkpassword'] != $_POST['password']) {
			$error = true;
			$passwordCheckError = "Votre mdp ne correspond pas";
		}

		// Sending player's infos to db + connection
		if($error == false) {
			
			$sql = "INSERT INTO joueurs (nom_joueur, email_joueur, mdp_joueur) VALUES ('".$pseudo."', '".$email."', '".$password."')";
			if ($conn->query($sql) === TRUE) {    
				header('Location: classement.php');      
				exit();
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		
	

		
	}
	
?>
<!doctype html>
<html> 

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/private/css/main.css">
	<script src="assets/vendor/tailwind/tailwind.js"></script>
	<script src="assets/private/js/main.js"></script>
</head>

<body class="bg-gray-100 font-outfit">
	<div class="flex items-center justify-center min-h-screen">
		<div class="px-8 py-6 mt-7 text-left bg-white shadow-lg lg:rounded-3xl md:rounded-3xl">
			<h3 class="text-2xl text-center">Inscription</h3>
			<form method="POST">
				<div class="mt-7">
					<div>
						<label class="block" for="pseudo">Pseudo<label>
						<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?php if(isset($_POST['pseudo'])) {echo($_POST['pseudo']);}?>" class="w-full px-4 py-2 mt-2 border rounded-full focus:outline-none <?php if(isset($pseudoError)){echo('ring-1 focus:ring-2 ring-red-600');} else{echo('focus:ring-1 ring-blue-600');} ?>">
						<p class="text-center mt-2 text-red-600"><?php if(isset($pseudoError)) {echo($pseudoError);}?></p>
					</div>
					<div class="mt-4">
						<label class="block" for="email">Adresse mail<label>
						<input type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email'])) {echo($_POST['email']);}?>" class="w-full px-4 py-2 mt-2 border rounded-full focus:outline-none <?php if(isset($emailError)){echo('ring-1 focus:ring-2 ring-red-600');} else{echo('focus:ring-1 ring-blue-600');} ?>">
						<p class="text-center mt-2 text-red-600"><?php if(isset($emailError)) {echo($emailError);}?></p>
					</div>
					<div class="mt-4">
						<label class="block" for="password">Mot de passe<label>
						<input type="password" name="password" id="password" placeholder="Mot de passe" class="w-full px-4 py-2 mt-2 border rounded-full focus:outline-none <?php if(isset($passwordError)){echo('ring-1 focus:ring-2 ring-red-600');} else{echo('focus:ring-1 ring-blue-600');} ?>">
						<p class="text-center mt-2 text-red-600"><?php if(isset($passwordError)) {echo($passwordError);}?></p>
					</div>
					<div class="mt-4">
						<label class="block" for="checkpassword">Répéter mot de passe<label>
						<input type="password" name="checkpassword" id="checkpassword" placeholder="Mot de passe" class="w-full px-4 py-2 mt-2 border rounded-full focus:outline-none <?php if(isset($passwordCheckError)){echo('ring-1 focus:ring-2 ring-red-600');} else{echo('focus:ring-1 ring-blue-600');} ?>">
						<p class="text-center mt-2 text-red-600"><?php if(isset($passwordCheckError)) {echo($passwordCheckError);}?></p>
					</div>
					<div class="flex items-baseline justify-between">
						<button type="submit" name="register" class="px-4 py-2 mt-7 text-white bg-blue-600 rounded-full transition ease-in-out lg:rounded-l-mdbg-blue-500 hover:scale-110 hover:bg-indigo-500 duration-300">
							S'inscrire
						</button>
						<a href="login.php" class="text-sm text-blue-600">Retour</a>
					</div>
				</div>
			</form>
		</div>
	</div>

</body>

</html>