<?php 
session_start();
include 'inc/quiz.php';
include 'inc/header.php';

// the total number of questions in the quiz
$total = count($questions);

// the current question number
$number = 1;

// check if the page information was set, and if so set the current question
if(isset($_POST['page'])) {
    $number = filter_input(INPUT_POST, 'page', FILTER_SANITIZE_NUMBER_INT);
} else {
    session_destroy();
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

echo '<div class="container">';
    echo '<div id="quiz-box">';

        echo '<p class="breadcrumbs">Question ' . ($number) . ' of ' . $total . '</p>';
        echo '<p class="quiz">What is ' . $questions[$number - 1]->leftAdder . ' + ' . $questions[$number - 1]->rightAdder . '?</p>';
        echo '<form action="play.php" method="post">';
            echo '<input type="hidden" name="id" value="0" />';
            echo '<input type="hidden" name="page" value="' . ($number + 1) . '" />';
            echo '<input type="submit" class="btn" name="answer" value="' . $first . '" />';
            echo '<input type="submit" class="btn" name="answer" value="' . $second . '" />';
            echo '<input type="submit" class="btn" name="answer" value="' . $third . '" />';
        echo '</form>';
        echo '</div>';
        echo '</div>';
echo '</body>';
echo '</html>';