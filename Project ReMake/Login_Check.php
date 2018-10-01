<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
   
   <?php
    include_once './Session.php';
    include_once './Database.php';
    
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    if (!empty($email) && !empty($pass)) {
        //pripravimo geslo
        $pass = sha1($salt.$pass);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
        
        
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) != 1) {
            //preusmeritev na login
                header("Location: Login_denied.php");
        }
        else {
            //vse je ok - naredi prijavo
            $user = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['user'];
            $_SESSION['restriction'] = $user['restriction_id'];
            
            
            //preusmeritev 
            if($_SESSION['restriction'] == 3)
            {
                header("Location: Admin_Menu.php");
            }
            elseif ($_SESSION['restriction'] == 2)
            {
                header("Location: Topic_Selection.php");
            }
            else
            {
                header("Location: Random.php");
            }
        }
    }
    else {
        //preusmeritev na login_denied
            header("Location: Login_denied.php");
    }
?>




</body>
</html>
!-->
