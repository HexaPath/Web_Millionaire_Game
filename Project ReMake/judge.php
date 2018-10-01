<!--


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>
    
    <?php
        include_once './Session.php';
        include_once './Database.php';
        $id = $_POST['ans'];
        
         $query = "SELECT id, tru FROM answers WHERE id ='$id'";
            $result = mysqli_query($link, $query);
            $fetchboi = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) == 1) 
            {
                $id = $fetchboi['id'];
                $value = $fetchboi['tru'];
            }
        if($value == 1 && $_SESSION['score'] <14)
        {
            $score = $_SESSION['score'];
            $score++ ;
            $_SESSION['score'] = $score;
            
            header("Location: Game.php");
        }
        else 
        {
            $_SESSION['chosenone'] = $value;
            header("Location: END.php");
        }
    ?>
    
    
    </h1>
</body>
</html>
!-->