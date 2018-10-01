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
        <h2>     <br/>
            <?php 
            include_once './Database.php';
            
            $cnt = 0;
            $id = (int) $_GET['id'];  
                
            $query = "SELECT id, content FROM questions WHERE id=$id";
            $result = mysqli_query($link, $query);
            
            $question = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) ==1) 
            {
                $q_id = $question['id'];
                $question = $question['content'];
            }
        
            $query = "SELECT content, tru, id FROM answers WHERE question_id=$q_id";
            $result = mysqli_query($link, $query);
            while ($answer = mysqli_fetch_array($result))
            {  
                switch($cnt){
                    case 0:
                    
                        $true_a = $answer['tru'];
                        $answer_a = $answer['content'];
                        $id_a = $answer['id'];  
                    break;
                    
                    case 1:
                    
                        $true_b = $answer['tru'];
                        $answer_b = $answer['content'];
                        $id_b = $answer['id'];  
                    break;
                    
                    case 2:
                    
                        $true_c = $answer['tru'];
                        $answer_c = $answer['content'];
                        $id_c = $answer['id'];  
                    break;
                    
                    case 3:
                
                        $true_d = $answer['tru'];
                        $answer_d = $answer['content'];
                        $id_d = $answer['id'];  
                    break;
                    }
                $cnt++;
            }
            echo '
            <form action="Admin_update.php" method="post" id="editQform">
                    <input type="hidden" name="prevsite" value="edit"/>
                
                Q): Question id = '.$id.' <textarea name="Question" class="textarea">
                        '.$question.'
                    </textarea>
                    <input type="hidden" name="Q_id" value="'.$q_id.'"/>
                    <br />
                    
                A): <textarea name="AnswerA" class="textarea">
                        '.$answer_a.'
                    </textarea> 
                    <input type="checkbox" name="true_a" value="1" class="truradio">
                    <input type="hidden" name="A_id" value="'.$id_a.'"/>
                    <br />
                B): <textarea name="AnswerB" class="textarea">
                        '.$answer_b.'
                    </textarea>
                    <input type="checkbox" name="true_b" value="1" class="truradio">
                    <input type="hidden" name="B_id" value="'.$id_a.'"/>
                    <br />
                C): <textarea name="AnswerC" class="textarea">
                        '.$answer_c.'
                    </textarea>
                    <input type="checkbox" name="true_c" value="1" class="truradio">
                    <input type="hidden" name="C_id" value="'.$id_c.'"/>
                    <br />
                D): <textarea name="AnswerD" class="textarea">
                        '.$answer_d.'
                    </textarea>
                    <input type="checkbox" name="true_d" value="1" class="truradio">
                    <input type="hidden" name="D_id" value="'.$id_d.'"/>
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