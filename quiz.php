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

<?php
require_once('question.php');
session_start();
$test = $_GET["quiz"];
$numberOfQuestions = 3;  // SET THIS TO SOMETHING SMALLER FOR TESTING
$user = "csciremote";
$pass = "";
try {
    $db = new PDO('mysql:host=23.236.194.106:3306;dbname=itec305', $user, $pass);
    $pdoStatement = $db->query('SELECT * FROM ' . $test . ' ORDER BY RAND() LIMIT ' . $numberOfQuestions);

    $questionBank = array();
    //fetch result set into associative array within array object
    while ($rowTest = $pdoStatement->fetch()) {
        $questionBank [] = new Question($rowTest);
    }
    var_dump($questionBank);

    $_SESSION['selectedTest'] = $test;
    $_SESSION['questionBank'] = $questionBank;
    $_SESSION['numberOfQuestions'] = $numberOfQuestions;

    ?>
    <form method="post" action="results.php">
        <?php
        foreach ($questionBank as $questionObject) {
            ?>
            <div><?php
                //print_r($row);
                $id = $questionObject->id;
                $question = $questionObject->question;
                $answer = array($questionObject->correct_answer, $questionObject->wrong_answer1, $questionObject->wrong_answer2, $questionObject->wrong_answer3);
                shuffle($answer);
                ?>
                <br><br>
                <?= $question ?>
                <br>
                <?php
                for ($i = 0; $i < 4; $i++) {
                    $thisAnswer = $answer[$i];
                    ?>
                    <input type="radio" name="<?=$id?>" value="<?= $thisAnswer ?>"/><?= $thisAnswer ?>
                    <br>
                    <?php
                }
                ?>
            </div>
            <?php
        } ?>
        <br>
        <input type="submit"/>
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
