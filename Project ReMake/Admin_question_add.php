<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style_Admin.css">
    <title>Edit Question</title>
</head>
<body id="questinedit">
   <div id="editQ">
       <h1></h1>
        <h2 id="h2centeralignment">     <br/>
            <?php 
            include_once './Database.php';
            
            $query = "SELECT id FROM questions ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($link, $query);
            $question = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) ==1) 
            {
                $q_id = $question['id'];
            }
            $q_id++;
            echo '
            <form action="Admin_update.php" method="post" id="editQform">
                    <input type="hidden" name="prevsite" value="add"/>
                    <input type="hidden" name="Q_id" value="'.$q_id.'"/>
                    
                Q): <textarea name="Question" class="textarea"></textarea>
                    <br />
                    
                A): <textarea name="AnswerA" class="textarea"> </textarea>
                    <input type="checkbox" name="true_a" value="1" class="truradio">
                    <br />
                    
                B): <textarea name="AnswerB" class="textarea"> </textarea>
                    <input type="checkbox" name="true_b" value="1" class="truradio">
                    <br />
                    
                C): <textarea name="AnswerC" class="textarea"> </textarea> 
                    <input type="checkbox" name="true_c" value="1" class="truradio">
                    <br />
                    
                D): <textarea name="AnswerD" class="textarea"> </textarea>
                    <input type="checkbox" name="true_d" value="1" class="truradio">
                    <br />
                
                Topic:  <select name="topic" style="width: 100px;">
                            <option value="1">Marvel</option>
                            <option value="2">DC</option>
                            <option value="3">Marvel/DC</option>
                            <option value="4">StarWars</option>
                            <option value="5">Jurassic_Park</option>  
                            <option selected="selected" value="6">Else</option>
                        </select> 
                        
                <input type="submit" value="Shrani" class="submitbtn" />
                <a href="Admin_Menu.php" class="backbtn">Back to Admin Menu</a>
            </form>';
            ?>
            
    </h2>
    
    </div>
</body>
</html>