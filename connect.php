<?php


 $servername = 'khazifire.com';
 $username = 'u265455877_khazifire';
 $password = 'Asd,car21';

//Starting a connection

//$servername = 'localhost';
//$username = 'root';
//$password = '';
$conn = mysqli_connect($servername,$username,$password);

if(!$conn){ //check if connection is working
    die("Connection Failed: ".mysqli_connect_error());
}else{
    echo "Connection Successful...<br> ";
    echo "Creating Database...";
    $sql = "CREATE DATABASE IF NOT EXISTS WebAppsReg;"; //db creation
    if(mysqli_query($conn,$sql)){
        echo "Database has been created...";
    } else{
        echo "Creation of Database failed:" .mysqli_error($conn);
    }
}
mysqli_close($conn);  //closing the connection


//$dbName= 'WebAppsReg';
//$conn = mysqli_connect($servername,$username,$password,$dbName);
//
//if(!$conn){ //check if connection is working
//    die("Connection Failed: ".mysqli_connect_error());
//}else{
//    echo "Creating Tables...";
//    $sql = "
//        CREATE TABLE IF NOT EXISTS UserDetails (
//        reg_id INT(6) AUTO_INCREMENT PRIMARY KEY,
//        first_name VARCHAR(30),
//        last_name VARCHAR(30),
//        student_id VARCHAR(10),
//        gender VARCHAR(6),
//        email VARCHAR(30),
//        phone_number VARCHAR(12),
//    )";
//
//    $sql2 = "INSERT INTO RegForm (first_name, last_name, student_id,gender, email, phone_number)
//    VALUES ('John', 'Doe', 'john@example.com')";
//    if(mysqli_query($conn,$sql)){
//        echo "Table has been created...";
//    } else{
//        echo "Creation of Table failed:" .mysqli_error($conn);
//    }
//}
//mysqli_close($conn);  //closing the connection