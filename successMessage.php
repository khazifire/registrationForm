<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/main.css" rel="stylesheet" media="all">
    <title>Registration Status</title>
</head>
<body>

<?php include 'header.php'; ?>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body" style="text-align: center">
                <h2 class="title" >Congratulation</h2>
                
                <?php
                $serverName = 'localhost';
                $userName = 'u265455877_khazifire';
                $password = 'Asd,car21';
                $dbName= 'u265455877_khazifire';

                $conn = mysqli_connect($serverName,$userName,$password,$dbName);
                
                if(!$conn){ 
                    die("Connection Failed: ".mysqli_connect_error());
                }else{

                    $first_name = $_SESSION['first_name'];
                    $last_name = $_SESSION['last_name'];
                    $student_id = $_SESSION['student_id']; 
                    $email = $_SESSION['email']; 
                    $gender = $_SESSION['gender'];
                    $phone_number = $_SESSION['phone_number'];
                    $username = $_SESSION['username'];

//                     $sql1 = "CREATE TABLE IF NOT EXISTS UserDetails(
//                         student_id VARCHAR(10) PRIMARY KEY,
//                         first_name VARCHAR(30),
//                         last_name VARCHAR(30),
//                         gender VARCHAR(6),
//                         email VARCHAR(30),
//                         phone_number VARCHAR(15)
//
//                         )";
//
//                     $sql2 = "CREATE TABLE IF NOT EXISTS UserAccounts(
//                         student_id VARCHAR(10) PRIMARY KEY,
//                         username VARCHAR(30),
//                         CONSTRAINT `fk_User_Details` FOREIGN KEY (student_id) REFERENCES UserDetails(student_id) ON DELETE CASCADE
//                     )";

                    $sql1 = "INSERT INTO `u265455877_khazifire`.`UserDetails`(first_name, last_name, student_id,gender, email, phone_number) 
                    VALUES ('$first_name','$last_name','$student_id','$gender','$email', '$phone_number');";
                    $sql2 = "INSERT INTO `u265455877_khazifire`.`UserAccounts`(username,student_id) VALUES ('$username','$student_id')";
                   
                    $status = False;
                    if(mysqli_query($conn,$sql1)){ $status = True;
                    } else{ $status = False;}

                    if( $status && mysqli_query($conn,$sql2)){
                        echo "<h3> Congratulation <strong>{$first_name}</strong>, your registration was successful, a confirmation email will be sent to {$email}</h3>";
                    } else{
                        echo "<h3>Registration failed please try again {$email}</h3>" .mysqli_error($conn);
                    }
                }
                mysqli_close($conn);  


                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
<style>h3 {font-size: medium;}</style>
</html>



