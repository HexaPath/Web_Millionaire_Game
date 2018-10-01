<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Stage_1</title>
    <link rel="stylesheet" href="Style_S1.css">
</head>
<body>
    
    <form id="form" action="login_check.php" method="post">
        <h1 class="whatahell">LOGIN </h1>
    <div class="screwthis">
       
        <input type="email" name="email" class="input" id="email" placeholder="Email address" required="required"/>
    
        <p>
        <input type="password" name="password" class="input" id="password" placeholder="Password" required="required" />
        </p>
    
        <p >
        <input type="submit" name="Login" value="Login" id="Login_Button">
        </p>
    
        <a href="Register.html" id="gotoRegister">še nisi registriran ?
        </a>
        
        <?php
        echo "<script>alert('User does not exist! Try to register')</script>";
        ?>
        
    </div>        
    </form> 
</body>
</html>