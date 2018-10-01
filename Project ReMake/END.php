<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style_S3.css">
    <title>END</title>
</head>
<body>
    <div class="endwrapper">
        <div class="text">
            <?php 
                include_once './Session.php';
                include_once './Database.php';
                    $array = array();
                    $award = array("0","75$", "125$", "250$", "500$", "1000$", "1250$", "1500$", "2000$", "5000$", "10000$", "12500$", "15000$","25000$ ","50000$", "100000$");
                    $cahs = 0; 
                    $topic_id = 1;
                        if(!isset($score))
                        {
                            $score = 0;
                        }
                        if(isset($_SESSION['topic_id']))
                        {
                           $topic_id = $_SESSION['topic_id']; 
                        }
                        if(isset($_SESSION['user_id']))
                        { 
                           $user_id = $_SESSION['user_id'];
                        }
                        if(isset($_SESSION['score']))
                        {
                            $score = $_SESSION['score'];
                            $_SESSION['score'] = 0;
                        }
                        if(isset($_SESSION['bol']))
                        {
                            $value = $_SESSION['bol'];
                        }
                        if(isset($_SESSION['username']))
                        {
                            $user = $_SESSION['username'];
                            if(isset($_SESSION['restriction']))
                            {
                                $r_lvl = $_SESSION['restriction'];
                            }
                        }
                        if(isset($_SESSION['random']))
                        {
                            $cnt = 0;
                            foreach ($_SESSION['Random'] as $key => $value )
                            {
                                $randarr[$cnt] = $value;
                                $cnt++;
                            }
                            unset($_SESSION['Random']);
                        }
                        
                        $cash = $award[$score];
                        if($score == 14)
                        {
                            $cash = "100000$";
                            if(isset($user_id))
                            {  
                                $query = "INSERT INTO leaderboard (user_id,topic_id,points) VALUES ('$user_id','$topic_id','$cash')"; 
                                mysqli_query($link, $query);
                                if($r_lvl == '1')
                                {
                                    $query = "UPDATE users SET Restriction_id = '2' WHERE id = $user_id";
                                    mysqli_query($link, $query);
                                }
                                
                            }
                            else
                            {
                                $user = "Guest";
                            }  
                            $_SESSION['points'] = $cash;
                            echo "$user , You won <br/>";
                            echo "You corectly answered all questions ! <br/>";
                            echo "Your award is : $cash <br/>";   
                        }
                        else
                        {   
                            if(isset($user_id))
                            {
                                $query = "INSERT INTO leaderboard (user_id,topic_id,points) VALUES ('$user_id','$topic_id','$cash')"; 
                                mysqli_query($link, $query);
                            }
                            else 
                            {
                                $user = "Guest";
                            } 
                            echo "$user , You lost ): <br /> ";
                            echo "Your score is : $cash <br/>";
                            $_SESSION['points'] = $cash;       
                        } 
                ?> 
            
        </div> 
        
                <div class="buttons">
                    <a class="btn" href="Leaderboard.php">Leaderboard</a>
                    <a href="Topic_Selection.php" class="btn">Play again</a>   
                    <a href="Index.php" class="btn">Home</a>    
                </div>
                </div>
</body>
</html>