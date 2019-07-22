<?php
session_start();

$theme = $_SESSION['theme'];

include 'inc/header.php';
?>



<form method="post" action="play.php" class="form" >
  <h1 class="centered full">Math Quiz App!</h1>
  <p class="centered full">Solve addition problems to earn points!</p>
  <fieldset class="centered full">
    <legend>Game Mode</legend>
    <input type="radio" name="mode" id="standard" value="standard" checked >
    <label for="standard">Standard</label>
    <input type="radio" name="mode" id="random" value="random" >
    <label for="random">Random</label>
  </fieldset>
  <fieldset class="centered full">
    <legend>Theme</legend>
    <input type="radio" name="theme" id="normal" value="normal" checked >
    <label for="normal">Normal</label>
    <input type="radio" name="theme" id="colorful" value="colorful" >
    <label for="colorful">Colorful</label>
    <input type="radio" name="theme" id="dark" value="dark" >
    <label for="dark">Dark</label>
  </fieldset>
  <input type="hidden" name="page" value="1">

  <button type="submit" class="btn" >Play</button>
</form>
