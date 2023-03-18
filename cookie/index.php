
<html>
<body>

<?php
if(isset($cookie_value)&& !empty($cookie_value)) {
    echo "user is".$cookie_value;
} else {
    echo "Cookies are not set";
}
?>
<form action="control.php" method='post'>
<input type='color' name='color'>
<input type='date' name='date'>
<input type='submit' value='submit'>
</form>

</body>
</html>