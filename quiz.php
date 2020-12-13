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
$test = "trivia1";  //TODO: $_GET this from index.php
$numberOfQuestions = 10;
$user = "csciremote";
$pass = "";
try {
    $db = new PDO('mysql:host=23.236.194.106:3306;dbname=itec305', $user, $pass);
    $stmnt = $db->query('SELECT * FROM ' .$test. ' ORDER BY RAND() LIMIT ' .$numberOfQuestions);
//    if ($stmnt->rowCount() < $numberOfQuestions) {
//
//    }

    foreach ($stmnt as $row) {
        ?>
        <div><?php
        //print_r($row);
        $question = $row['question'];
        $answer = array($row['correct_answer'], $row['wrong_answer1'], $row['wrong_answer2'], $row['wrong_answer3']);
        shuffle($answer);
        ?>
        <br><br>
        <?= $question ?>
        <form>
            <?php
            for ($i = 0; $i < 4; $i++) {
                $thisAnswer = $answer[$i];
                ?>
                <input type="radio" name="ans1" value="<?= $thisAnswer ?>"/><?= $thisAnswer ?>
                <br>
                <?php
            }
            ?>
        </form>
        </div>
        <?php
    }
    $db = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

<form action = results.php>
        </form>
?>




</body>
</html>
