<?php
	$li_one = 5;
	$li_tov = 5;
	?>
<!DOCTYPE html>

<html lang="ru">
<head>
	<title>Циклы</title>
	<meta charset= "utf-8"/>
	<style>
		* {
			font-family: Arial;
			font-size: 12px;
		}
		ul {
			list-style-type: square;
		}
		.tovars div {
			display: inline-block;
			width: 40%;
		}
		.tovars img {
			width: 297px;
			height: 387px;
			background-size: cover;	
		}
	</style>
</head>
<body>
	<h1>Генерация кода</h1>
	<?php
	?>
	<ul class="one">
		<li>Элемент 1</li>
			<?php 
				for ($i=2; $i <= $li_one; $i++) { 
					echo "<li>"."Элемент ".$i."</li>";
				}
			?>
	</ul>
	<div class="tovars">
		<div>
			<p>Товар 1</p>
			<img src="img/tovar_1.png" alt="Товар 1"><br>
		</div>
		<?php 
			for ($i=2; $i <= $li_tov; $i++) { 
				echo <<<SYNTAX
					<div>
						<p>Товар $i</p>
						<img src='img/tovar_$i.png' alt='Товар $i'><br>
					</div>
				SYNTAX;
			}
		?>
	</div>
</body>
</html>
