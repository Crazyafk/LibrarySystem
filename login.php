<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        include_once("conn.php");
    ?>
    <form action="loginprocess.php" method="POST">
        User name:<input type="text" name="Username"><br>
        Password:<input type="password" name="Pword"><br>
        <input type="submit" value="Login">
</form>
</body>