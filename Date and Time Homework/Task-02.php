<?php

	$years = isset($_POST['years'])? $_POST['years'] : '';
	$months = isset($_POST['months'])? $_POST['months'] : '';
	$days = isset($_POST['days'])? $_POST['days'] : '';
	$hours = isset($_POST['hours'])? $_POST['hours'] : '';
	$minutes = isset($_POST['minutes'])? $_POST['minutes'] : '';
	$seconds = isset($_POST['seconds'])? $_POST['seconds'] : '';
	$add_years = isset($_POST['add_years'])? $_POST['add_years'] : '';
	$add_months = isset($_POST['add_months'])? $_POST['add_months'] : '';
	$add_days = isset($_POST['add_days'])? $_POST['add_days'] : '';
	$add_hours = isset($_POST['add_hours'])? $_POST['add_hours'] : '';
	$add_minutes = isset($_POST['add_minutes'])? $_POST['add_minutes'] : '';
	$add_seconds = isset($_POST['add_seconds'])? $_POST['add_seconds'] : '';
	$format = isset($_POST['format'])? $_POST['format'] : '';

	$flag = false;
	$error = '';
	$date = '';
	
	if(isset($_POST)){

		foreach ($_POST as $key => $value) {
			if($key != 'format' && !preg_match("/^[0-9]+$/", $_POST[$key])){
				$flag = true;
			}
		}
	}
	if($flag){
		$error = 'Полетата трябва да съдържат само числа!';
	} else {
		$ts = mktime($hours + $add_hours, $minutes + $add_minutes, $seconds + $add_seconds, $months + $add_months, $days + $add_days, $years + $add_years);
		$date = date($format, $ts);
	}

	
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
	<h3><?= $error ?></h3>
	<form action="" method="post">
			<div>
				<label for="year">Години</label>
				<input type="text" id="years" name="years" value='<?= htmlspecialchars($years)?>'>
				<input type="text" id="add_years" name="add_years" value='<?= htmlspecialchars($add_years)?>'>
			</div>
			<div>
				<label for="months">Месеци</label>
				<input type="text" id="months" name="months" value='<?= htmlspecialchars($months)?>'>
				<input type="text" id="add_months" name="add_months" value='<?= htmlspecialchars($add_months)?>'>
			</div>
			<div>
				<label for="days">Дни</label>
				<input type="text" id="days" name="days" value='<?= htmlspecialchars($days)?>'>
				<input type="text" id="add_days" name="add_days" value='<?= htmlspecialchars($add_days)?>'>
			</div>
			<div>
				<label for="hours">Часове</label>
				<input type="text" id="hours" name="hours" value='<?= htmlspecialchars($hours)?>'>
				<input type="text" id="add_hours" name="add_hours" value='<?= htmlspecialchars($add_hours)?>'>
			</div>
			<div>
				<label for="minutes">Минути</label>
				<input type="text" id="minutes" name="minutes" value='<?= htmlspecialchars($minutes)?>'>
				<input type="text" id="add_minutes" name="add_minutes" value='<?= htmlspecialchars($add_minutes)?>'>
			</div>
			<div>
				<label for="seconds">Секунди</label>
				<input type="text" id="seconds" name="seconds" value='<?= htmlspecialchars($seconds)?>'>
				<input type="text" id="add_seconds" name="add_seconds" value='<?= htmlspecialchars($add_seconds)?>'>
			</div>
		<div>
			<label for="format">Формат</label>
			<select id="format" name="format">
				<option value="Y-m-d H:i:s">Y-m-d H:i:s</option>
				<option value="H:i:s">H:i:s</option>
				<option value="Y-m-d">Y-m-d</option>
				<option value="H:i:s d/m/Y">H:i:s d/m/Y</option>
			</select>
		</div>
		<button type="submit">Click</button>
	</form>
	
	<p><?= $date ?></p>
	
</body>
</html>