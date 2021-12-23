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
    ?>
    Enter Book ID OR Title OR Surname OR Forename Exactly: This search isn't very sophisticated.<br>Or Leave blank to list all books
    <form action="search.php" method="POST">
        <input type="text" name="searchterm"><br>
        <input type="submit" value="Search!">
    </form>

    Books you need to return soonish please:
    <form action="return.php" method="POST">
    <?php
        $userID = getUserID($conn,$_SESSION['name']);

        $stmt = $conn->prepare("SELECT * FROM TblLoans INNER JOIN TblBooks ON TblLoans.BookID = TblBooks.BookID WHERE UserID = :userID AND EndDate = 0");
        $stmt->bindParam(":userID",$userID);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo($row["BookID"].": ".$row["Title"]." By ".$row["AuthorForename"]." ".$row["AuthorSurname"]."<input type='radio' name='loanID' value='".$row["LoanID"]."'><br>");
        }
    ?>
    <input type="submit" value="Return">
</body>