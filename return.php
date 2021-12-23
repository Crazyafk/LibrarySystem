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

        $currtime = strtotime("now");
        $stmt = $conn->prepare("UPDATE TblLoans SET EndDate = :endDate WHERE LoanID = :loanID");
        $stmt->bindParam(":endDate",$currtime);
        $stmt->bindParam(":loanID",$_POST['loanID']);
        $stmt->execute();

        updateAvailability($conn, getBookInLoan($conn, $_POST['loanID']));
    ?>
</body>