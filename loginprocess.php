<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        include_once("conn.php");
        array_map("htmlspecialchars",$_POST);

        $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Username = :username;");
        $stmt->bindParam(':username',$_POST['Username']);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if($row['Password']==$_POST['Pword']){
                header('Location: index.php');
            }else{
                header('Location: login.php');
            }
        }
        $conn = null;
    ?>
</body>