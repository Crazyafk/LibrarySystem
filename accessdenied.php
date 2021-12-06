<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        session_start();  
        if (!isset($_SESSION['name'])) 
        {    
            header("Location:login.php"); 
        } 
        include_once("conn.php");
        echo("oh no you can't access this page you smell little potato");
    ?>
    <a href="login.php">Log in with a different account</a>
    <a href="index.php">Return to Homepage</a>
</body>