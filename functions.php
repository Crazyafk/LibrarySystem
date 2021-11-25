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

            $start = strtotime($StartDate);
            $due = strtotime($DueDate);
            $end = strtotime($EndDate);

            echo gmdate("F j, Y, g:i a", $start);
            echo ("<br>");

            $stmt->bindParam(':userid',$userID);
            $stmt->bindParam(':bookid',$bookID);
            $stmt->bindParam(':startdate',$start);
            $stmt->bindParam(':duedate',$due);
            $stmt->bindParam(':enddate',$end);

            $stmt->execute();
            $stmt->closeCursor();
        }
    ?>
</body>