<?php
session_start();

$theme = $_SESSION['theme'];

include 'inc/header.php';

$score = 0;
if(isset($_SESSION['score'])) {
  $score = $_SESSION['score'];
}

echo '<h1>Game Results</h1>';
echo '<h2>Score: ' . $score . '</h2>';