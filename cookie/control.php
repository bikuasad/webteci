<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
    if(isset($_POST['color']) && !empty($_POST['color'])){

        $cookie_color=$_POST['color'];
        $cookie_date=$_POST['date'];

        echo $cookie_color;
          
        echo $cookie_date;
    // setcookie('user',$cookie_value, time() + 3600, '/');
    // setcookie("color", $cookie_color, $cookie_date);
    };

    if($_COOKIE){
       echo "coocki is set";
    }else{
        echo "coocki is unset";
    };

?>

<?php
if($_COOKIE){
?>

    <form action="deletecoocki.php" method="get">
        <button type="submit">Delect Coocki</button>
    </form>

<?php
}
?>

  
</body>
</html>
