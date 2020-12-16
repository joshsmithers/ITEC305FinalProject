<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Results</h1>


    <?php
    session_start();
    $document = new DomDocument;
    $test = $_SESSION['selectedTest'];
    $numberOfQuestions = $_SESSION['numberOfQuestions'];
    $correctAnswerTracker= 0;

    $user = "csciremote";
    $pass = "";
    $db = new PDO('mysql:host=23.236.194.106:3306;dbname=itec305', $user, $pass);

    foreach ($_POST as $id => $userAnswer) {
//        echo "Field ".$id." is ".$userAnswer."<br>";
        $pdoStatement = $db->query('SELECT * FROM ' . $test . ' WHERE id = ' . $id);
        foreach ($pdoStatement as $row) {
            if ($row['id'] == $id) {
//                echo "Question: ".$row['question']."<br>Your answer: ".$userAnswer;
//                echo " Correct Answer is: " .$row['correct_answer']. "<br>";
                ?>
                <h3>Question: <?=$row['question']?></h3>
                    <h4>Your Answer: <?=$userAnswer?></h4>
                <?php
                if($row['correct_answer'] == $userAnswer) {
                    $correctAnswerTracker++;
                    ?>
                    <p id="CorrectAnswer">Correct!</p>
                    <?php
//                    echo "Correct! <br>";
                } else {
//                    echo "Incorrect :( <br> Correct Answer: " .$row['correct_answer'];
                    ?>
                    <p id="IncorrectAnswer">Incorrect... <br>
                    Correct Answer: <?=$row['correct_answer']?></p>
                    <?php
                }
            }
            echo "<br><br>";
        }
    }

    //calculate score
    $finalScore = $correctAnswerTracker / $numberOfQuestions * 100;
    $finalScore = number_format($finalScore);

    ?>

    <h2 id="score"> Your Score: <?=$finalScore?></h2>

    <br><br>
    <a href="index.php?quiz=trivia2">return to quiz choice</a>
</body>
</html>