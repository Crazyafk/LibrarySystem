<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        include_once("conn.php");
        
        //Create Tables

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
        StartDate INT(10) NOT NULL,
        DueDate INT(10) NOT NULL,
        EndDate INT(10)
        )");

        $stmt->execute();
        $stmt->closeCursor();

        if($_POST["testdata"] == "yes"){

            include_once("functions.php");

            newUser($conn, "tomato", "red", "blue", "password", "A");
            newUser($conn, "librarian", "aha", "haha", "anotherpassword", "L");
            newUser($conn, "bookshelf", "daddy", "leather", "ilikeweirdbooks", "M");

            newBook($conn, "lorem ipsum", "know", "i do not", "Y");
            newBook($conn, "survive this", "dudafa", "waripamo-owei", "N");

            newLoan($conn, 2, 1, "2021-11-27", "+3 months", null);
            newLoan($conn, 0, 0, "2021-11-24", "Today", "Today");
        }
    ?>
</body>