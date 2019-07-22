<?php
/**
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 */

include 'generate_questions.php';

function getQuestions($mode) {
  if($mode === 'standard') {
    return json_decode(file_get_contents('data/questions.json'));
  } else {
    return getGeneratedQuestions();
  }
  
}

