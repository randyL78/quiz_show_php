<?php

// display an alert banner after a user answers each question
if ($correct) {
  echo '<div class="alert success" id="alert">';
  echo 'Congratulations! ' . $correctAns . ' was the correct answer!';
} else {
  echo '<div class="alert warning" id="alert">';
  echo 'Sorry! ' . $userAns . ' was not the correct answer!';
}

echo '<span class="close" role="button" onClick="closeAlert()"> X </span>';
echo '</div>';

?>

<script>

function closeAlert() {
  document.getElementById('alert').style.display = 'none';
}

</script>