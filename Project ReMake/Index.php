<!DOCTYPE html>
<html lang="sl">    
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="Style_S0.css">
</head>    
<body>
    <?php
        session_start();
        session_destroy();
    ?>
    <div class="center_wrapper">
        
        <h1 >Do you want to be a Millionaire ?</h1>
        
        <div id="inline">
            <a href="Login.html" class="S0_Goto" id="S0_Goto_Login" >
            <h2> Login</h2>
        </a>
        
        <a href="Register.html" class="S0_Goto" id="S0_Goto_Register">
            <h2> Register</h2>
        </a>
        </div>
        
        <div id="row"> 
            <a href="Random.php" class="S0_Goto" id="S0_Goto_Game">
            <h2> Start As Guest</h2>
            </a>
        </div>
        
    </div>
    
</body>
</html>