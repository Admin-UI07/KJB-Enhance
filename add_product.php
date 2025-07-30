<?php

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit_for_fp'])) {
 $fp_row_to_replace = $_POST['row_to_place'];

 if (!empty($fp_row_to_replace)) {
  $fp_current_data = $pdo->prepare("SELECT * FROM featured_product WHERE id = ?");
  $fp_current_data->execute([$fp_row_to_replace]);
  $fp_row = $fp_current_data->fetch(PDO::FETCH_ASSOC);
 } else {
  $fp_row = [];
 }

 $fp_product_name = !empty($_POST['product_name_for_fp']) ? $_POST['product_name_for_fp'] : $fp_row['name'];
 $fp_price = !empty($_POST['price_for_fp']) ? $_POST['price_for_fp'] : $fp_row['price'];
 $fp_discount_price = !empty($_POST['discount_price_for_fp']) ? $_POST['discount_price_for_fp'] : $fp_row['discount_price'];
 $fp_description = !empty($_POST['desc_for_fp']) ? $_POST['desc_for_fp'] : $fp_row['description'];

 $fp_image_name = $fp_row['image'] ?? '';

 if ($_FILES['img_for_fp']['error'] == 0) {
  if (!file_exists('img')) {
   mkdir('img', 0777, true);
  }

  $fp_image_name = $_FILES['img_for_fp']['name'];
  $fp_temp_name = $_FILES['img_for_fp']['tmp_name'];
  $fp_folder = "img/" . $fp_image_name;

  move_uploaded_file($fp_temp_name, $fp_folder);
 }


 if (!empty($fp_row_to_replace)) {
  $fp_stmt = $pdo->prepare("UPDATE featured_product SET
   image = ?,
   name = ?,
   price = ?,
   discount_price = ?,
   description = ?
   WHERE id = ?
  ");
  $fp_stmt->execute([$fp_image_name, $fp_product_name, $fp_price, $fp_discount_price, $fp_description, $fp_row_to_replace
  ]);
 } else if (empty($fp_row_to_replace)) {
  $fp_count = $pdo->query("SELECT COUNT(*) FROM featured_product")->fetchColumn();

  if ($fp_count >= 9) {
   unlink($fp_folder);
   die("Maximum of 9 products reached.");
  }

  $fp_stmt = $pdo->prepare("INSERT INTO featured_product
  (image, name, price, discount_price, description) VALUES (?, ?, ?, ?, ?);
  ");
  $fp_stmt->execute([$fp_image_name, $fp_product_name, $fp_price, $fp_discount_price, $fp_description]);
 }

 header("Location: admin.php");
 exit();
}

?>
