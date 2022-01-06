<!DOCTYPE HTML>
<head>
    <title>Hell's Library</title>
</head>
<body>
    <?php
        #options: localhost, fdb34.awardspace.net
        $servername = "fdb34.awardspace.net";

        if($servername == "localhost"){
            $db_username = "root";
            $db_password = "";
            $dbname = "librarydb";

            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);

                //set PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        }else{
            $db_username = "4013132_librarysystem";
            $db_password = "KtkbW2N5yRJWeq@";
            $dbname = "4013132_librarysystem";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);

            //set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    ?>
</body>