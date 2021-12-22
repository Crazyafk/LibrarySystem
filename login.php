<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include_once("functions.php");
        session_start(); 

        if(!isset($_SESSION['name'])) 
        {    
            echo("<div class='alert alert-info'>Please Login</div>");
        }else{
            echoNavbar($conn);
        }

        if(isset($_SESSION["loginfailurereason"]))
        {
            echo("<div class='alert alert-danger'>".$_SESSION["loginfailurereason"]."</div>");

            $_SESSION["loginfailurereason"] = null;
        }
    ?>
    <form action="loginprocess.php" method="POST">
        User name:<input type="text" name="Username"><br>
        Password:<input type="password" name="Pword"><br>
        <input type="submit" value="Login">
</form>
</body>