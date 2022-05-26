<?php
    require_once '../config.php';

	$sql = "SELECT nom_joueur, parties_jouees, parties_gagnees FROM joueurs ORDER BY parties_gagnees DESC LIMIT 10";
	$result = $conn->query($sql);
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

	<div class="text-center mt-20">
		<p class="text-5xl font-semibold">Classement</p>
		<p class="text-xl">TOP 10 des meilleurs joueurs</p>
	</div>
	<div class="flex justify-center">
		<div class="lg:w-2/3 w-full text-white lg:rounded-3xl drop-shadow-lg mt-8 mb-20 table">
			<table class="table-fixed w-full text-3xl text-center">
				<thead>
					<tr class="table-bg text-4xl font-bold">
						<td class="text-right">Place</td>
						<td>Pseudo</td>
						<td>Parties jouées</td>
						<td class="text-left">Victoires</td>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($result->num_rows > 0) {
							// output data of each row
							$num = 0;
							while($row = $result->fetch_assoc()) {
								$num++;
								echo "<tr><td class=\"text-right\">#".$num."</td><td>".$row["nom_joueur"]."</td><td>".$row["parties_jouees"]."</td><td class=\"text-left\">".$row["parties_gagnees"]."</td></tr>";
							}
						} else {
							echo "0 results";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<?php 
			include '../footer.php';
			include '../modal.php';
	?>
</body>

</html>