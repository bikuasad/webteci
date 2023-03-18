<?php include '../Layout/header.php' ?>
<!-- <?php include_once '../Controller/RegistrationAction.php' ?> -->


<?php 
$isvalidate = ""; 
$message = $error = "";
$nameErr = $usernameErr = $passwordErr = $cpasswordErr = $genderErr = $emailErr =  $phoneErr = $addressErr = ""; 
$name = $username = $password = $cpassword = $gender = $email =  $phone = $address = ""; 
 if(isset($_POST["submit"]))  
 {
     $isvalidate = true;  
      if(empty($_POST["name"]))  
      {  
          $nameErr = "Name is required";
          $isvalidate = false;
      }    else {
          $name = test_input($_POST["name"]);
     }
      if(empty($_POST["username"]))  
      {  
          $usernameErr = "User Name is required";
          $isvalidate = false;

      }   else {
          $username = test_input($_POST["username"]);
     }
      if(empty($_POST["password"]))  
      {  
           $passwordErr = "Password is required";
           $isvalidate = false;
      } else {
          $password = test_input($_POST["password"]);
     }
      if(empty($_POST["cpassword"]))  
      {  
           $cpasswordErr = "Password is required";
           $isvalidate = false;
      } else {
          $cpassword = test_input($_POST["cpassword"]);
     }
      
      if(empty($_POST["gender"]))  
      {  
           $genderErr = "Gender is required";
           $isvalidate = false;
      } else {
          $gender= test_input($_POST["gender"]);
     }
      if(empty($_POST["email"]))  
      {  
           $emailErr = "Email is required";
           $isvalidate = false;
      }  else {
          $email= test_input($_POST["email"]);
     }
      if(empty($_POST["phone"]))  
      {  
           $phoneErr = "Phone is required";
           $isvalidate = false;
      } else {
          $phone = test_input($_POST["phone"]);
     } 
      if(empty($_POST["address"]))  
      {  
           $addressErr = "Address is required";
           $isvalidate = false;
      } else {
          $address = test_input($_POST["address"]);
     } 
     
     $picName = $_POST["username"];
     $source = $_FILES['picture']['tmp_name'];
    // $dotPosition = strpos($fileName, '.');
     $ext = explode(".", $_FILES['picture']['name']);
     $ext = $ext[count($ext) - 1];
     $destination = '../Resources/ProPic/'. $picName . '.' . $ext;
     move_uploaded_file($source, $destination);
}

function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }


   if(file_exists('../Model/users.json') && $isvalidate)  
     {    
                $current_data = file_get_contents('../Model/users.json');  
                $array_data = json_decode($current_data, true);
                $extra = array(  
                     'name'        =>       $name,
                     'username'    =>       $username,
                     'password'    =>       $password, 
                     'cpassword'   =>       $cpassword, 
                     'gender'      =>       $gender, 
                     'e-mail'      =>       $email,
                     'phone'       =>       $phone,  
                     'address'     =>       $address,
                     'picture'     =>       $destination  

                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data, JSON_PRETTY_PRINT);  
                if(file_put_contents('../Model/users.json', $final_data))  
                {  
                     echo $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
 ?>  



<div>

<br>
<br>
<form method="POST" enctype="multipart/form-data" action="">
      <center>
      <fieldset style="width:600px; height: 390px;">
      <legend>REGISTRATION</legend>
                
                
      
    <div>
        <label>Name:</label>
        <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
    </div>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <div>
        <label>Username:</label>
        <input type="text" name="username">
        <span class="error">* <?php echo $usernameErr;?></span>
    </div>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <div>
        <label>Password:</label>
        <input type="password" name="password">
        <span class="error">* <?php echo $passwordErr;?></span>
    </div>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <div>
        <label>Confirm Password:</label>
        <input type="password" name="cpassword">
        <span class="error">* <?php echo $cpasswordErr;?></span>
    </div>
    
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <label for="gender">Gender:  </label>
    <input type="radio" name="gender" id="male" value="male">  
    <label for="gender">Male </label>
    <input type="radio" name="gender" id="female" value="female">
    <label for="gender">Female </label>
    <input type="radio" name="gender" id="other" value="other">
    <label for="gender">Other </label>
    <span class="error">* <?php echo $genderErr;?></span>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <div>
        <label>Email:</label>
        <input type="email" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
    </div>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <div>
        <label>Phone:</label>
        <input type="number" name="phone">
        <span class="error">* <?php echo $phoneErr;?></span>
    </div>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <div>
        <label>Address:</label>
        <input type="text" name="address">
        <span class="error">* <?php echo $addressErr;?></span>
    </div>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <div>
        <label>Image:</label>
        <input name="picture" type="file">
    </div>
    <tr>
       <td colspan="2"><hr></td> 
    </tr>
    <tr>
        <td><input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Reset"></td>
        <td> <a href="Login.php">I have an already Account</a></td>
    </tr>
    </fieldset>
    </center>

</form>
</div>
</div>
</div>
<?php include '../Layout/footer.php' ?>