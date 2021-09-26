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
                $passWord = 'Asd,car21';
                $dbName= 'u265455877_khazifire';

                $conn = mysqli_connect($serverName,$userName,$passWord,$dbName);
                
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
                    $password = $_SESSION['password'];
                    
                    $role = 'Student';
                    $time = time();
                    $timestamp = date("Y-m-d H:i:s", $time);

//                     $sql1 = "CREATE TABLE IF NOT EXISTS UserDetails(
//                         registration_id INT AUTO_INCREMENT PRIMARY KEY,
//                         student_id VARCHAR(10) NOT NULL,
//                         first_name VARCHAR(30) NOT NULL,
//                         last_name VARCHAR(30) NOT NULL,
//                         gender VARCHAR(6) NOT NULL,
//                         email VARCHAR(30) NOT NULL,
//                         phone_number VARCHAR(15)
//                         ) AUTO_INCREMENT=1001 ";
//
//                     $sql2 = "CREATE TABLE IF NOT EXISTS UserAccounts(
                    //Acc_id int(5)
//                         registration_id INT AUTO_INCREMENT PRIMARY KEY,
//                         Acc_username VARCHAR(15) NOT NULL  ,
//                         Acc_password VARCHAR(40) NOT NULL,
//                         Acc_timestamp DATE NOT NULL,
//                         CONSTRAINT `fk_User_Details` FOREIGN KEY (registration_id)
//                         REFERENCES UserDetails(registration_id) ON DELETE CASCADE ON UPDATE CASCADE
//                     ) AUTO_INCREMENT=1001
//                     ";
//
//                     $sql3 = "CREATE TABLE IF NOT EXISTS UserRoles(
//                         registration_id INT AUTO_INCREMENT PRIMARY KEY ,
//                         Role_name VARCHAR(30) DEFAULT 'Student',
//                         Acc_username VARCHAR(15) NOT NULL,
//                         CONSTRAINT `fk_User_Accounts` FOREIGN KEY (registration_id)
//                         REFERENCES UserAccounts(registration_id) ON DELETE CASCADE ON UPDATE CASCADE
//                     ) AUTO_INCREMENT=1001";
  //student (with use this form)---- staff and faculty another form

//                    $sql1 = "INSERT INTO `u265455877_khazifire`.`UserDetails`(first_name, last_name, student_id,gender, email, phone_number)
//                             VALUES ('$first_name','$last_name','$student_id','$gender','$email', '$phone_number');";
//
//                    $sql2 = "INSERT INTO `u265455877_khazifire`.`UserAccounts`(Acc_username,Acc_password,Acc_timestamp)
//                             VALUES ('$username','$password','$timestamp')";
//
//                    $sql3 = "INSERT INTO `u265455877_khazifire`.`UserRoles`(Role_name,Acc_username)
//                             VALUES ('$role','$username')";
                    
                

                    $status = False;   //to check whether the script was executed without error
                    if(mysqli_query($conn,$sql1)){
                        $status = True;
                    } else{ 
                        $status = False;
                    }

                    if(mysqli_query($conn,$sql2) && $status==True){
                        $status = True;
                    } else{
                        $status = False;
                    }

                    if(mysqli_query($conn,$sql3) && $status==True){
                        echo "<h3> Congratulation <strong>{$first_name} {$last_name}</strong>, your registration was successful, a confirmation email will be sent to {$email}</h3>";
                    } else{
                        echo "<h3>Registration failed please <a href='index.php'>try again</a></h3>";

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



