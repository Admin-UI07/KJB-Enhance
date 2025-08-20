<?php

 require_once 'dbadminconnection.php';

	require_once 'buy_now_head.php';

	require_once 'add_fproduct.php';

	require_once 'add_testimonials.php';

	require_once 'add_image_slider.php';

	require_once 'add_food_product.php';

	require_once 'add_nfood_product.php';

	$stmt = $pdo->query("SELECT * FROM featured_product ORDER BY id ASC LIMIT 9");
	$fp_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->query("SELECT * FROM testimonials ORDER BY id ASC LIMIT 10");
	$tml = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->query("SELECT * FROM image_slider ORDER BY id ASC LIMIT 10");
	$img_slide = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->query("SELECT * FROM food_products ORDER BY id ASC LIMIT 9");
	$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->query("SELECT * FROM non_food_products ORDER BY id ASC LIMIT 9");
	$non_foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
	<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Admin Dashboard</title>
</head>
<body class="">

	<!-- Form for Buy Now Head -->
 <form method="post" enctype="multipart/form-data">
  <input type="text" maxlength="255" name="product_name_for_bnh" placeholder="Product Name">
  <input type="text" maxlength="255" name="price_for_bnh" placeholder="Price">
  <input type="text" maxlength="255" name="discount_price_for_bnh" placeholder="Discount Price">
  <textarea name="desc_for_bnh" placeholder="Description"></textarea>
  <input type="file" name="image_for_buy_now_head" accept="image/*">
  <button type="submit" name="submit_for_bnh">Upload</button>
 </form>

	<br><br>

	<!-- Form for FP -->
	<form method="post" enctype="multipart/form-data">
		<select name="row_to_place">
			<option value="">Add as a new row</option>
			<?php foreach ($fp_products as $fp_product): ?>
				<option value="<?= $fp_product['id'] ?>">
					<?= htmlspecialchars($fp_product['name']) ?>
				</option>
			<?php endforeach; ?>
		</select>
		<input type="text" maxlength="100" name="product_name_for_fp" placeholder="Product Name">
		<input type="text" maxlength="100" name="price_for_fp" placeholder="Price">
		<input type="text" maxlength="100" name="discount_price_for_fp" placeholder="Discount Price">
		<textarea name="desc_for_fp" placeholder="Description"></textarea>
		<input type="file" name="img_for_fp" accept="image/*">
		<button type="submit" name="submit_for_fp">Upload</button>
	</form>

	<br><br>

	<!-- Form for Testimonials -->
	<form method="post">
		<select name="tmp_row_replace">
			<option value="">Add new row</option>
			<?php foreach($tml as $testimony): ?>
				<option value="<?= htmlspecialchars($testimony['id']) ?>"><?= htmlspecialchars($testimony['username']) ?></option>
			<? endforeach; ?>
		</select>
		<input type="text" maxlength="25" name="user_name_for_testimony" placeholder="User">
		<textarea name="user_testimony" placeholder="Testify here."></textarea>
		<button type="submit" name="sbmt_for_testimony">Submit</button>
	</form>

	<br><br>

	<!-- Form for Image Slider -->
	<form method="post" enctype="multipart/form-data">
		<select name="img_row_to_replace">
			<option value="">Add new row</option>
			<?php foreach($img_slide as $index => $image): ?>
				<option value="<?= htmlspecialchars($image['id']) ?>"> <?= $index + 1 ?> </option>
			<?php endforeach; ?>
		</select>
		<input type="file" name="img_for_slider" accept="image/*">
		<button type="submit" name="sbmt_for_img_slider">Upload</button>
	</form>

	<br><br>

	<!-- Form for Food-Products -->
	<form method="post" enctype="multipart/form-data">
		<select name="foods_replace">
			<option value="">Add new row</option>
			<?php foreach ($foods as $index => $food): ?>
				<option value="<?= htmlspecialchars($food['id']) ?>"><?= htmlspecialchars($food['name']) ?></option>
			<?php endforeach; ?>
		</select>
		<input type="text" name="foods_name" placeholder="Product Name">
		<input type="text" name="foods_price" placeholder="Price">
		<textarea name="foods_description" placeholder="Description"></textarea>
		<input type="file" name="foods_image" accept="image/*">
		<button type="submit" name="sbmt_foods">Submit</button>
	</form>

	<br><br>

	<!-- Form for Non-Foods-Products -->
	<form method="post" enctype="multipart/form-data">
		<select name="n_foods_replace">
			<option value="">Add new row</option>
			<?php foreach ($non_foods as $non_food): ?>
				<option value="<?= htmlspecialchars($non_food['id']) ?>"><?= htmlspecialchars($non_food['name']) ?></option>
			<?php endforeach; ?>
			<input type="text" name="n_foods_name" placeholder="Product Name">
			<input type="text" name="n_foods_price" placeholder="Price">
			<textarea name="n_foods_description" placeholder="Description"></textarea>
			<input type="file" name="n_foods_img" accept="image/*">
			<button type="submit" name="sbmt_n_foods">Submit</button>
		</select>
	</form>
</body>

</html>