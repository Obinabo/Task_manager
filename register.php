
<?php 
$title = 'Register';
include('assets/config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $errors = array();

    if(!empty($_POST['name'])){
        $name = mysqli_real_escape_string($con, trim($_POST['name']));
    }else{ $errors[] = 'Please enter your full name';}

    if(!empty($_POST['email'])){
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
    }else{ $errors[] = 'Please enter your correct email address';}

    if(!empty($_POST['username'])){
        $username = mysqli_real_escape_string($con, trim($_POST['username']));
    }else{ $errors[] = 'Please enter your username';}

    if(!empty($_POST['password'])){
        if ($_POST['password'] != $_POST['password2']) {
            $errors[] = 'Please enter a matching Password';
        }
        $pass = mysqli_real_escape_string($con, trim($_POST['password']));
    }else{ $errors[] = 'Please enter your Password';}
    
        if(empty($errors)){
            $q = "INSERT INTO users (name, username, email, password, date) VALUES ($name, $username, $email, $password, NOW())";
            $r = mysqli_query($con, $q);
            if(mysqli_num_rows($r)==1){
                echo "Welcome $user";
            }else{
                echo "incorrect username or password";
            }
        }else {
            foreach ($errors as $error_msg) {
                echo $error_msg;
            }
        }
}

include('assets/includes/header.php')?>
<div class="reg-cont">

    <div class="register">
            <form method="POST" action="SELF">
                    <h1>Create a free account </h1>
                    <label for="username">Full Name</label>
                    <input type="text" name="name" placeholder="Name" required>
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" required>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required> <!--<i class="fa fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>-->
                    <label for="password">Re-enter Password</label>
                    <input type="password" name="password2" placeholder="Password" required>
                    <input type="submit" name="submit" value="Sign Up">
            </form>
            <p class="login-footer">Already have a Task Manager account? <a href="index.php">Login Now</a></p>
        </div>
</div>   
    <?php include('assets/includes/footer.php')?>