<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php

    setcookie('time', date(DATE_COOKIE), (time()+(60*60*3)));
    setcookie('name', 'Topphem', time()+60*60*3);

    ?>
</head>
<body>
<form method="get" action="4.2.2.php">

    För att godkänna Cookies klicka på knappen
    <input type="submit">
</form>

</body>
</html>
