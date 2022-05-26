<?php
    include '../config.php';

    if(isset($_POST['login'])){
        $error = false;
        
        // Email set verification
        if(isset($_POST['email']) and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];
        } else {
            $error=true;
        }
    
        // Password set verification
        if(isset($_POST['password']) and preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $error=true;
        }
    
        // Password and email check
        if($error == false) {
            $sql = "SELECT mdp_joueur FROM joueurs WHERE email_joueur='".$_POST['email']."' and mdp_joueur='".$_POST['password']."' LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows != 0) {
                echo('cébon');
            }
            header('Location: classement.php');      
            exit();
        } else {
            $emailError = "Email ou mot de passe invalide";
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
            <h3 class="text-2xl text-center">Pour accéder au classement <br> veuillez vous connecter.</h3>
            <form method="POST">
                <div class="mt-7">
                   <div class="mt-4">
						<label class="block" for="email">Adresse mail<label>
						<input type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email'])) {echo($_POST['email']);}?>" class="w-full px-4 py-2 mt-2 border rounded-full focus:outline-none <?php if(isset($emailError)){echo('ring-1 focus:ring-2 ring-red-600');} else{echo('focus:ring-1 ring-blue-600');} ?>">
						<p class="text-center mt-2 text-red-600"><?php if(isset($emailError)) {echo($emailError);}?></p>
					</div>
                    <div class="mt-4">
						<label class="block" for="password">Mot de passe<label>
						<input type="password" name="password" id="password" placeholder="Mot de passe" class="w-full px-4 py-2 mt-2 border rounded-full focus:outline-none <?php if(isset($emailError)){echo('ring-1 focus:ring-2 ring-red-600');} else{echo('focus:ring-1 ring-blue-600');} ?>">
						<p class="text-center mt-2 text-red-600"></p>
					</div>
                    <div class="flex items-baseline justify-between">
                        <button type="submit" name="login" class="px-4 py-2 mt-7 text-white bg-blue-600 rounded-full transition ease-in-out lg:rounded-l-mdbg-blue-500 hover:scale-110 hover:bg-indigo-500 duration-300">
                            Se connecter 
                        </button>
                        <a href="register.php" type="submit" class="text-sm text-blue-600">S'inscrire</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>