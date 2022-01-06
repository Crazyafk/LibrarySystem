<?php
        include_once("conn.php");
        session_start(); 
        array_map("htmlspecialchars",$_POST);

        $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Username = :username;");
        $stmt->bindParam(':username',$_POST['Username']);
        $stmt->execute();

        $userexistsflag = false;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $pass = $row['Password'];
            $attempt = $_POST['Pword'];
            
            if($pass == $attempt){
                $userexistsflag = true;
                $_SESSION['name']=$row["Username"]; 
                header('Location: index.php');
            }else{
                $userexistsflag = true;
                $_SESSION["loginfailurereason"] = "Incorrect Password";
                header('Location: login.php');
            }
        }

        if($userexistsflag == false){
            $_SESSION["loginfailurereason"] = "User does not Exist";
            header('Location: login.php');
        }
        $conn = null;
?>
