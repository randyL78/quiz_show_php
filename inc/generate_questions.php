<?php

function getGeneratedQuestions() {
  
  // array to store questions
  $generatedQuestions = [];

  // for the generated questions, let's make the total 12
  for ($i = 0; $i < 12; $i++) {

    // create the queston attributes
    $leftAdder = mt_rand(0 , 100);

    $rightAdder;
    do {
      $rightAdder = mt_rand(0 , 100);
    } while ($rightAdder === $leftAdder);

    $correctAnswer = $leftAdder + $rightAdder;

    $firstIncorrectAnswer;
    do {
      $firstIncorrectAnswer = mt_rand($correctAnswer - 10, $correctAnswer + 10);
    } while ($firstIncorrectAnswer === $correctAnswer);

    $secondIncorrectAnswer;
    do {
      $secondIncorrectAnswer = mt_rand($correctAnswer - 10, $correctAnswer + 10);
    } while (
        $secondIncorrectAnswer === $correctAnswer || 
        $secondIncorrectAnswer === $firstIncorrectAnswer
    );

    // cast to object to mimic json file
    $generatedQuestions[] = (object)[
      "leftAdder" => $leftAdder,
      "rightAdder" => $rightAdder,
      "correctAnswer" => $correctAnswer,
      "firstIncorrectAnswer" => $firstIncorrectAnswer,
      "secondIncorrectAnswer" => $secondIncorrectAnswer   
    ];
  }

  return $generatedQuestions;
}