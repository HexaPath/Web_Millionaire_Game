<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>ADD USER</title>
    <link rel="stylesheet" href="Style_Admin.css">
</head>
<body>    
        

    <form id="form_1" action="Register_input.php" method="post"> 
       <h1 style="color: white; text-align: center;"> Add User</h1>
        <div class="screwthis_2">
          
        <input type="hidden" name="prevsite" value="user_add"/>
        <input type="text" name="username" class="input" id="username" placeholder="Username" required="required"/>
    
        <p >
        <input type="email" name="email" class="input" id="email" placeholder="Email address" required="required"/>
        </p>
    
        <p >
        <input type="password" name="password" class="input" id="password" placeholder="Password" required="required" />
        </p>
        
        
        <span style="color: white; text-align: center;">Restriction :</span>
                                   <select name="restriction_lvl" style="margin-left: 55px; width: 100px;">
                                        <option value="1">User</option>
                                        <option value="2">Super User</option>
                                        <option value="3">Administrator</option>
                                    </select> 
        <p >
        <input type="submit" name="Register" value="Register" id="Login_Button">
        </p> 
        </div>        
    </form> 
</body>
</html>