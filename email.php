<!DOCTYPE html>
<html>

<body>

    <?php
    $to = 'root@localhost';
    $subject = 'dental appointment';
    $massage = ' Your have made an appointment';
    $headers = 'From: root@localhost' . "\r\n" .
        'Reply-To:root@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $massage, $headers, '-root@localhost');
    echo ("mail send to:" . $to);
    ?>
</body>

</html>