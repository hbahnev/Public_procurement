<?php 
$mysqli = new mysqli('localhost','root','','framework_yii2');

$query = "SELECT * FROM `contractt`
JOIN `applications`  ON `applications`.`contract_number`  = `contractt`.`id`
JOIN `user` ON `applications`.`owner_id` = `user`.`id`
 WHERE deadline_application >=(CURDATE()-INTERVAL 3 DAY)";
$result = $mysqli->query($query);

while($row=$result->fetch_assoc()){
	SendMail($row['email'],$row['title']);
}

function SendMail($email, $title){
	 $subject = 'Applications expires';

        $message = '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <style>
        header img {
                display: block;
            margin-left: auto;
            margin-right: auto ;
        }

        body {
                text-align:center;
        }

        </style>
        </head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>

        <body>

        <hr>

        <h1>This is automatic generated email .</h1>

        <p>
			Soon application period end!<br/>
			Contract : '.$title.'
        </p>


        <div>

        </div>

        </body>
        </html>';

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= 'To: ' . $email . "\r\n";
        $headers .= 'From: no-reply@military.com' . "\r\n";

        if (!mail($email, $subject, $message, $headers)) {
            die('error');
        }
}
