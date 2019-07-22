<?php
session_start();

$theme = $_SESSION['theme'];

include 'inc/header.php';

$score = 0;
if(isset($_SESSION['score'])) {
  $score = $_SESSION['score'];
}
echo '<form method="post" action="play.php" class="form" >';
  echo '<h1 class="centered full" >Game Results</h1>';
  echo '<h2 class="centered full" >Score: ' . $score . '</h2>';
  echo '<button type="submit" class="btn" name="page" value="1" >Play</button>';
  echo '<button type="submit" class="btn" >Settings</button>';
echo '</div>';
