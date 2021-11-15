<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "librarydb";

        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            //set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully<br>";
        }
        catch(PDOException $e)
        {
            echo "Connection failed (Press F to pay respects) Error Msg: ".$e->getMessage();
        }
    ?>
</body>