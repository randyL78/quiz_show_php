<?php
/**
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 */

// Load json file
$questions = json_decode(file_get_contents('data/questions.json'));

// counter for current question
$counter = 0;

// the total number of questions in the quiz
$total = count($questions);

// the current question number
$number = 1;