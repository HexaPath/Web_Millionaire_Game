<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Delete Question</title>
</head>
<body>
    <h1 class ="centerh1"> 
       Do you want to erase this user : <br />
        <?php
            include_once './Database.php';
            $id = $_GET['id'];  
                
            $query = "SELECT user FROM users WHERE id = $id";
            $result = mysqli_query($link, $query);
            
            $user = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) ==1) 
            {
                $user = $user['user'];
                echo $user;
            } 
        
            $query = "DELETE FROM users WHERE id = $id ";
            mysqli_query($link, $query);
        
            echo '<br /><a href="Admin_Menu.php">da</a>';
        ?>
        
    </h1>
</body>
</html>