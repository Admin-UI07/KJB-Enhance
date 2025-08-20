<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sbmt_n_foods'])) {
 $n_food_to_replace = $_POST['n_foods_replace'];

 if (!empty($n_food_to_replace)) {
  $n_food_current_data = $pdo->prepare("SELECT * FROM non_food_products WHERE id = ?");
  $n_food_current_data->execute([$n_food_to_replace]);
  $n_food_row = $n_food_current_data->fetch(PDO::FETCH_ASSOC);
 } else {
  $n_food_row = [];
 }

 $n_food_name = !empty($_POST['n_foods_name']) ? $_POST['n_foods_name'] : $n_food_row['name'];
 $n_food_price = !empty($_POST['n_foods_price']) ? $_POST['n_foods_price'] : $n_food_row['price'];
 $n_food_desc = !empty($_POST['n_foods_description']) ? $_POST['n_foods_description'] : $n_food_row['description'];
 $n_food_img_name = $n_food_row['image'] ?? '';

 if ($_FILES['n_foods_img']['error'] == 0) {
  if (!file_exists('foods_img')) {
   mkdir('foods_img', 0777, true);
  }

  $n_food_img_name = $_FILES['n_foods_img']['name'];
  $n_food_img_tmp_name = $_FILES['n_foods_img']['tmp_name'];
  $n_food_img_folder = 'foods_img/' . $n_food_img_name;

  move_uploaded_file($n_food_img_tmp_name, $n_food_img_folder);
 }

 if (!empty($n_food_to_replace)) {
  $stmt = $pdo->prepare("UPDATE non_food_products SET
   image = ?,
   name = ?,
   price = ?,
   description = ?
   WHERE id = ?
  ");
  $stmt->execute([$n_food_img_name, $n_food_name, $n_food_price, $n_food_desc, $n_food_to_replace]);
 } else {
  $n_food_count = $pdo->query("SELECT COUNT(*) FROM non_food_products")->fetchColumn();

  if ($n_food_count >= 9) {
   unlink($n_food_img_folder);
   die("Maximum of 9 products reached.");
  }

  $stmt = $pdo->prepare("INSERT INTO non_food_products
  (image, name, price, description) VALUES (?, ?, ?)");
  $stmt->execute([$n_food_img_name, $n_food_name, $n_food_price, $n_food_desc]);
 }

 header('Location: admin.php');
 exit();
}
?>