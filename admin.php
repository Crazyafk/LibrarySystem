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
    ?>
    Reinstall Tables:
    <form action="install.php" method="POST">
        Include Test Data:
        <input type="radio" name="testdata" value="yes">Yes<br>
        <input type="radio" name="testdata" value="no">No<br>
        <input type="submit" value="reset tables">
    </form>
</body>