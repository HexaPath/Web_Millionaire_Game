<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>
        
        <?php
            include_once './Database.php';
            /*echo "<script>alert('You are deleting entire leaderboard. Are you sure you want to do this?')</script>";
            */

            $query = "DELETE FROM leaderboard";
            mysqli_query($link, $query);
            
             header("Location: Admin_Menu.php");
        ?>
    </h1>
</body>
</html>!-->