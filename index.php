<?php
session_start();

$theme = $_SESSION['theme'];
if (empty($theme)) {
  $theme = 'normal';
}

$mode = $_SESSION['mode'];
if (empty($mode)) {
  $mode = 'standard';
}

include 'inc/header.php';

?>



<form method="post" action="play.php" class="form" >
  <h1 class="centered full">Math Quiz App!</h1>
  <p class="centered full">Solve addition problems to earn points!</p>
  <fieldset class="centered full">
    <legend>Game Mode</legend>
    <input type="radio" name="mode" id="standard" value="standard" <?php echo ($mode === 'standard') ? 'checked' : null ?> >
    <label for="standard">Standard</label>
    <input type="radio" name="mode" id="random" value="random" <?php echo ($mode === 'random') ? 'checked' : null ?> >
    <label for="random">Random</label>
  </fieldset>
  <fieldset class="centered full">
    <legend>Theme</legend>
    <input type="radio" name="theme" id="normal" value="normal" <?php echo ($theme === 'normal') ? 'checked' : null ?> >
    <label for="normal">Normal</label>
    <input type="radio" name="theme" id="colorful" value="colorful" <?php echo ($theme === 'colorful') ? 'checked' : null ?> >
    <label for="colorful">Colorful</label>
    <input type="radio" name="theme" id="dark" value="dark" <?php echo ($theme === 'dark') ? 'checked' : null ?> >
    <label for="dark">Dark</label>
  </fieldset>
  <input type="hidden" name="page" value="1">

  <button type="submit" class="btn" >Play</button>
</form>
