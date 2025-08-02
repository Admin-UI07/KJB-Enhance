<?php

 if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['sbmt_for_img_slider'])) {
  if (!isset($_FILES['img_for_slider']) || $_FILES['img_for_slider']['error'] !== UPLOAD_ERR_OK) {
   die ("Error uploading file or no file selected.");
  }

  $img_slide_row_to_replace = $_POST['img_row_to_replace'];

  if (!empty($img_slide_row_to_replace)) {
   $slider_current_data = $pdo->prepare("SELECT * FROM image_slider WHERE id = ?");
   $slider_current_data->execute([$img_slide_row_to_replace]);
   $img_slider_row = $slider_current_data->fetch(PDO::FETCH_ASSOC);
  } else {
   $img_slider_row = [];
  }

  $slider_img_name = $img_slider_row['images'] ?? '';

  if (!file_exists('img')) {
   if (!mkdir('img', 0777, true)) {
    die("Failed to create image directory.");
   }
  }

  $file_ext = pathinfo($_FILES['img_for_slider']['name'], PATHINFO_EXTENSION);
  $slider_img_name = uniqid('slider_', true) . '.' . $file_ext;
  $folder = "img/" . $slider_img_name;

  if (!move_uploaded_file($_FILES['img_for_slider']['tmp_name'], $folder)) {
   die ("Failed to move uploaded file.");
  }

  // if ($_FILES['img_for_slider']['error'] == 0) {
  //  if (!file_exists('uploads')) {
  //   mkdir('uploads', 0777, true);
  //  }

  //  $slider_img_name = $_FILES['img_for_slider']['name'];
  //  $slider_tmp_name = $_FILES['img_for_slider']['tmp_name'];
  //  $folder = "uploads/" . $slider_img_name;

  //  move_uploaded_file($slider_img_name, $folder);
  // }

  if (!empty($img_slide_row_to_replace)) {
   $stmt = $pdo->prepare("UPDATE image_slider SET
    images = ?
    WHERE id = ?
   ");
   $stmt->execute([$slider_img_name, $img_slide_row_to_replace]);
  } else {
   $slider_row_count = $pdo->query("SELECT COUNT(*) FROM image_slider")->fetchColumn();

   if ($slider_row_count >= 10) {
    unlink($folder);
    die("Maximum of 10 products reached.");
   }

   $stmt = $pdo->prepare("INSERT INTO image_slider (images) VALUES (?)");
   $stmt->execute([$slider_img_name]);
  }

  header("Location: admin.php");
  exit();
 }

?>