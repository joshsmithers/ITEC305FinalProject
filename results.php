<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="quiz.css">
</head>
<body>
    <h1>Results</h1>

    <?php
    require_once('question.php');
    session_start();
    $document = new DomDocument;
    $test = $_SESSION['selectedTest'];
    $numberOfQuestions = $_SESSION['numberOfQuestions'];
    $questionBank = $_SESSION['questionBank'];
    $correctAnswerTracker= 0;

    foreach ($_POST as $id => $userAnswer) {
//        echo "Field ".$id." is ".$userAnswer."<br>";
        foreach ($questionBank as $questionObject) {
            if ($questionObject->id == $id) {
//                echo "Question: ".$row['question']."<br>Your answer: ".$userAnswer;
//                echo " Correct Answer is: " .$row['correct_answer']. "<br>";
                ?>
                <h3>Question: <?=$questionObject->question?></h3>
                    <h4>Your Answer: <?=$userAnswer?></h4>
                <?php
                if($questionObject->correct_answer == $userAnswer) {
                    $correctAnswerTracker++;
                    ?>
                    <p id="CorrectAnswer">Correct!</p>
                    <?php
//                    echo "Correct! <br>";
                } else {
//                    echo "Incorrect :( <br> Correct Answer: " .$row['correct_answer'];
                    ?>
                    <p id="IncorrectAnswer">Incorrect! <br>
                    Correct Answer: <?=$questionObject->correct_answer?></p>
                    <?php
                }
            }
        }
        echo "<br>";
    }

    //calculate score
    $finalScore = $correctAnswerTracker / $numberOfQuestions * 100;
    $finalScore = number_format($finalScore);

    ?>

    <h2 id="score"> Your Score: <?=$finalScore?></h2>

    <br><br>
    <div id="links">
    <a href="index.php?quiz=trivia2">Return to Quiz Choice</a>
    </div>
</body>
</html>