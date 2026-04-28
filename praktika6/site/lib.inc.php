<?php
	/*
	ЗАДАНИЕ 1
	- Откройте файл mod4\menu.php
	- Скопируйте код функции getMenu()
	- Вставьте скопированный код в данный файл
	*/
	/*
	ЗАДАНИЕ 2
	- Откройте файл mod4\table.php
	- Скопируйте код функции getTable()
	- Вставьте скопированный код в данный файл
	*/



	function getMenu($menu) {
		foreach($menu as $link => $href) {
			echo "<li><a href=\"$href\">$link</a></li>";
		}
	}

	function getTable()
	{
		$cols = 10;
		$rows = 10;
		echo "<table>";
		for ($tr = 1; $tr <= $rows; $tr++) {
		echo "<tr>";
			for ($td = 1; $td <= $cols; $td++) {
				if ($tr == 1 || $td == 1) echo "<th style='background-color:yellow'>", $tr * $td, "</th>";
				else echo "<td>", $tr * $td,"</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>