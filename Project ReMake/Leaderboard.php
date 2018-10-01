<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style_Admin.css">
    <title>LEADERBOARD</title>
</head>
<body id="leaderboard">
        
        <h1 style="text-align:center;"> LEADERBOARD</h1> <br />
        <table class="table">
        <tr>
            <th> Rank </th>
            <th> User </th>
            <th> Date </th>
            <th> Points </th>
            <th> Topic </th>
        </tr>
        
        <?php  
            include_once './Database.php';
            $rank = 1; 
            
            $query = "SELECT u.user as uuser, t.name, l.date, l.points  
                        FROM leaderboard l 
                        INNER JOIN topics t ON l.topic_id = t.id
                        INNER JOIN users u ON l.user_id = u.id
                        ORDER BY l.points DESC";
            $result = mysqli_query($link, $query);
               
            if (mysqli_num_rows($result)) 
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $User = $row['uuser'];
                    $Topic= $row['name'];
                    $Date = $row['date'];
                    $Points = $row['points']; 
                    
                    echo '  <tr>
                                <td class="row">
                                    '.$rank.' .
                                </td>
                                <td class="row">
                                  '.$User.' 
                                </td>
                                <td class="row">
                                  '.$Date.' 
                                </td>
                                <td class="row">
                                    '.$Points.'
                                </td>
                                <td class="row">
                                    '.$Topic.'
                                </td>
                            </tr> ';
                    $rank++;
                }
            }
            
            
        ?> 
        </table>
</body>
</html>