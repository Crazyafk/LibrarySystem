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
            if($e->getMessage() == "SQLSTATE[HY000] [1049] Unknown database 'librarydb'")
            {
                //--------------Create New Database---------------
                echo "create new db";

                //Create Connection
                $conn = new mysqli($servername, $username, $password);
                //Check Connection
                if($conn->connect_error){
                    die("Connection failed: ".$conn->connect_error);
                }

                //Create Database
                $sql = "CREATE DATABASE librarydb";
                if($conn->query($sql) === TRUE){
                    echo "Database created successfully";
                }else{
                    echo "Error creating database: ".$conn->error;
                }
            }
            else{echo "Connection failed: ".$e->getMessage();}
                }
    ?>
</body>