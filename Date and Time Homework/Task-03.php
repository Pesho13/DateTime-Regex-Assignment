<?php

// 1. Всички думи, в които се съдържа “is”

$string = <<<EOT
isterik
okisterik
moro
korois
porti
dasdf
33rwIsdf
ISdfg
EOT;


preg_match_all('/.*is.*/', $string, $matches);
print_r($matches);


// 2. Всички думи, които завършват на “ting”

$string2 = <<<EOT
apple
noting
tingoo
32423dsdting
dsdfs
EOT;

preg_match_all('/.*ting\b/', $string2, $matches2);
print_r($matches2);


// 3. Валидна дума

preg_match_all('/\s*[a-z]+\s*/i', 'asdefwfs vcvbcvbc cvcvc', $matches2);
print_r($matches2);


// 4. Валидно изречение

preg_match_all('/^[A-Z]+[A-z\s]+[\.!\?]$/', 'Az obicham mach i boza.', $matches2);
print_r($matches2);


// 5. Валиден български GSM номер

preg_match_all('@08[7-9][0-9](\s*|/)([0-9](\s*|\-*|/*)){6}@', '0899 123456', $matches2);
print_r($matches2);


//6. Валиден HTML tag

$html = <<<EOT
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript"></script>
</head>
<body>
	<select id='optionList'>
		<option value="1">1</option>
	</select>
	<div id="the_div" style="width:100px; height:100px; border:1px solid black"></div>
</body>
</html>
EOT;

preg_match_all('@<(\"[^\"]*\"|\'[^\']*\'|[^\'\">])*>@', $html, $matches2);
print_r($matches2);


// 7. Валиден PHP statement

$statement = <<<EOT
for(\$i = 0; \$i < 10; \$i++) {}
while(\$i < 10) {}
switch(\$a) {}
foreach(\$array as \$key => \$value){}
do {} while();
EOT;

preg_match_all('/((for|while|switch|foreach)+\(.*;?.*;?.*\)\s*\{.*\r*\})|do\s*\{.*\r*\}\s*\r*while\(.*\);/', $statement, $matches2);
print_r($matches2);


// 8. Всички хора с име Иван в текст

$string = "Иван иван диван Иваново ИВАН";

preg_match_all('/\bиван\b/ui', $string, $matches2);
print_r($matches2);


// 9. Всички коли с СТ регистрация

$string = <<<EOT
CT 1234 AA
H 4323 AC
4325CT43
CT 5435 AC
M342 CT
EOT;

preg_match_all('/.*CT+.*/', $string, $matches);
print_r($matches);


// 10. Всички мейли в gmail

preg_match_all('/^[A-z0-9](\.?[A-z0-9]){5,}@?gmail\.com/', 'E23.aa.aaa@gmail.com', $matches); 
print_r($matches);


// 11. Всички мейли в gmail, yahoo, abv

preg_match_all('/.+@(gmail.com$|yahoo.com$|abv.bg$)/', 'mmmmmm@yahoo.com', $matches);
print_r($matches);

// 12. Всички числа между 1000 и 19000

$number = rand(100, 25000);
echo $number;

preg_match_all('/19000|(^1[0-8][0-9]{3}$)|(^[1-9][0-9]{3}$)/', $number, $matches);
print_r($matches);


// 13. всички валидни CSS класове

preg_match_all('/^[^\.]*\.{1}[^\.]+$/', 'selector.class', $matches);
print_r($matches);


// 14. Началото на всички валидни PHP while цикли

preg_match_all('/^while\s*\(.*\)/', 'while($i > 5)', $matches);
print_r($matches);


// 15. Валиден SQL SELECT стейтмънт 

preg_match_all('/SELECT\s+[\*A-z_,]+\s+FROM\s+[A-z_]+\s*(WHERE)?\s*[A-z_]*\s*[<>=]*\s*[A-z0-9]*/', 'SELECT name FROM customers WHERE abv>=cde', $matches);
print_r($matches);

