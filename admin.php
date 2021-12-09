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
        session_start();  
        if (!isset($_SESSION['name'])) 
        {    
            header("Location:login.php"); 
        }
        include_once("functions.php");
        $role = getRole($conn,$_SESSION['name']);
        if($role != "A")
        {
            header("Location:accessdenied.php"); 
        }
        //NAVBAR
    ?>
    <nav class="navbar navbar-expand-sm bg-dark md-5">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login with a new account</a>
            </li>
            <?php
            if($role == "A"){
                echo("
                    <li class='nav-item'>
                        <a class='nav-link' href='admin.php'>Admin Link</a>
                    </li>
                ");
            }if($role == "A" || $role == "L"){
                echo("
                    <li class='nav-item'>
                        <a class='nav-link' href='librarian.php'>Librarian Link</a>
                    </li>
                ");
            }
            ?>
        </ul></nav>
    Reinstall Tables:
    <form action="install.php" method="POST">
        Include Test Data:
        <input type="radio" name="testdata" value="yes">Yes<br>
        <input type="radio" name="testdata" value="no">No<br>
        <input type="submit" value="reset tables">
    </form>
</body>