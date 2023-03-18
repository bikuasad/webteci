 
    <?php
    if (isset($_COOKIE)) {
        unset($_COOKIE['color']); 
        echo "coocki delete successfully";
    } else {
        return false;
    }

    ?>