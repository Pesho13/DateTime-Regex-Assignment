<?php

$years = isset($_POST['years'])? $_POST['years'] : '';
$months = isset($_POST['months'])? $_POST['months'] : '';
$days = isset($_POST['days'])? $_POST['days'] : '';

function dateCheck($years, $months, $days) {
	if($years == "" || $months == "" || $days == "") {
		return 'Попълнете всички полета!';
	}
	
	if(!is_numeric($years) || !is_numeric($months) || !is_numeric($days)) {
		return 	'Невалидна дата!';
	}

	if(checkdate($months, $days, $years)) {
		return 'Валидна дата!';
	} else {
		return 'Невалидна дата!';
	}
}

$result = dateCheck($years, $months, $days);


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style type="text/css">
	label {
		display: block;
	}
</style>
</head>
<body>
		<h4><?= $result ?></h4>
		<form action="" method="post">
			<div>
				<label for="months">Месеци</label>
				<input type="text" id="months" name="months" value='<?= htmlspecialchars($months)?>'>
			</div>
			<div>
				<label for="days">Дни</label>
				<input type="text" id="days" name="days" value='<?= htmlspecialchars($days)?>'>
			</div>
			<div>
				<label for="year">Години</label>
				<input type="text" id="years" name="years" value='<?= htmlspecialchars($years)?>'>
			</div>
			<button type="submit">Check!</button>
		</form>
</body>
</html>