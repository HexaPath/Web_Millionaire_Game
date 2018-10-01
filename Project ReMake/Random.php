<!-- 
!-->
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
    
        $q_id_array = array();
        $cnt = 0;
        if(isset($_GET['id']))
        {
            $topic = $_GET['id'];
        }
        elseif(isset($_SESSION['topic']))
        {
            $topic = $_SESSION['topic'];
        }
        else
        {
            $topic = 1;
        }
        $_SESSION['topic'] = $topic; 
    
        $query = "SELECT id FROM questions WHERE topic_id = '$topic'";
        $result = mysqli_query($link, $query);
    
            while ($topic = mysqli_fetch_array($result))
            {  
                $q_id_array[$cnt] = $topic['id'];
                $cnt++;
            }

        shuffle($q_id_array);
        $_SESSION['Random'] = $q_id_array;

        header("Location: Game.php");
    ?>
</body>
</html> 