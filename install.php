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
        Role TINYINT(1) NOT NULL
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
    ?>
</body>