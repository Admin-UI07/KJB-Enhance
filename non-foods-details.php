<?php 

include('dbadminconnection.php');

if (!isset($_GET['id'])) {
 die('Product not found');
}

$id = intval($_GET['id']);

$non_food_db = $pdo->prepare("SELECT * FROM non_food_products WHERE id = ?");
$non_food_db->execute([$id]);

if (empty($non_food_db)) {
 die('Product not found');
}

$non_food_reslt = $non_food_db->fetch(PDO::FETCH_ASSOC);

// var_dump($food_reslt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="icon" href="img/KJB-Logo.webp">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 <link href="src/global.css" rel="stylesheet">
 <title>Products</title>
</head>

<body class="bg-[#E2FCDC] h-screen scrollbar-hide">

 <section class="relative">
 
 <!-- Navbar Area -->

 <?php include('navbar-green.html'); ?>

 <!-- Mobile View -->

 <div id="for-mobile-view" class="w-screen hidden md:hidden bg-[#d6f5e0]/70 absolute z-1">
  <ul class="flex flex-col font-poppins text-left text-xl/8 font-semibold text-green-950">
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-house"></i> Home</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-bowl-rice"></i> Products</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-comment"></i> Reviews</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-magnifying-glass"></i> Search</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-user"></i> User</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-cart-arrow-down"></i> Cart</li>
  </ul>
 </div>
 </section>

 <!-- Food-Product -->
 <section class="py-14 px-10 gap-y-6 flex flex-col justify-center items-center">
  <div class="flex flex-wrap gap-x-5 gap-y-5 image-and-buttons justify-center w-fit">
   <div class="object-cover buy-now-image sm:w-90 sm:h-90 lg:w-110 lg:h-110">
    <img class="rounded-lg h-full w-full object-cover object-center border-1 border-green-900 shadow-md" src="foods_img/<?php echo $non_food_reslt['image'] ?>" alt="">
   </div>
   <div class="flex flex-col justify-between inputs-and-buttons w-[100%] sm:w-90 lg:w-110 gap-y-5">
    <div class="font-poppins item-title">
     <h1 class="font-bold text-3xl lg:text-5xl text-green-900"><?php echo $non_food_reslt['name'] ?></h1>
     <h2 class="font-normal text-xl lg:text-3xl text-green-800/90">&#8369;<?php echo $non_food_reslt['price'] ?></h2>
    </div>
    <form class="flex flex-col gap-y-3 lg:gap-y-4" method="post" action="">
					<div class="grid grid-cols-1 gap-3">
						<input class="rounded-lg w-[100%] lg:h-15 h-12 outline-none px-5 border-3 border-green-900 text-green-900 text-3xl font-poppins font-semibold" type="number" name="rice-quantity" min="1" step="1" value="1">
						<!-- <div class="relative">
							<select class="rounded-lg w-[100%] lg:h-15 h-12 outline-none px-3 border-3 border-green-900 text-green-900 text-2xl font-poppins font-semibold cursor-pointer appearance-none" name="" id="">
								<option value="25">25kg</option>
								<option value="75">75kg</option>
								<option value="125">125kg</option>
							</select>
							<img class="-z-1 absolute right-3 top-1/2 -translate-y-1/2 w-[18px]" src="svg/down.svg" alt="">
						</div> -->
					</div>
     <input class="rounded-lg w-[100%] lg:h-15 h-12 cursor-pointer border-3 text-green-900 border-green-900 text-3xl font-semibold font-poppins" type="submit" name="add_to_cart" value="ADD TO CART">
     <input class="rounded-lg w-[100%] lg:h-15 h-12 cursor-pointer bg-green-900 text-green-100 font-poppins font-semibold text-3xl" type="submit" name="buy_now" value="BUY NOW">
    </form>
   </div>
  </div>
  <div class="buy-now-desc font-poppins text-justify max-w-[740px] lg:max-w-[900px] space-y-3">
   <?php echo "<p>" . $non_food_reslt['description'] . "</p>" ?>
  </div>
 </section>

 <!-- Footer -->
 <?php include('footer.html'); ?>

</body>

</html>

<script src="src/navbar.js"></script>