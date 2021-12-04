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
        echo("welcome to the internet you smelly little potato");
    ?>
    <a href="admin.php">Super Secret Admin Link</a>
</body>