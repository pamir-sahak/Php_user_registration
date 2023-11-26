<?php include "config/database.php"; ?>
<?php
    
    $username = $email = $password = '';

    if(isset($_POST["submit"])){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);       
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        if(!empty($username) && !empty($email) && !empty($password)){
            $sql = "INSERT INTO user(username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        
            if(mysqli_query($connection, $sql)){
                 header("Location: login.html");
            }
        }
    }

   
?>

