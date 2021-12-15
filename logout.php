<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION["name"]))
        {
            unset($_SESSION["name"]);
        }
    ?>
    Logged out successfully
    <a href="login.php">Log back in?</a>
</body>