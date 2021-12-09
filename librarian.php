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
        if($role != "A" && $role != "L")
        {
            header("Location:accessdenied.php"); 
        } 
    ?>
    Librarian Page or something
</body>