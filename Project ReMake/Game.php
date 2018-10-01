<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Stage_2</title>
    <link rel="stylesheet" href="Style_S2.css">
                    
</head>
<body>
    <div class="game_wrap">
     
      
       <div class="op-btn">    <!--     
            <a href="" class="op" id="call">Call</a>
            <a href="" class="op" id="vote">Vote</a>
            <a href="" class="op" id="fifty">50/50</a>
                                !-->
        </div>
           
            <?php
                include_once './Session.php';
                                
                if(isset($_SESSION['username']))
                {                                     
                    echo '<a href="" id="gamealreadyloginbutton">'.$_SESSION['username'].'</a>';
                    echo '<a href="Index.php" class="dropdown">logout</a>';
                    
                }
                else
                {
                    echo '<a href="./login.html" id="gameloginbutton">  Login  </a>';
                }
                
            ?>
               
            
            <!-- php za štenje dnarja !-->
            <ul>
                <li class = "moneystamp">
                    <?php
                           include_once './Session.php';
                            if(isset($_SESSION['score']))
                            {
                                $money = $_SESSION['score'];
                                $money++;
                                $award = array("0$","75$", "125$", "250$", "500$", "1000$", "1250$", "1500$", "2000$", "5000$", "10000$", "12500$", "15000$","25000$ ","50000$","100000$");
                                $cash = $award[$money];
                                echo $cash;
                            }
                            else {
                                echo "75$";
                            }
                             
                        ?>
                </li>
                    <li id = "current_moneystamp">
                        <?php
                           include_once './Session.php';
                            if(isset($_SESSION['score']))
                            {
                                $money = $_SESSION['score'];
                                $money;
                                $award = array("0$","75$", "125$", "250$", "500$", "1000$", "1250$", "1500$", "2000$", "5000$", "10000$", "12500$", "15000$","25000$ ","50000$");
                                $cash = $award[$money];
                                echo $cash;
                            }
                            else{
                             echo "0$";   
                            }
                        ?>
                    </li>
                <li class = "moneystamp">
                   <?php
                           include_once './Session.php';
                            if(isset($_SESSION['score']))
                            {
                                $money = $_SESSION['score'];
                                $money --;
                                $award = array("0$","75$", "125$", "250$", "500$", "1000$", "1250$", "1500$", "2000$", "5000$", "10000$", "12500$", "15000$","25000$ ","50000$");
                                if($money < 0)
                                {
                                    echo "--";
                                }
                                else
                                {
                                    $cash = $award[$money];
                                    echo $cash;
                                }
                            }
                            else{
                             echo "--";
                            }
                        ?>
                </li>
            </ul>
        
        
        
    <div class="question">       
        <h1>Q : 
            <?php 
                include_once './Session.php';
                include_once './Database.php'; 
            ///////////////////////////////////////////////////////
                if (!isset($_SESSION['score']))
                {
                    $_SESSION['score'] = 0;
                }
                    $cnt = 0;
                    $score = $_SESSION['score'];
                    $randarr = array();
        if(isset($_SESSION['Random']))
        { 
            foreach ($_SESSION['Random'] as $key => $value )
            {
                $randarr[$cnt] = $value;
                $cnt++;
            }
            $randid = $randarr[$score];
        }
        else
        {
            header("Location: Random.php");
        }
            /////////////////////////////////////////////////////////
            
            $query = "SELECT content, id FROM questions WHERE id = '$randid'";
            $result = mysqli_query($link, $query);
            
            $question = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) ==1) 
            {
                $question_content = $question['content'];
                $question_id = $question['id'];
                $_SESSION['q_id'] = $question['id'];
                
                echo $question_content;
            }
            ?>
            
            </h1>
    </div>
    <h1>
   <?php  
        include_once './Session.php';
        include_once './Database.php';
        $q_id = $_SESSION['q_id'];
        
            $query = "SELECT content, tru, id FROM answers WHERE question_id = '$q_id'";
            $result = mysqli_query($link, $query);
                //$answers = mysqli_fetch_array($result);
        
            $arr_seq = array("0","1","2","3");
            shuffle($arr_seq);
            $arr_tr_a = array();
            $arr_ans = array();
            $arr_id = array(); 
            $cnt = 0;
            while ($answers = mysqli_fetch_array($result))
            {  
                        //echo "$arr_seq[$cnt] ->";
                $arr_tr_a[$cnt] = $answers['tru'];
                        //echo "$arr_tr_a[$cnt] ->";
                $arr_ans[$cnt] = $answers['content']; 
                        //echo "$arr_ans[$cnt] -> ";
                $arr_id[$cnt] = $answers['id'];
                        //echo "$arr_id[$cnt] -> | | ";
                $cnt++;
            }
        $_SESSION['answer'] = $arr_ans;
        $_SESSION['true_answer'] = $arr_tr_a;
        $_SESSION['sequence'] = $arr_seq; 
        $_SESSION['chosenone'] = $arr_id;    
        
    ?>             
    </h1>
    
        
    <div class="answers_1"> 
       
        
        
        <form method="post" action="judge.php">
        <?php
                include_once './Session.php';
                $seq = 4;
                $answer = "A)";
                $tru_ans = 2;
                $ButtonValue = 0;
                $cnt = 0;
            foreach ($_SESSION['sequence'] as $value )
            {
                if($cnt == $ButtonValue)
                {
                    $seq = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['answer'] as $value )
            {
                if($cnt == $seq)
                {
                    $answer = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['chosenone'] as $value )
            {
                if($cnt == $seq)
                {
                    $tru_ans = $value;
                    break;
                }
                else {$cnt++;}
            }   
                echo '<button type="submit" name="ans" value="'.$tru_ans.'" class="answer-bnt" > A)  '.$answer.'</button>';
        ?>
            
            
            
            
            
            
            
        </form>
         
                 <form method="post" action="judge.php">
        <?php
                include_once './Session.php';
                $seq = 4;
                $answer = "B)";
                $tru_ans = 2;
                $ButtonValue = 1;
                $cnt = 0;
            foreach ($_SESSION['sequence'] as $value )
            {
                if($cnt == $ButtonValue)
                {
                    $seq = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['answer'] as $value )
            {
                if($cnt == $seq)
                {
                    $answer = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['chosenone'] as $value )
            {
                if($cnt == $seq)
                {
                    $tru_ans = $value;
                    break;
                }
                else {$cnt++;}
            }   
                echo '<button type="submit" name="ans" value="'.$tru_ans.'" class="answer-bnt"> B)  '.$answer.'</button>';
        ?>
        </form>
        
                <form method="post" action="judge.php">
        <?php
                include_once './Session.php';
                $seq = 4;
                $answer = "C)";
                $tru_ans = 2;
                $ButtonValue = 2;
                $cnt = 0;
            foreach ($_SESSION['sequence'] as $value )
            {
                if($cnt == $ButtonValue)
                {
                    $seq = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['answer'] as $value )
            {
                if($cnt == $seq)
                {
                    $answer = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['chosenone'] as $value )
            {
                if($cnt == $seq)
                {
                    $tru_ans = $value;
                    break;
                }
                else {$cnt++;}
            }   
                echo '<button type="submit" name="ans" value="'.$tru_ans.'" class="answer-bnt"> C)  '.$answer.'</button>';
        ?>
        </form>
                <form method="post" action="judge.php">
        <?php
                include_once './Session.php';
                $seq = 4;
                $answer = "D)";
                $tru_ans = 2;
                $ButtonValue = 3;
                $cnt = 0;
            foreach ($_SESSION['sequence'] as $value )
            {
                if($cnt == $ButtonValue)
                {
                    $seq = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['answer'] as $value )
            {
                if($cnt == $seq)
                {
                    $answer = $value;
                    break;
                }
                else {$cnt++;}
            }
            $cnt = 0;
            foreach ($_SESSION['chosenone'] as $value )
            {
                if($cnt == $seq)
                {
                    $tru_ans = $value;
                    break;
                }
                else {$cnt++;}
            }   
                echo '<button type="submit" name="ans" value="'.$tru_ans.'" class="answer-bnt"> D)  '.$answer.'</button>';
        ?>
        </form>
    </div>
           
            
   
</div>
</body>
</html>