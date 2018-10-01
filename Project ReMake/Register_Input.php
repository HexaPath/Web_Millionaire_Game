<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
    <?php
include_once './Session.php';
include_once './Database.php';

$username = $_POST['username'];
$email = $_POST['email'];
$pass1 = $_POST['password_1'];
$pass2 = $_POST['password_2'];

//preverim. če je uporabnik pravilno izpolnil obrazec
if (!empty($username) && !empty($email)
        && !empty($pass1) && ($pass1==$pass2)) {
    //vse ok
    $pass = $salt.$pass1;
    $pass = sha1($pass);
    
    /*echo $username;
    echo $pass;
    echo $email;*/
    
    $query = "INSERT INTO users(user,password,email,restriction_id) "
            . "VALUES ('$username','$pass','$email', '1')";
    //echo $query;
    mysqli_query($link, $query);
    
}
else {
    //preusmeritev nazaj
    header("Location: Register.html");
    echo "not working";
}

header("Location: Login.html");
    echo "working";
?>

</body>
</html>

!-->

