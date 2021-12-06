<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        include_once("conn.php");

        function newUser($conn, $username, $surname, $forename, $password, $role)
        {
            $stmt = $conn->prepare("INSERT INTO TblUsers
            (UserID, Username, Surname, Forename, Password, Role)VALUES
            (null, :username, :surname, :forename, :password, :role)");

            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':surname',$surname);
            $stmt->bindParam(':forename',$forename);
            $stmt->bindParam(':password',$password);
            $stmt->bindParam(':role',$role);

            $stmt->execute();
            $stmt->closeCursor();
        }
        function newBook($conn, $title, $surname, $forename, $isavailable)
        {
            $stmt = $conn->prepare("INSERT INTO TblBooks
            (BookID, Title, AuthorSurname, AuthorForename, IsAvailable)VALUES
            (null, :title, :surname, :forename, :isavailable)");

            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':surname',$surname);
            $stmt->bindParam(':forename',$forename);
            $stmt->bindParam(':isavailable',$isavailable);

            $stmt->execute();
            $stmt->closeCursor();
        }
        function newLoan($conn, $userID, $bookID, $StartDate, $DueDate, $EndDate)
        {
            $stmt = $conn->prepare("INSERT INTO TblLoans
            (LoanID, UserID, BookID, StartDate, DueDate, EndDate)VALUES
            (null, :userid, :bookid, :startdate, :duedate, :enddate)");

            $start = strtotime($StartDate) + 3600; //I have no idea why, but adding an extra hour makes this work :/
            $due = strtotime($DueDate) + 3600;
            $end = strtotime($EndDate);

            if($end != null){
                $end = strtotime($EndDate) + 3600;
            }
            
            $stmt->bindParam(':userid',$userID);
            $stmt->bindParam(':bookid',$bookID);
            $stmt->bindParam(':startdate',$start);
            $stmt->bindParam(':duedate',$due);
            $stmt->bindParam(':enddate',$end);

            $stmt->execute();
            $stmt->closeCursor();
        }
        function getRole($conn, $username)
        {
            $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Username = :username;");
            $stmt->bindParam(':username',$_POST['Username']);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                return($row["Role"]);
            }
        }
    ?>
</body>