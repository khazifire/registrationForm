
<?php
//checking if form is empty
session_start();
$errors = array();
$first_name = $last_name =$student_id =$email =$gender= $phone_number= $username =$password= $password1= "";

if($_SERVER['REQUEST_METHOD'] == "POST" ) {
    if (empty($_POST['first_name'])) { $errors["first_name"]="First name is required!";}
        else{ $first_name = cleanup($_POST['first_name']); }

    if (empty($_POST['last_name'])) { $errors["last_name"]="Last name is required!";}
        else{ $last_name = cleanup($_POST['last_name']); }

    if (empty($_POST['student_id'])) { $errors["student_id"]="Student ID number is required!";}
        else{ $student_id = cleanup($_POST['student_id']); }

    if (empty($_POST['email'])) {$errors["email"]="Email is required!";}
        else{ $email = cleanup($_POST['email']); }

    if (empty($_POST['gender'])) {$errors["gender"]="Gender is required!";}
        else{ $gender = cleanup($_POST['gender']); }
 
    if (!empty($_POST['phone_number'])){ $phone_number = cleanup($_POST['phone_number']); }

    if (empty($_POST['username'])) {$errors["username"]="Username is required!";}
        else{ $username = cleanup($_POST['username']); }

    if (empty($_POST['password'])) {$errors["password"]="Password is required!";}
    if  (password_valid($_POST['password']) !="long"){
        $errors["password_length"] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
    }else{$password = cleanup($_POST['password']);}

    if (empty($_POST['password1'])) {$errors["password1"]="Please confirm your password";
    }else{$password1 = cleanup($_POST['password1']);}
}

if ($first_name && $last_name && $student_id && $email && $gender && $phone_number && $username && $password && $password1){  
    if (confirmPass($password, $password1) !="correct"){
        $errors["password1"]="Password not matching, please confirm password";
    }else{
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['student_id'] =$student_id; 
        $_SESSION['email'] =$email; 
        $_SESSION['gender'] =$gender;
        $_SESSION['phone_number'] = $phone_number;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = sha1($password);   //to hash the password
        header("Location: processForm.php");
        exit;
    }
}
function confirmPass($pass1, $pass2){
    if ($pass1 == $pass2){ return 'correct';
    }else{return 'incorrect';}
}
function cleanup($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function password_valid($password) {
    $pass = cleanup($password);
    $number = preg_match('@[0-9]@', $pass);
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $specialChars = preg_match('@[^\w]@', $pass);

    if(strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        return "short";
    } else {
        return "long";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registration Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>




<body>
<?php include 'header.php'; ?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                    <fieldset>
                        <legend>User Details</legend>
                   
                        <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <label class="label" >First name <span class="required-sign" style='color: red;'>*</span></label>
                                    <input class="input--style-4" type="text" name="first_name" value="<?php echo $first_name?>">

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" >Last name <span class="required-sign" style='color: red;'>*</span></label>
                                    <input class="input--style-4" type="text" name="last_name" value="<?php echo $last_name?>"  >
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Student ID# <span class="required-sign" style='color: red;'>*</span></label>
                                        <input class="input--style-4" type="number" name="student_id" value="<?php echo $student_id?>" >


                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender <span class="required-sign" style='color: red;'>*</span></label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio"  name="gender" value="male" <?php if($gender=='male') {echo 'checked';} ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female" <?php if($gender=='female') {echo 'checked';} ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email <span class="required-sign" style='color: red;'>*</span></label>
                                    <input class="input--style-4" type="email" name="email" value="<?php echo $email?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number (optional)</label>
                                    <input class="input--style-4" type="text" name="phone_number" value ="<?php echo $phone_number ?>">
                                </div>
                            </div>
                        </div>

                    </fieldset>
                        

                    <fieldset>
                        <legend>Account Details</legend>

                        <div class="col-1">
                                <div class="input-group">
                                    <label class="label" >Username <span class="required-sign" style='color: red;'>*</span></label>
                                    <input class="input--style-4" type="text" name="username" value="<?php echo $username?>" >
                                    
                                   
                                </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" >Password <span class="required-sign" style='color: red;'>*</span></label>
                                    <input class="input--style-4" type="password" name="password">

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" >Confirm Password <span class="required-sign" style='color: red;'>*</span></label>
                                    <input class="input--style-4" type="password" name="password1"   >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                        
                
                        <?php
                            if (!empty($errors)){
                                if(count($errors)>=3){
                                    echo "<div class='error-message' style='color: red;'> ** All fields should be completed </div>";
                                }else{
                                    foreach ($errors as $error) {
                                        echo "<div class='error-message' style='color: red;'> * $error</div>";
                                    }
                                }}
                        ?>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>

<!--     Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
<!--     Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
<!--     Main JS-->
    <script src="js/global.js"></script>

</body>

</html>

