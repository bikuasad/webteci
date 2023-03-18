<?php include '../Layout/header.php' ?>
<!-- <?php include_once '../Controller/LoginAction.php' ?> -->


<?php 
$isvalidate = ""; 
$message = $error = "";
$usernameErr = $passwordErr = ""; 
$uname = $pass = ""; 
 if(isset($_POST["submit"]))  
 {
     $isvalidate = true;
      if(empty($_POST["username"]))  
      {  
          $usernameErr = "User Name is required";
          $isvalidate = false;

      }   else {
          $uname = test_input($_POST["username"]);
     }
      if(empty($_POST["password"]))  
      {  
           $passwordErr = "Password is required";
           $isvalidate = false;
      } else {
          $pass = test_input($_POST["password"]);
     }
    }


function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }

            $stored_users = json_decode(file_get_contents("../Model/users.json"), true);

        foreach ($stored_users as $user) {
            if($user['username'] == $uname){
                if(($pass == $user['password'])){
                    session_start();
                    $_SESSION['user'] = $uname;
                    header("location: ../View/Dashboard.php"); exit();
                }
                
            }
            else {
                echo "Wrong username or password";
            }
        }

?>



<div class="single">
<style>
.error {color: #FF0000;}
</style>
        <form method="post" action="">  

        <br><br>
        <br><br>
        <br><br>
            
            
            <fieldset align="left" style="width:320px;height: 170px;">
                
                <legend><b>LOGIN</b></legend>
                <div style="padding:5px;">
                    User Name: <input type="text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
                    <span class="error">* <?php echo $usernameErr;?></span>
                </div>
                
                <div style="padding:5px;">
                    Password  :&nbsp;&nbsp; <input type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
                    <span class="error">* <?php echo $passwordErr;?></span>
                </div>
                
                <hr>
                
                <input type="checkbox" name="remember" value="1">Remember Me
                
                <div style="padding:5px;">
                    <input type="submit" name="submit" value="Submit">
                    <td> <a href="Registration.php">I Don't have any Account</a></td><br>
                    <center>
                    <td> <a href="ForgotPass.php">Forgot Password</a></td>
</center>
                    
                </div>
            </fieldset>
            
        </form>
        
    </div>

<?php include '../Layout/footer.php' ?>