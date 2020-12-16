<?php

class Question {

    public $id;
    public $question;
    public $correct_answer;
    public $wrong_answer1;
    public $wrong_answer2;
    public $wrong_answer3;


    function __construct($row) {
        $this->id = $row['id'];
        $this->question = $row['question'];
        $this->correct_answer = $row['correct_answer'];
        $this->wrong_answer1 = $row['wrong_answer1'];
        $this->wrong_answer2 = $row['wrong_answer2'];
        $this->wrong_answer3 = $row['wrong_answer3'];
    }

}

?>