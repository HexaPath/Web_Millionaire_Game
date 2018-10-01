<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Delete Question</title>
</head>
<body>
    <h1 class ="centerh1">  
        <?php
            include_once './Database.php';
            $prevsite = $_POST['prevsite']; 
        
        
        if($prevsite == 'edit' || $prevsite == 'add')
        {
            $true_a = 0;
            $true_b = 0;
            $true_c = 0;
            $true_d = 0; 
            $question = "Q";
            $answer_A = "A";
            $answer_B = "B";
            $answer_C = "C";
            $answer_D = "D"; 
            $topic = 6;
            $q_id = 500; 
            
            if(isset($_POST['topic']))
            {
                $topic = $_POST['topic'];
            }
            if(isset($_POST['Q_id']))
            {
                $q_id = $_POST['Q_id'];
            }
        
            if(isset($_POST['Question']))
            {
                $question = $_POST['Question'];
            }
            if(isset($_POST['AnswerA']))
            {
                $answer_A = $_POST['AnswerA'];
            }
            if(isset($_POST['AnswerB']))
            {
                $answer_B = $_POST['AnswerB'];
            }
            if(isset($_POST['AnswerC']))
            {
                $answer_C = $_POST['AnswerC'];
            }
            if(isset($_POST['AnswerD']))
            {
                $answer_D = $_POST['AnswerD'];
            } 
            if(isset($_POST['true_a']))
            {
                $true_a = $_POST['true_a'];
            }
            if(isset($_POST['true_b']))
            {
               $true_b = $_POST['true_b']; 
            }
            if(isset($_POST['true_c']))
            {
                $true_c = $_POST['true_c'];
            }
            if(isset($_POST['true_d']))
            {
                $true_d = $_POST['true_d'];
            }
              
            if($prevsite == 'edit')
            {
                echo "edit";
                $id_a = $_POST['A_id'];  
                $id_b = $_POST['B_id'];  
                $id_c = $_POST['C_id'];  
                $id_d = $_POST['D_id']; 
                
                $query = "UPDATE questions SET content = $question WHERE id= $q_id";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET content = $answer_A WHERE id= $id_a";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET content = $answer_B WHERE id= $id_b";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET content = $answer_C WHERE id= $id_c";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET content = $answer_D WHERE id= $id_d";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET tru = $true_a WHERE id= $id_a";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET tru = $true_b WHERE id= $id_b";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET tru = $true_c WHERE id= $id_c";
                mysqli_query($link, $query);
                $query = "UPDATE answers  SET tru = $true_d WHERE id= $id_d";
                mysqli_query($link, $query);
            }
        
            elseif ($prevsite == 'add')
            {    
                
                $query = "INSERT INTO questions (content, id, topic_id) VALUES ('$question', '$q_id', '$topic')";
                mysqli_query($link, $query);
                $query = "INSERT INTO answers (content, tru, question_id) VALUES ('$answer_A', '$true_a', '$q_id')";
                mysqli_query($link, $query); 
                $query = "INSERT INTO answers (content, tru, question_id) VALUES ('$answer_B', '$true_b', '$q_id')";
                mysqli_query($link, $query);
                $query = "INSERT INTO answers (content, tru, question_id) VALUES ('$answer_C', '$true_c', '$q_id')";
                mysqli_query($link, $query);
                $query = "INSERT INTO answers (content, tru, question_id) VALUES ('$answer_D', '$true_d', '$q_id')";
                mysqli_query($link, $query);
            }
        }
        elseif($prevsite == 'user_edit' || $prevsite == 'user_add')
        {
            $username = "blank";
            $email = "blank";
            $rlvl = "blank";
            
            if(isset($_POST['username']))
            {
                $username = $_POST['username'];
            }
            if(isset($_POST['email']))
            {
                $email = $_POST['email'];
            }
            if(isset($_POST['restriction_lvl']))
            {
                $rlvl = $_POST['restriction_lvl'];
            }
            
            
            if($prevsite == 'user_edit')
            {
                $u_id = $_POST['user_id'];
                
                $query = "UPDATE users SET user = $username WHERE id = $u_id";
                mysqli_query($link, $query);
                $query = "UPDATE users SET email = $email WHERE id = $u_id";
                mysqli_query($link, $query);
                $query = "UPDATE users SET Restriction_id = $rlvl WHERE id = $u_id";
                mysqli_query($link, $query);
                 
            }
            elseif($prevsite == 'user_add')
            {      
                $pass = $_POST['password'];
                $pass = $salt.$pass;
                $pass = sha1($pass); 
                
                $query = "INSERT INTO users(user,password,email,restriction_id) VALUES ('$username','$pass','$email', '$rlvl')"; 
                mysqli_query($link, $query);
            }
        }
                
                
            header("Location: Admin_Menu.php");
        
        ?>
        
    </h1>
</body>
</html>