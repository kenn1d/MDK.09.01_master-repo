<?php
/*
ЗАДАНИЕ 1
- Проверьте, была ли корректно отправлена форма
- Если она была отправлена, отфильтруйте полученные значения
- В зависимости от оператора производите различные математические действия
- В случае деления, проверьте, делитель на равенство с нулем (на ноль делить нельзя)
- Сохраните полученный результат вычисления в переменной */

	$mas = [
		'a' => '',
		'b' => '',
		'operator' => '',
		'result' => ''
	];
	
	if ($_POST != null) {
		$index = 0;
		foreach ($_POST as $key) {
			if ($key == '') $index++;
		}
		if ($index == 0) {
			$mas['a'] = (float)$_POST['num1'];
			$mas['b'] = (float)$_POST['num2'];
			$mas['operator'] = $_POST['operator'];
			$op = $_POST['operator'];
			switch ($op) {
				case '+':
					$mas['result'] = $_POST['num1'] + $_POST['num2']; break;
				case '-':
					$mas['result'] = $_POST['num1'] - $_POST['num2']; break;
				case '*':
					$mas['result'] = $_POST['num1'] * $_POST['num2']; break;
				case '/':
					$mas['result'] = ($_POST['num2'] != 0) ? $_POST['num1'] / $_POST['num2'] : 'Ошибка деления на ноль!'; break;
				default:
				$mas['result'] = 'Неизвестный оператор';
			}
		}
		else echo "<script>alert('Заполните все поля!')</script>";
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Калькулятор</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Калькулятор</h1>

<?php
/*
ЗАДАНИЕ 2
- Если результат существует, выведите его
*/
	if (gettype($mas['result']) == "float" || gettype($mas['result']) == "integer")
		echo "Результат: ", $mas['a'], $mas['operator'], $mas['b'], " = ", $mas['result'];
	else echo "<script>alert('Проверьте вводимые числа')</script>"
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Число 1:<br />
<input type="text" name="num1" /><br /><br />

Оператор:<br />
<input type="text" name="operator" /><br /><br />

Число 2:<br />
<input type="text" name="num2" /><br /><br />

<input type="submit" value="Считать!" />

</form>

</body>
</html>