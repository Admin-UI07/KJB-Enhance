<?php 

 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sbmt_foods'])) {
  $foods_to_replace = $_POST['foods_replace'];

  if (!empty($foods_to_replace)) {
   $foods_current_data = $pdo->prepare("SELECT * FROM food_products WHERE id = ?");
   $foods_current_data->execute([$foods_to_replace]);
   $foods_row = $foods_current_data->fetch(PDO::FETCH_ASSOC);
  } else {
   $foods_row = [];
  }

  $foods_name = !empty($_POST['foods_name']) ? $_POST['foods_name'] : $foods_row['name'];
  $foods_price = !empty($_POST['foods_price']) ? $_POST['foods_price'] : $foods_row['price'];
  $foods_desc = !empty($_POST['foods_description']) ? $_POST['foods_description'] : $foods_row['description'];
  $foods_img_name = $foods_row['image'] ?? '';

  if ($_FILES['foods_image']['error'] == 0) {
   if (!file_exists('foods_img')) {
    mkdir('foods_img', 0777, true);
   }

   $foods_img_name = $_FILES['foods_image']['name'];
   $foods_img_tmp = $_FILES['foods_image']['tmp_name'];
   $foods_img_folder = 'foods_img/' . $foods_img_name;

   move_uploaded_file($foods_img_tmp, $foods_img_folder);
  }

  if (!empty($foods_to_replace)) {
   $stmt = $pdo->prepare("UPDATE food_products SET
    image = ?,
    name = ?,
    price = ?,
    description = ?
    WHERE id = ?
   ");
   $stmt->execute([$foods_img_name, $foods_name, $foods_price, $foods_desc, $foods_to_replace]);
  } else if (empty($foods_to_replace)) {
   $foods_count = $pdo->query("SELECT COUNT(*) FROM food_products")->fetchColumn();

   if ($foods_count >= 9) {
    unlink($foods_img_folder);
    die("Maximum of 9 products reached.");
   }

   $stmt = $pdo->prepare("INSERT INTO food_products
   (image, name, price, description) VALUES (?, ?, ?)");
   $stmt->execute([$foods_img_name, $foods_name, $foods_price, $foods_desc]);
  }

  header("Location: admin.php");
  exit();
 }
?>