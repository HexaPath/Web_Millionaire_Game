<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style_Admin.css">
    <title>Document</title>
</head>
<body class="watahell">
    
        <h1 id="watisdas"> Question Editor</h1> <br />
        <table class="table">
        <tr>
            <th>  Rank </th>
            <th> Content </th>
            <th> Topic </th>
            <th> Action </th>
            <th> ID </th>
        </tr>
        
        <?php
            include_once './Session.php';
            include_once './Database.php';
            $rank = 1;
            $query = "SELECT q.content, q.id, t.name  FROM questions q INNER JOIN topics t ON q.topic_id = t.id;";
            $result = mysqli_query($link, $query);
               
            if (mysqli_num_rows($result)) 
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $content = $row['content'];
                    $id = $row['id'];
                    $topic = $row['name'];
                    
                    echo '  <tr>
                            <td class="row">['.$rank.']</td>
                            
                            <td class="row">
                                  '.$content.' 
                            </td>
                            <td class="row">
                                  '.$topic.' 
                            </td>
                            <td>    
                                    <a class="Actionbtn" href="Admin_question_edit.php?id='.$id.'">EDIT</a>
                                    <a class="Actionbtn" href="Admin_question_delete.php?id='.$id.'">DELETE</a>  
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