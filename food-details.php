<?php 

include('dbadminconnection.php');

if (!isset($_GET['id'])) {
 die('Product not found');
}

$id = intval($_GET['id']);

$food_db = $pdo->prepare("SELECT * FROM food_products WHERE id = ?");
$food_db->execute([$id]);

if (empty($food_db)) {
 die('Product not found');
}

$food_reslt = $food_db->fetch(PDO::FETCH_ASSOC);

// var_dump($food_reslt);

$text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt eveniet sequi quasi veniam, ea voluptate dolor libero qui fugit quis unde quia voluptatibus error non iusto tenetur dignissimos velit officiis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt eveniet sequi quasi veniam, ea voluptate dolor libero qui fugit quis unde quia voluptatibus error non iusto tenetur dignissimos velit officiis.";

$length = 180;

$isLong = strlen($text) > $length;

$preview = $isLong ? substr($text, 0, $length) . "..." : $text;

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
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
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
    <img class="rounded-lg h-full w-full object-cover object-center border-1 border-green-900 shadow-md" src="img/<?php echo $food_reslt['image'] ?>" alt="">
   </div>
   <div class="flex flex-col justify-between inputs-and-buttons w-[100%] sm:w-90 lg:w-110 gap-y-5">
    <div class="font-poppins item-title">
     <h1 class="font-bold text-3xl lg:text-5xl text-green-900"><?php echo $food_reslt['name'] ?></h1>
     <h2 class="font-normal text-xl lg:text-3xl text-green-800/90">&#8369;<?php echo $food_reslt['price'] ?></h2>
    </div>
    <form class="flex flex-col gap-y-3 lg:gap-y-4" method="post" action="">
					<div class="grid grid-cols-2 gap-3">
						<input class="rounded-lg w-[100%] lg:h-15 h-12 outline-none px-5 border-3 border-green-900 text-green-900 text-3xl font-poppins font-semibold" type="number" name="rice-quantity" min="1" step="1" value="1">
						<div class="relative">
							<select class="rounded-lg w-[100%] lg:h-15 h-12 outline-none px-3 border-3 border-green-900 text-green-900 text-2xl font-poppins font-semibold cursor-pointer appearance-none" name="" id="">
								<option value="25">25kg</option>
								<option value="75">75kg</option>
								<option value="125">125kg</option>
							</select>
							<img class="-z-1 absolute right-3 top-1/2 -translate-y-1/2 w-[18px]" src="svg/down.svg" alt="">
						</div>
					</div>
     <input class="rounded-lg w-[100%] lg:h-15 h-12 cursor-pointer border-3 text-green-900 border-green-900 text-3xl font-semibold font-poppins" type="submit" name="add_to_cart" value="ADD TO CART">
     <input class="rounded-lg w-[100%] lg:h-15 h-12 cursor-pointer bg-green-900 text-green-100 font-poppins font-semibold text-3xl" type="submit" name="buy_now" value="BUY NOW">
    </form>
   </div>
  </div>
  <div class="buy-now-desc font-poppins text-justify max-w-[740px] lg:max-w-[900px] space-y-3">
   <?php echo "<p>" . $food_reslt['description'] . "</p>" ?>
  </div>
 </section>

 <section class="w-full font-poppins flex justify-center">
  <div class="w-full bg-[#C6F7BB] relative">
   <div class="flex justify-center px-8 py-5 border-b-2 border-green-800">
    <div class="flex justify-between w-[1500px]">
     <h2>Customer reviews (2.5k)</h2>
     <h2>See More ></h2>
    </div>
   </div>
   <div class="w-full px-8">
    <div class="container swiper">
     <div class="card-wrapper max-w-[1300px] mb-10 mx-auto overflow-hidden py-5">
      <ul class="card-list swiper-wrapper mx-auto">
       <li class="swiper-slide card-item font-poppins">
        <div class="cursor-grab shadow-md block bg-[#F3FDF0] py-5 px-7 min-h-80 flex flex-col justify-between rounded-lg space-y-5">
         <div class="space-y-2">
          <h2 class="text-xl font-medium">Juan Dela Cruz</h2>
          <div class="text-green-700">
           <i class="fa-solid fa-star"></i>
           <i class="fa-solid fa-star"></i>
           <i class="fa-solid fa-star"></i>
           <i class="fa-solid fa-star"></i>
           <i class="fa-solid fa-star"></i>
          </div>
         </div>
         <p>
          <?= htmlspecialchars($preview); ?>
          <? if ($isLong): ?>
           <a href="#" id="myModal" class="font-semibold">See More</a>
          <? endif; ?>
         </p>
        </div>
       </li>
      </ul>

      <div class="swiper-button-prev">
       <i class="text-green-400 opacity-0 2xl:opacity-100 fa-solid fa-circle-arrow-left"></i>
      </div>
      <div class="swiper-button-next">
       <i class="text-green-400 opacity-0 2xl:opacity-100 fa-solid fa-circle-arrow-right"></i>
      </div>
      <div class="swiper-pagination block 2xl:hidden"></div>
     </div>
    </div>
   </div>
   <div id="" class="-bottom-5 left-1/2 -translate-x-1/2 absolute bg-green-700 w-50 text-center h-10 flex items-center justify-center rounded-lg">
    <h2 class="text-green-200 font-semibold">Write a Review</h2>
   </div>
  </div>
 </section>

 <!-- Modal -->
 <section id="mainModal" class="font-poppins hidden justify-center items-center bg-gray-400/70 backdrop-blur-xs fixed w-full h-full top-0 left-0 z-10">
  <div class="relative overflow-auto scrollbar-hide space-y-8 bg-green-100 max-h-100 sm:max-h-200 sm:w-150 p-8 rounded-lg mx-5 shadow-md">
   <div class="space-y-2">
    <h2 class="text-xl font-medium">Juan Dela Cruz</h2>
    <div class="text-green-700">
     <i class="fa-solid fa-star"></i>
     <i class="fa-solid fa-star"></i>
     <i class="fa-solid fa-star"></i>
     <i class="fa-solid fa-star"></i>
     <i class="fa-solid fa-star"></i>
    </div>
   </div>
   <p class="text-justify w-full h-full">
    <?= htmlspecialchars($text); ?>
   </p>
   <span id="closeModal" class="cursor-pointer absolute top-3 right-5 text-3xl font-semibold">&times;</span>
  </div>
 </section>

 <!-- Write a Review -->

 <!-- Footer -->
 <?php include('footer.html'); ?>

</body>

</html>

<script src="src/navbar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="src/modal.js"></script>
<script src="src/swiper.js"></script>