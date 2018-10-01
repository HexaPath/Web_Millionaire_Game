<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style_Admin.css">
    <title>Edit Question</title>
</head>
<body id="usereditbody">
   <div id="editQ">
       <h1> USER EDITOR</h1>
        <h2>     <br/>
            <?php 
            include_once './Database.php';
            
            $id = (int) $_GET['id'];   
            $query = "SELECT id, user, email, restriction_id FROM users WHERE id = $id";
            $result = mysqli_query($link, $query); 
            $user = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) ==1) 
            {
                $id = $user['id'];
                $username = $user['user'];
                $email = $user['email'];
                $rlvl = $user['restriction_id'];
            }
        
            
            echo '
            <form action="Admin_update.php" method="post" id="editQform">
                    <input type="hidden" name="prevsite" value="user_edit"/>
                    <input type="hidden" name="user_id" value="'.$id.'"/>
                    <input type="text" name="username" value="'.$username.'" placeholder="'.$username.'"/>
                    <input type="email" name="email" value="'.$email.'" />
                    Restriction lvl is now : '.$rlvl.' <br/>
                    
                Restriction :<select name="restriction_lvl" style="width: 100px;">
                                    <option value="1">User</option>
                                    <option value="2">Super User</option>
                                    <option value="3">Administrator</option>
                                </select> 
            
            <input type="submit" value="Shrani" class="submitbtn" />
            <a href="Admin_Menu.php" class="backbtn">Back to Admin Menu</a>
            </form>';
            ?>
            
    </h2>
    
    </div>
</body>
</html>