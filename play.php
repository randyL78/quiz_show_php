<?php 
session_start();
include 'inc/quiz.php';

$theme = 'normal';
if(isset($_POST['theme'])) {
    $theme = filter_input(INPUT_POST, 'theme', FILTER_SANITIZE_STRING);
    $_SESSION['theme'] = $theme;
} else {
    $theme = $_SESSION['theme'];
}

// check if an answer is set and if correct increment score
if(isset($_POST['correct']) && isset($_POST['answer'])) {
    $correctAns = filter_input(INPUT_POST, 'correct', FILTER_SANITIZE_NUMBER_INT);
    $userAns = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);

    $correct = false;
    if ($correctAns === $userAns) {
        $score = $_SESSION['score'];
        $score++;
        $_SESSION['score'] = $score;
        $correct = true;
    }

    include 'inc/notification.php';
}

// check if the page information was set, and if so set the current question
if(isset($_POST['page'])) {
    $number = (int)filter_input(INPUT_POST, 'page', FILTER_SANITIZE_NUMBER_INT);
} else {
    header('location: index.php');
    exit;
}

// if on the first page, set the score to 0 and shuffle the array
if ($number === 1) {
    $_SESSION['score'] = 0;
    shuffle($questions);
    $_SESSION['questions'] = $questions;   
}

// if the current question is higher than the total display the
// game results
if($number > $total) {
    header('location: /results.php');
    exit;
}

// variables to store answers
$first;
$second;
$third;

// randomize the answer display order
switch (rand(0, 5)) {

    case 0:
        $first  = $questions[$number - 1]->correctAnswer;
        $second = $questions[$number - 1]->firstIncorrectAnswer;
        $third  = $questions[$number - 1]->secondIncorrectAnswer;
        break;
    case 1:
        $first  = $questions[$number - 1]->correctAnswer;
        $second = $questions[$number - 1]->secondIncorrectAnswer;
        $third  = $questions[$number - 1]->firstIncorrectAnswer;
        break;
    case 2:
        $first  = $questions[$number - 1]->secondIncorrectAnswer;
        $second = $questions[$number - 1]->correctAnswer;
        $third  = $questions[$number - 1]->firstIncorrectAnswer;
        break;
    case 3:
        $first  = $questions[$number - 1]->secondIncorrectAnswer;
        $second = $questions[$number - 1]->firstIncorrectAnswer;
        $third  = $questions[$number - 1]->correctAnswer;
        break;
    case 4:
        $first  = $questions[$number - 1]->firstIncorrectAnswer;
        $second = $questions[$number - 1]->secondIncorrectAnswer;
        $third  = $questions[$number - 1]->correctAnswer;
        break;
    case 5:
        $first  = $questions[$number - 1]->firstIncorrectAnswer;
        $second = $questions[$number - 1]->correctAnswer;
        $third  = $questions[$number - 1]->secondIncorrectAnswer;
        break;
}

include 'inc/header.php';

echo '<div class="container">';
    echo '<div id="quiz-box">';

        echo '<p class="breadcrumbs">Question ' . ($number) . ' of ' . $total . '</p>';
        echo '<p class="quiz">What is ' . $questions[$number - 1]->leftAdder . ' + ' . $questions[$number - 1]->rightAdder . '?</p>';
        echo '<form action="play.php" method="post">';
            echo '<input type="hidden" name="page" value="' . ($number + 1) . '" />';
            echo '<input type="hidden" name="correct" value="' . $questions[$number - 1]->correctAnswer  . '" />';
            echo '<input type="submit" class="btn" name="answer" value="' . $first . '" />';
            echo '<input type="submit" class="btn" name="answer" value="' . $second . '" />';
            echo '<input type="submit" class="btn" name="answer" value="' . $third . '" />';
        echo '</form>';
        echo '</div>';
        echo '</div>';
echo '</body>';
echo '</html>';