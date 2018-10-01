<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style_S0.css">
    <title>LEADERBOARD</title>
</head>
<body id="topic">
        
        <h1 style="text-align:center;"> Topic Selection</h1> <br />
        <table class="table">
        <tr id="topicbtn">
            <th> Rank </th>
            <th> Topic </th>
        </tr>
        
        <?php  
            include_once './Database.php';
            include_once './Session.php';
            $rank = 1; 
            if (!isset($_SESSION['restriction'] ))
                                                {
                                                    $_SESSION['topic'] = 1;
                                                    header("Location:Random.php");
                                                }
            if(isset($_SESSION['restriction']))
                                            {
                                                    $r_lvl = $_SESSION['restriction'];
                                                    if($_SESSION['restriction'] == '1')
                                                    {   
                                                    $_SESSION['topic'] = 1;
                                                    header("Location:Random.php");
                                                    }
                                                    elseif($_SESSION['restriction'] == '2' || $_SESSION['restriction'] == '3')
                                                    {
                                                    $query = "SELECT name, id  FROM topics ORDER BY id ASC";
                                                    $result = mysqli_query($link, $query);
               
            if (mysqli_num_rows($result)) 
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $name = $row['name'];
                    $id = $row['id'];
                    
                    echo '  <tr>
                                <td class="row">
                                    '.$rank.' .
                                </td>
                                <td class="row">
                                    <a href="Random.php?id='.$id.'" id="topicbtn">'.$name.'</a>
                                </td>
                            </tr> ';
                    $rank++;
                }
            }
            
                                                }
                                            }
                                        
            
            
            
        ?> 
        </table>    
</body>
</html>