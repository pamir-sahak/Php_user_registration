<?php include "config/database.php"; ?>
<?php include "index.php"; ?>

<?php
    
    $username = $password = '';

    if(isset($_POST["submit"])){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);       
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        try{
            $sql = "SELECT * FROM user WHERE username = '$username' or email = '$username'";
            $result = mysqli_query($connection, $sql);
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if(!$result == NULL){
                $hashedPassword = $result[0]['password'];
                if(password_verify($password, $hashedPassword)){
                    header("Location: welcome.html");
                }
            }
            else{
                $error = "User name or password is incorrect";
            }

            
            // if password or user name is incorrect
        }
        catch (Exception $e){
            $errormsg = $e->getMessage();
            $error = "User name or password is incorrect";

        }
    }

   
?>

