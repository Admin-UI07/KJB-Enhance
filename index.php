<?php 

 include('dbadminconnection.php');

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
 <title>Kuya Jaypee Bigasan</title>
</head>
<body class="scrollbar-hide bg-lime-100">
	<div id="progress" class="fixed bottom-10 right-10 z-10 h-12 w-12 hidden place-items-center text-lg text-green-300 rounded-full cursor-pointer shadow-md">
		<span id="progress-value" class="block h-[calc(100%-15px)] w-[calc(100%-15px)] bg-green-700 grid place-items-center rounded-full">
			<i class="fa-solid fa-circle-arrow-up"></i>
		</span>
	</div>

 <!-- First Section -->

 <section class="relative bg-[url('img/header-bg.webp')] bg-cover h-240 bg-center z-0">
 
 <!-- Navbar Area -->

  <?php
   include('navbar.html');
  ?>

 <!-- Mobile View -->

 <div id="for-mobile-view" class="w-screen hidden md:hidden absolute bg-gray-400/30 backdrop-blur-sm -z-1">
  <ul class="flex flex-col font-poppins text-left text-xl/8 font-semibold text-green-950">
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-house"></i> Home</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-bowl-rice"></i> Products</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-comment"></i> Reviews</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-magnifying-glass"></i> Search</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-user"></i> User</li>
   <li class=" hover:text-blue-600 cursor-pointer px-5 py-2 border-b-1"><i class="fa-solid fa-cart-arrow-down"></i> Cart</li>
  </ul>
 </div>

 <!-- Header Title -->
 <div class="absolute flex flex-col gap-y-5 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 font-poppins text-center md:w-150 w-90 -z-2">
  <h1 class="text-5xl md:text-6xl font-bold text-amber-300 text-shadow-lg">Welcome to <span class="text-green-300">Kuya Jaypee</span> <span class="text-amber-300 underline">Bigasan!</span></h1>
  <div class="header-btn flex gap-x-3 mx-auto">
   <button class="rounded-lg hover:opacity-80 cursor-pointer py-1 px-2 md:py-3 md:px-5 border-2 border-green-200 font-semibold text-green-200">BE A MEMBER</button>
   <button class="rounded-lg hover:opacity-80 cursor-pointer py-1 px-3 md:py-3 md:px-8 border-2 border-green-200 bg-green-200 font-semibold text-green-800">BUY NOW</button>
  </div>
 </div>
 </section>

 <!-- BUY NOW -->

 <section id="block-appear" class="py-14 px-10 gap-y-6 flex flex-col justify-center items-center">
  <div class="flex flex-wrap gap-x-5 gap-y-5 image-and-buttons justify-center w-fit">
   <div class="object-cover buy-now-image sm:w-90 sm:h-90 lg:w-110 lg:h-110">
    <?php
     $bnh_select = $pdo->query("SELECT * FROM buy_now_head");
     $bnh_product = $bnh_select->fetch(PDO::FETCH_ASSOC);
    ?>
    <img class="h-full w-full object-cover object-center border-1 border-green-900 shadow-md" src="img/<?php echo $bnh_product['image'] ?>" alt="">
   </div>
   <div class="flex flex-col justify-between inputs-and-buttons w-[100%] sm:w-90 lg:w-110 gap-y-5">
    <div class="font-poppins item-title">
     <h1 class="font-bold text-3xl lg:text-5xl text-green-900"><?php echo $bnh_product['name'] ?></h1>
     <h2 class="font-normal text-xl lg:text-3xl text-green-800/90">&#8369;<?php echo $bnh_product['price'] ?></h2>
     <h2 class="font-normal text-lg lg:text-2xl text-gray-500/50 line-through">&#8369;<?php echo $bnh_product['discount_price']?></h2>
    </div>
    <form class="flex flex-col gap-y-3 lg:gap-y-4" method="post" action="">
     <input class="w-[100%] lg:h-15 h-12 outline-none px-5 border-3 border-green-900 text-green-900 text-3xl font-poppins font-bold" type="number" name="rice-quantity" min="1" step="1" value="1">
     <input class="w-[100%] lg:h-15 h-12 cursor-pointer border-3 text-green-900 border-green-900 text-3xl font-semibold font-poppins" type="submit" name="add_to_cart" value="ADD TO CART">
     <input class="w-[100%] lg:h-15 h-12 cursor-pointer bg-green-900 text-green-100 font-poppins font-semibold text-3xl" type="submit" name="buy_now" value="BUY NOW">
    </form>
   </div>
  </div>
  <div class="buy-now-desc font-poppins text-justify max-w-[740px] lg:max-w-[900px] space-y-3">
   <?php echo "<p>" . $bnh_product['description'] . "</p>" ?>
   <!-- <p>Discover the comforting taste of home with Sinandomeng Rice by Kuya Jaypee Bigasan – your trusted online source for premium bigas delivery in the Philippines! Known for its soft texture and clean, white grains, Sinandomeng Rice is a Filipino favorite that pairs perfectly with any ulam.</p>
   <p>Whether you're cooking for the family or preparing for a fiesta, Kuya Jaypee Bigasan ensures freshness and quality in every grain – delivered straight to your doorstep. With free delivery across Metro Manila and nearby provinces, enjoying authentic Filipino meals has never been easier.</p>
   <p>Savor tradition. Share every meal. Experience Sinandomeng Rice by Kuya Jaypee Bigasan.</p> -->
   
  </div>
 </section>

 <!-- Featured Products -->

	<section class="w-full py-14 px-10 space-y-10">
  <div class="featured-p-title font-poppins text-center">
   <h2 id="block-appear" class="font-semibold text-3xl text-green-900">Featured Products</h2>
  </div>
  <div class="flex flex-wrap gap-6 justify-center">
   <?php
    $fp_stmt = $pdo->query("SELECT * FROM featured_product ORDER BY id ASC LIMIT 9");
    $fp_products = $fp_stmt->fetchAll(PDO::FETCH_ASSOC);
   ?>
   <!-- Product-Cards -->
   <?php foreach ($fp_products as $product): ?>
   <div id="block-appear" class="bg-gray-100/30 backdrop-blur-lg p-3 w-90 font-poppins rounded-lg overflow-hidden shadow-md border-1">
    <img class="rounded-md w-full object-cover object-center h-60" src="img/<?= htmlspecialchars($product['image']) ?>" alt="">
    <div class="w-full space-y-3">
     <div class="flex flex-wrap justify-between items-start mt-3 gap-x-5">
      <h2 class="font-bold text-2xl text-green-900"><?= htmlspecialchars($product['name']) ?></h2>
      <div class="text-right">
       <h2 class="font-semibold text-xl text-yellow-700">&#8369;<?= htmlspecialchars($product['price']) ?></h2>
       <h2 class="font-semibold text-lg text-gray-500/50 line-through">&#8369;<?= htmlspecialchars($product['discount_price']) ?></h2>
      </div>
     </div>
     <div class="w-full text-justify text-green-900 overflow-auto h-40 scrollbar-hide">
      <p><?= htmlspecialchars($product['description']) ?></p>
     </div>
     <div class="grid grid-cols-3 gap-x-2 w-full">
      <div class="relative col-span-2">
       <select class="cursor-pointer py-2 px-3 border-1 focus:border-green-700 appearance-none outline-none w-full" name="" id="">
        <option value="">25kg</option>
        <option value="">75kg</option>
        <option value="">125kg</option>
       </select>
       <img class="-z-1 absolute right-3 top-1/2 -translate-y-1/2 w-[18px]" src="svg/down.svg" alt="">
      </div>
      <!-- <input class="py-1 col-span-2 px-3 border-1" type="number" min="1" value="1"> -->
      <!-- <input class="rounded-md cursor-pointer bg-green-400/30 backdrop-blur-lg font-semibold text-green-950 text-[18px] text-center" type="button" value="BUY"> -->
						<button class="rounded-md cursor-pointer bg-green-400/30 backdrop-blur-lg font-semibold text-green-950 text-[18px] text-center" type="button" value="BUY"><i class="fa-solid fa-cart-plus"></i></button>
     </div>
    </div>
   </div>
   <?php endforeach; ?>
  </div>
 </section>

 <!-- TESTIMONIALS -->

 <section id="block-appear" class="flex flex-col items-center p-10 space-y-8 min-h-[588px]">
  <div class="font-poppins text-center">
   <h1 class="font-semibold text-3xl text-green-900">Testimonials</h1>
  </div>
  <?php 
   $stmt = $pdo->query("SELECT * FROM testimonials ORDER BY id ASC LIMIT 10");
   $stml_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <?php if (!empty($stml_result)): ?>
  <div class="container swiper">
   <div class="card-wrapper max-w-[1200px] mb-10 mx-auto overflow-hidden py-5">
    <ul class="card-list swiper-wrapper mx-auto">
     <?php foreach($stml_result as $testimonia): ?>
     <li class="swiper-slide card-item font-poppins">
      <div class="cursor-grab shadow-md block bg-green-200 py-5 px-7 h-90 flex flex-col justify-between rounded-lg space-y-5">
       <h1 class="text-3xl font-semibold overflow-auto scrollbar-hide text-justify h-90 text-green-900">"<?= htmlspecialchars($testimonia['testimonial']) ?>"</h1>
       <h2 class="text-2xl font-medium text-blue-900">– <?= htmlspecialchars($testimonia['username']) ?></h2>
      </div>
     </li>
     <?php endforeach; ?>
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
  <?php else: ?>
  <div class="h-100 flex justify-center items-center">
   <h1>No Testimonials Available at the moment.</h1>
  </div>
  <?php endif; ?>
 </section>

 <!-- Sliding Images -->
 <?php 
  $stmt = $pdo->query("SELECT * FROM image_slider ORDER BY id ASC LIMIT 10");
  $image_slide_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $totalItems = count($image_slide_result);
 ?>
 <section id="block-appear" style="--totalItems: <?= $totalItems ?>" class="rice-img-slide-section min-h-[266.4px]">
  <?php if (!empty($image_slide_result)): ?>
  <div class="rice-img-slide-wrapper">
   <?php foreach($image_slide_result as $index => $img_item): ?>
   <img class="img-item" style="--i:<?= $index + 1 ?>" src="img/<?= htmlspecialchars($img_item['images']) ?>" alt="">
   <? endforeach; ?>
  </div>
  <?php else: ?>
  <div class="h-100 flex justify-center items-center">
   <h1>No images available at the moment.</h1>
  </div>
  <?php endif; ?>
 </section>

 <!-- Vision & Mission Statement -->
 <section class="flex justify-center p-10">
  <div class="max-w-[1300px] flex flex-wrap justify-center gap-10">
   <div id="block-appear" class="md:w-[500px] bg-green-300/20 p-8 space-y-4 rounded-xl">
    <h1 class="text-3xl md:text-5xl font-bold text-green-900">Our Vision</h1>
    <p class="md:text-2xl text-justify text-green-800">Our vision is to be the trusted name in the rice industry, providing every Filipino family with access to high-quality, affordable rice while empowering local farmers and promoting sustainable agriculture. We envision a future where our business contributes to a healthier, more food-secure nation, uplifting communities and fostering growth through dedication and integrity.</p>
   </div>
   <div id="block-appear" class="md:w-[500px] bg-green-300/20 p-8 space-y-4 rounded-xl">
    <h1 class="text-3xl md:text-5xl font-bold text-green-900">Our Mission</h1>
    <p class="md:text-2xl text-justify text-green-800">Our mission is to deliver exceptional rice products that meet the diverse needs of our customers, ensuring quality and affordability at every step. We are committed to supporting local farmers by fostering fair trade practices and sustainability while maintaining excellent customer service. Through innovation, community engagement, and a steadfast focus on social responsibility, we aim to create a lasting impact in the lives of our customers and stakeholders.</p>
   </div>
  </div>
 </section>

 <!-- How to cook a perfect rice. -->
 <section class="flex flex-col items-center p-10 space-y-8">
  <div id="block-appear" class="font-poppins text-center">
   <h1 class="font-semibold text-3xl text-green-900">How to cook a perfect rice?</h1>
  </div>
  <div class="flex flex-wrap justify-center max-w-[1400px] gap-10">
   <div id="block-appear-slide" class="flex items-center w-fit">
    <h2 class="bg-green-300 text-green-900 py-2 px-4 rounded-full font-bold">1</h2>
    <h3 class="font-bold text-green-800 hidden sm:block">=============</h3>
    <h3 class="font-bold text-green-800">===</h3>
    <div class="bg-green-200 md:w-110 p-3 rounded-md hover:bg-green-100 hover:shadow-md cursor-pointer">
     <h2 class="text-2xl text-green-900 font-bold">Rinse the Rice</h2>
     <p class="text-lg text-green-800">Rinse the rice under cold water 2–3 times until the water runs clear. This removes excess starch that causes rice to be sticky.</p>
    </div>
   </div>
   <div id="block-appear-slide" class="flex items-center w-fit">
    <h2 class="bg-green-300 text-green-900 py-2 px-4 rounded-full font-bold">2</h2>
    <h3 class="font-bold text-green-800 hidden sm:block">=============</h3>
    <h3 class="font-bold text-green-800">===</h3>
    <div class="bg-green-200 md:w-110 p-3 rounded-md hover:bg-green-100 hover:shadow-md cursor-pointer">
     <h2 class="text-2xl text-green-900 font-bold">Measure and Boil</h2>
     <p class="text-lg text-green-800">Add the rinsed rice and measured water to a pot. Add salt or oil if desired. Bring to a boil over medium-high heat uncovered.</p>
    </div>
   </div>
   <div id="block-appear-slide" class="flex items-center w-fit">
    <h2 class="bg-green-300 text-green-900 py-2 px-4 rounded-full font-bold">3</h2>
    <h3 class="font-bold text-green-800 hidden sm:block">=============</h3>
    <h3 class="font-bold text-green-800">===</h3>
    <div class="bg-green-200 md:w-110 p-3 rounded-md hover:bg-green-100 hover:shadow-md cursor-pointer">
     <h2 class="text-2xl text-green-900 font-bold">Simmer and Cover</h2>
     <p class="text-lg text-green-800">Once it starts boiling, reduce heat to low, cover with a tight-fitting lid, and simmer for:</p>
     <p class="text-lg text-green-800 ml-3">=> 15–18 minutes (for Sinandomeng or Jasmine rice)</p>
     <p class="text-lg text-green-800 ml-3">=> Until water is fully absorbed (no bubbling or visible water)</p>
    </div>
   </div>
   <div id="block-appear-slide" class="flex items-center w-fit">
    <h2 class="bg-green-300 text-green-900 py-2 px-4 rounded-full font-bold">4</h2>
    <h3 class="font-bold text-green-800 hidden sm:block">=============</h3>
    <h3 class="font-bold text-green-800">===</h3>
    <div class="bg-green-200 md:w-110 p-3 rounded-md hover:bg-green-100 hover:shadow-md cursor-pointer">
     <h2 class="text-2xl text-green-900 font-bold">Rest</h2>
     <p class="text-lg text-green-800">Turn off heat. Let the rice sit covered for 10 minutes. This step makes the rice fluffy.</p>
    </div>
   </div>
   <div id="block-appear-slide" class="flex items-center w-fit">
    <h2 class="bg-green-300 text-green-900 py-2 px-4 rounded-full font-bold">5</h2>
    <h3 class="font-bold text-green-800 hidden sm:block">=============</h3>
    <h3 class="font-bold text-green-800">===</h3>
    <div class="bg-green-200 md:w-110 p-3 rounded-md hover:bg-green-100 hover:shadow-md cursor-pointer">
     <h2 class="text-2xl text-green-900 font-bold">Fluff and Serve</h2>
     <p class="text-lg text-green-800">Fluff gently with a fork and serve hot.</p>
    </div>
   </div>
 </section> 

 <!-- EMAIL ADDRESS -->
 <section id="block-appear" class="flex flex-col items-center p-10 space-y-8">
  <div class="font-poppins text-center">
   <h1 class="font-semibold text-3xl text-green-900">Not ready to buy yet?</h1>
   <p>Enter your email to receive discounts.</p>
  </div>
  <div class="w-full md:w-150 outline-2 outline-green-600 rounded-tr-xl rounded-bl-xl overflow-hidden">
   <form method="post" class="grid grid-cols-1 md:grid-cols-3 font-poppins">
    <input class="col-span-2 h-12 px-3 outline-none bg-green-300/30" type="email" placeholder="Email Address" required>
    <button class="h-12 px-3 bg-green-600 cursor-pointer font-medium text-lg text-green-200" type="submit">Subscribe</button>
   </form>
  </div>
 </section>

	<!-- FOOTER -->
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
 
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script src="src/index.js"></script>
</body>
</html>