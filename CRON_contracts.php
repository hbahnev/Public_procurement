<?php 
$mysqli = new mysqli('localhost','root','','framework_yii2');
$mysqli->set_charset("utf8");
$mysqli->query('UPDATE contractt set status="В прогрес" WHERE deadline_application <= CURDATE();');

