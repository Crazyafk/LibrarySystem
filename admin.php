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
        include_once("functions.php");
        $role = getRole($conn,$_SESSION['name']);
        echo("<br>");
        echo($role);
        echo("<br>");
        if(getRole($conn,$role != "A"))
        {
            header("Location:accessdenied.php"); 

        } 
    ?>
    Reinstall Tables:
    <form action="install.php" method="POST">
        Include Test Data:
        <input type="radio" name="testdata" value="yes">Yes<br>
        <input type="radio" name="testdata" value="no">No<br>
        <input type="submit" value="reset tables">
    </form>
</body>