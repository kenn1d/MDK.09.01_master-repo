<!DOCTYPE html>
<html>
<head>
	<title>Шаблон сайта</title>
	<meta charset="UTF-8" />
</head>
<body>
	<td>
	<?php
		include_once "lib.inc.php";
		include_once "top.inc.php";
		include_once "menu.inc.php";
		
		$id = strip_tags($_GET["id"]);
		switch($id) {
			case "page1":
				include "page1.php"; break;
			case "page2":
				include "page2.php"; break;
			case "page3":
				include "page3.php"; break;
			case "table":
				getTable(); break;
			case "home":
			default:
				echo "<h1 algin='center'>Добро пожаловать!</h1>";
		} 
		include_once "bottom.inc.php";
	?>
	</td>
</body>
</html>