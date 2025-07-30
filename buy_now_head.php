<?php
	if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit_for_bnh'])) {
		$bnh_current_data = $pdo->query("SELECT * FROM buy_now_head LIMIT 1");
		$bnh_row = $bnh_current_data->fetch(PDO::FETCH_ASSOC);

		$bnh_product_name = !empty($_POST['product_name_for_bnh']) ? $_POST['product_name_for_bnh'] : $bnh_row['name'];
		$bnh_price = !empty($_POST['price_for_bnh']) ? $_POST['price_for_bnh'] : $bnh_row['price'];
		$bnh_discount_price = !empty($_POST['discount_price_for_bnh']) ? $_POST['discount_price_for_bnh'] : $bnh_row['discount_price'];
		$bnh_description = !empty($_POST['desc_for_bnh']) ? $_POST['desc_for_bnh'] : $bnh_row['description'];
		$bnh_image_name = $bnh_row['image'];

		if ($_FILES['image_for_buy_now_head']['error'] == 0) {
			$bnh_image_name = $_FILES['image_for_buy_now_head']['name'];
			$bnh_temp_name = $_FILES['image_for_buy_now_head']['tmp_name'];
			$bnh_folder = "img/" . $bnh_image_name;

			if (!file_exists('img')) {
				mkdir('img', 0777, true);
			}

			move_uploaded_file($bnh_temp_name, $bnh_folder);
		}

		$bnh_sql = "UPDATE buy_now_head SET
										image = :image,
										name = :name,
										price = :price,
										discount_price = :discount_price,
										description = :description
										LIMIT 1";

		$bnh_stmt = $pdo->prepare($bnh_sql);

		$bnh_stmt->execute([
			':image' => $bnh_image_name,
			':name' => $bnh_product_name,
			':price' => $bnh_price,
			':discount_price' => $bnh_discount_price,
			':description' => $bnh_description
		]);

		if ($bnh_stmt->rowCount() > 0) {
			$message = "Product updated successfully!";
		} else {
			$message = "Error updating product: " . implode(" ", $bnh_stmt->errorInfo());
		}
	}
?>
