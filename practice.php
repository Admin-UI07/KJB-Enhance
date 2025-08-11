<?php

 require_once 'dbadminconnection.php';

	require_once 'buy_now_head.php';

	require_once 'add_product.php';

	require_once 'add_testimonials.php';

	require_once 'add_image_slider.php';

	$stmt = $pdo->query("SELECT * FROM featured_product ORDER BY id ASC LIMIT 9");
	$fp_products = $stmt->fetchAll(PDO::FETCH_ASSOC);


	$stmt = $pdo->query("SELECT * FROM testimonials ORDER BY id ASC LIMIT 10");
	$tml = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->query("SELECT * FROM image_slider ORDER BY id ASC LIMIT 10");
	$img_slide = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
</body>

</html>

<footer class="flex justify-center bg-green-300/50 mt-10 font-poppins">
		<div class="flex justify-between flex-wrap gap-5 w-[1500px] p-8">
			<div>
				<img class="w-20" src="/img/KJB-Logo.webp" alt="">
				<ul class="text-green-800">
					<li class="font-semibold text-lg text-green-900">Address:</li>
					<li>Sitio Dalig Itaas</li>
					<li>Cagsiay II</li>
					<li>Mauban, Quezon</li>
					<li class="text-xs">Mon-Sat 8am-7pm</li>
					<li class="text-xs">&copy; 2025 Kuya Jaypee Bigasan</li>
				</ul>
			</div>
			<div class="space-y-8">
				<h2 class="font-semibold text-lg text-green-900">Navigation</h2>
				<ul class="text-green-900 text-base/7">
					<li class="cursor-pointer hover:opacity-75 hover:underline">Home</li>
					<li class="cursor-pointer hover:opacity-75 hover:underline">Products</li>
					<li class="cursor-pointer hover:opacity-75 hover:underline">Reviews</li>
				</ul>
			</div>
			<div class="space-y-8">
				<h2 class="font-semibold text-lg text-green-900">About Us</h2>
				<ul class="text-green-900 text-base/7">
					<li class="cursor-pointer hover:opacity-75 hover:underline">Our Story</li>
					<li class="cursor-pointer hover:opacity-75 hover:underline">Contact Us</li>
					<li class="cursor-pointer hover:opacity-75 hover:underline">Privacy Policy</li>
					<li class="cursor-pointer hover:opacity-75 hover:underline">Refund Policy</li>
				</ul>
			</div>
			<div class="space-y-8">
				<h2 class="font-semibold text-lg text-green-900">Payment</h2>
				<div class="space-y-2">
					<img class="w-20 bg-gray-200 p-2 rounded-md border-1 border-gray-400" src="svg/GCash_logo.svg" alt="">
					<img class="w-20 bg-gray-200 p-2 rounded-md border-1 border-gray-400" src="svg/Maya_logo.svg" alt="">
					<img class="w-20 bg-gray-200 p-2 rounded-md border-1 border-gray-400" src="svg/PayPal.svg" alt="">
				</div>
			</div>
			<div class="space-y-8"> 
				<h2 class="font-semibold text-lg text-green-900">Social Media</h2>
				<div class="text-3xl text-green-800">
					<i class="fa-brands fa-instagram"></i>
					<i class="fa-brands fa-square-facebook"></i>
				</div>
			</div>
		</div>
	</footer>