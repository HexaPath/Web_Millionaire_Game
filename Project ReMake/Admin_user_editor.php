<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style_Admin.css">
    <title>Document</title>
</head>
<body class="watawhat">
    <h1 id="whatisdas"> User Editor</h1> <br />
        <table class="table">
        <tr>
            <th> Rank </th>
            
            <th> Username </th>
            <th> Restriction </th>
            <th> Action </th>
            <th> ID </th>  
        </tr>
        
        <?php
            include_once './Session.php';
            include_once './Database.php';
            $rank = 1;
            $query = "SELECT u.user, u.id, r.name FROM users u INNER JOIN restricted_access r ON u.restriction_id = r.id;";
            $result = mysqli_query($link, $query);
               
            if (mysqli_num_rows($result)) 
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $username = $row['user'];
                    $id = $row['id'];
                    $restriction = $row['name'];
                    
                    echo '  <tr>
                            <td class="row">['.$rank.']</td>
                            
                            <td class="row">
                                  '.$username.' 
                            </td>
                            <td class="row">
                                  '.$restriction.' 
                            </td>
                            <td>
                                    <a class="Actionbtn" href="Admin_user_edit.php?id='.$id.'">EDIT</a>
                                    <a class="Actionbtn" href="Admin_user_delete.php?id='.$id.'">DELETE</a>  
                            </td>
                            <td class="row">['.$id.']</td>
                            </tr> ';
                    $rank++;
                }
            }
        
        ?>
        </table>
</body>
</html>