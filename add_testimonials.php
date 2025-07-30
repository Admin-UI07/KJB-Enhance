<?php

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['sbmt_for_testimony'])) {

 $tml_row_to_replace = $_POST['tmp_row_replace'];

 if (!empty($tml_row_to_replace)) {
  $tml_current_data = $pdo->prepare("SELECT * FROM testimonials WHERE id = ?");
  $tml_current_data->execute([$tml_row_to_replace]);
  $tml_row = $tml_current_data->fetch(PDO::FETCH_ASSOC);
 } else {
  $tml_row = [];
 }

 $tml_username = !empty($_POST['user_name_for_testimony']) ? $_POST['user_name_for_testimony'] : $tml_row['username'];
 $tml_testimony = !empty($_POST['user_testimony']) ? $_POST['user_testimony'] :
 $tml_row['testimonial'];

 if (!empty($tml_row_to_replace)) {
  $stmt = $pdo->prepare("UPDATE testimonials SET
   username = ?,
   testimonial = ?
   WHERE id = ?
  ");
  $stmt->execute([$tml_username, $tml_testimony, $tml_row_to_replace]);
 } else {
  $tml_row_count = $pdo->query("SELECT COUNT(*) FROM testimonials")->fetchColumn();

  if ($tml_row_count >= 10) {
   die("Maximum of 10 products reached.");
  }

  $stmt = $pdo->prepare("INSERT INTO testimonials (username, testimonial) VALUES (?, ?)");
  $stmt->execute([$tml_username, $tml_testimony]);
 }

 header("Location: admin.php");
 exit();
}

?>