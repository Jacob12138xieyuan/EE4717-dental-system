<!DOCTYPE html>
<html>
<body>

<?php
$to = 'f35ee@localhost';
$subject= 'dental appointment'
$massage= ' Your have made an appointment'
$headers= 'From: f35ee@localhost'. "\r\n".
'Reply-To:f35ee@localhost'. "\r\n".
'X-Mailer: PHP/'. phpversion();
mail($to, $subject, $massage, $headers, '-f35ee@localhost');
echo("mail send to:". $to);
?>
</body>
</html>