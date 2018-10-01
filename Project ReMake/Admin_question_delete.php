<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Delete Question</title>
</head>
<body>
    <h1 class ="centerh1"> 
       Do you want to erase this question : <br />
        <?php
            include_once './Database.php';
            $id = $_GET['id'];  
                
            $query = "SELECT content FROM questions WHERE id = $id";
            $result = mysqli_query($link, $query);
            
            $question = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) ==1) 
            {
                $question = $question['content'];
                echo $question;
            } 
        
            $query = "DELETE FROM questions WHERE id = $id ";
            mysqli_query($link, $query);
            $query = "DELETE FROM answers WHERE question_id = $id";
            mysqli_query($link, $query);
            
            echo '<br /><a href="Admin_Menu.php">da</a>';
        ?>
        
    </h1>
</body>
</html>