<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        include_once("conn.php");
        
        $stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
        CREATE TABLE TblUsers
        (
        UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(20) NOT NULL,
        Surname VARCHAR(20) NOT NULL,
        Forename VARCHAR(20) NOT NULL,
        Password VARCHAR(20) NOT NULL,
        Role VARCHAR(1) NOT NULL
        )");

        $stmt->execute();
        $stmt->closeCursor();

        $stmt = $conn->prepare("DROP TABLE IF EXISTS TblBooks;
        CREATE TABLE TblBooks
        (
        BookID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Title VARCHAR(20) NOT NULL,
        AuthorSurname VARCHAR(20) NOT NULL,
        AuthorForename VARCHAR(20) NOT NULL,
        IsAvailable VARCHAR(1) NOT NULL
        )");

        $stmt->execute();
        $stmt->closeCursor();

        $stmt = $conn->prepare("DROP TABLE IF EXISTS TblLoans;
        CREATE TABLE TblLoans
        (
        LoanID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        UserID INT(4) NOT NULL,
        BookID INT(4) NOT NULL,
        StartDate DATE NOT NULL,
        DueDate DATE NOT NULL,
        EndDate DATE
        )");

        $stmt->execute();
        $stmt->closeCursor();

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
            $stmt = $conn->prepare("INSERT INTO TblUsers
            (BookID, Title, Surname, Forename, IsAvailable,)VALUES
            (null, :title, :surname, :forename, :isavailable)");

            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':surname',$surname);
            $stmt->bindParam(':forename',$forename);
            $stmt->bindParam(':isavailable',$isavailable);

            $stmt->execute();
            $stmt->closeCursor();
        }

        if($_POST["testdata"] == "yes"){

            newUser($conn, "tomato", "red", "blue", "password", "A");
            newUser($conn, "librarian", "aha", "haha", "anotherpassword", "L");
            newUser($conn, "bookshelf", "daddy", "leather", "ilikeweirdbooks", "M");

            newBook($conn, "")
        }
    ?>
</body>