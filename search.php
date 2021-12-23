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
        //PREP
        session_start();  
        if (!isset($_SESSION['name'])) 
        {    
            header("Location:login.php"); 
        } 

        include_once("functions.php");

        echoNavbar($conn);

        $stmt = $conn->prepare("SELECT * FROM TblBooks WHERE BookID = :searchterm OR Title = :searchterm OR AuthorSurname = :searchterm OR AuthorForename = :searchterm");
        $stmt->bindParam(":searchterm",$_POST["searchterm"]);
        $stmt->execute();

        $unavailable = array();

        Available Books Matching Search:
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if($row["IsAvailable"] == "Y")
            {
                echo($row["BookID"].": ".$row["Title"]." By ".$row["AuthorForename"]." ".$row["AuthorSurname"]);
            }else{
                array_push($unavailable, $row);
            }
        }

        Unavailable Books Matching Search:
        foreach($unavailable as $row)
        {
            echo($row["BookID"].": ".$row["Title"]." By ".$row["AuthorForename"]." ".$row["AuthorSurname"]);
        }
    ?>

</body>