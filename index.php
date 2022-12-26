<?php
    include('assets/config/config.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $errors = array();
            if(!empty($_POST['email'])){
            $email = mysqli_real_escape_string($con, trim($_POST['email']));
            }else{ $errors[] = 'Please enter your correct email address';}

            if(!empty($_POST['password'])){
            $pass = mysqli_real_escape_string($con, trim($_POST['password']));
            }else{ $errors[] = 'Please enter your Password';}
            
                if(!empty($errors)){
                    $q = "SELECT * FROM users WHERE email=$email AND pass=sha1($pass)";
                    $r = mysqli_query($con, $q);
                    if(mysqli_num_rows($r)==1){
                        echo "Welcome $user";
                    }else{
                        echo "incorrect username or password";
                        
                    }
                }
        }
 include('assets/includes/header.php')
?>

    <div class="login">
        <form method="POST" action="SELF">
                <h1>Log in to your account </h1>
                <label for="email">Email Address</label>
                <input type="email" name="email" placeholder="Email Address" required>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required><!--<i class="fa fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>-->
                <input type="submit" name="submit" value="Log In">
        </form>
        <p class="login-footer">New to Task Manager? <a href="register.php">Sign Up Now</a></p>
    </div>
<?php include('assets/includes/footer.php')?>
