<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TQ: Your Quiz</title>
    <link rel="shortcut icon" type="image/png" href="resources/logo.png"/>
    <link rel="stylesheet" type="text/css" href="quiz.css">
</head>
<body>

<?php
require_once('question.php');
session_start();
$test = $_GET["quiz"];
$numberOfQuestions = 10;  // SET THIS TO SOMETHING SMALLER FOR TESTING
$user = "csciremote";
$pass = "";
?>
<h1>
    <?php
    switch ($test) {
        case 'trivia1':
            ?>
            State Capitals Quiz
            <?php
            break;
        case 'trivia2':
            ?>
            Movie Trivia
            <?php
            break;
        default:
            ?>
            Trivia Quiz!
            <?php
            break;
    }
    ?>
</h1>
<?php

try {
    $db = new PDO('mysql:host=23.236.194.106:3306;dbname=itec305', $user, $pass);
    $pdoStatement = $db->query('SELECT * FROM ' . $test . ' ORDER BY RAND() LIMIT ' . $numberOfQuestions);

    $questionBank = array();
    //fetch result set into associative array within array object
    while ($rowTest = $pdoStatement->fetch()) {
        $questionBank [] = new Question($rowTest);
    }
    //var_dump($questionBank); // this line was used for testing purposes

    $_SESSION['selectedTest'] = $test;
    $_SESSION['questionBank'] = $questionBank;
    $_SESSION['numberOfQuestions'] = $numberOfQuestions;

    ?>
    <form method="post" action="results.php">
        <?php
        foreach ($questionBank as $questionObject) {
            ?>
            <div id="wrapper">
                <div id="question"><?php
                    //print_r($row);
                    $id = $questionObject->id;
                    $question = $questionObject->question;
                    $answer = array($questionObject->correct_answer, $questionObject->wrong_answer1, $questionObject->wrong_answer2, $questionObject->wrong_answer3);
                    shuffle($answer);
                    ?>
                    <?= $question ?>
                    <br>
                    <?php
                    for ($i = 0; $i < 4; $i++) {
                        $thisAnswer = $answer[$i];
                        ?>
                        <input type="radio" name="<?= $id ?>" value="<?= $thisAnswer ?>"/><?= $thisAnswer ?>
                        <br>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <br>
            <?php
        } ?>
        <div id="links">
            <input type="submit" value="Submit"/>
        </div>
    </form>
    <?php
    $db = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>


</body>
</html>
