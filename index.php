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
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
 <link href="src/global.css" rel="stylesheet">
 <title>Kuya Jaypee Bigasan</title>
</head>
<body class="scrollbar-hide bg-lime-100">

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

 <section class="py-14 px-10 gap-y-6 flex flex-col justify-center items-center">
  <div class="flex flex-wrap gap-x-5 gap-y-5 image-and-buttons justify-center w-fit">
   <div class="object-cover buy-now-image w-90 h-90 lg:w-110 lg:h-110">
    <?php
     $bnh_select = $pdo->query("SELECT * FROM buy_now_head");
     $bnh_product = $bnh_select->fetch(PDO::FETCH_ASSOC);
    ?>
    <img class="h-full w-full object-cover object-center border-1 border-green-900 shadow-md" src="img/<?php echo $bnh_product['image'] ?>" alt="">
   </div>
   <div class="flex flex-col justify-between inputs-and-buttons w-90 lg:w-110">
    <div class="font-poppins item-title">
     <h1 class="font-bold text-3xl lg:text-5xl text-green-900"><?php echo $bnh_product['name'] ?></h1>
     <h2 class="font-semibold text-xl lg:text-3xl text-yellow-500">&#8369;<?php echo $bnh_product['price'] ?></h2>
     <h2 class="font-semibold text-lg lg:text-2xl text-yellow-600 line-through">&#8369;<?php echo $bnh_product['discount_price']?></h2>
    </div>
    <form class="flex flex-col gap-y-3 lg:gap-y-4" method="post" action="">
     <input class="lg:h-15 h-12 outline-none px-5 border-3 border-green-900 text-green-900 text-3xl font-poppins font-bold" type="number" name="rice-quantity" min="1" step="1" value="1">
     <input class="lg:h-15 h-12 cursor-pointer border-3 text-green-900 border-green-900 text-3xl font-semibold font-poppins" type="submit" name="add_to_cart" value="ADD TO CART">
     <input class="lg:h-15 h-12 cursor-pointer bg-green-900 text-green-100 font-poppins font-semibold text-3xl" type="submit" name="buy_now" value="BUY NOW">
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
   <h2 class="font-semibold text-3xl text-green-900">Featured Products</h2>
  </div>
  <div class="flex flex-wrap gap-6 justify-center">
   <?php
    $fp_stmt = $pdo->query("SELECT * FROM featured_product ORDER BY id ASC LIMIT 9");
    $fp_products = $fp_stmt->fetchAll(PDO::FETCH_ASSOC);
   ?>
   <!-- Product-Cards -->
   <?php foreach ($fp_products as $product): ?>
   <div class="bg-gray-100/30 backdrop-blur-lg p-3 w-90 font-poppins rounded-lg overflow-hidden shadow-md border-1">
    <img class="rounded-md w-full object-cover object-center h-60" src="img/<?= htmlspecialchars($product['image']) ?>" alt="">
    <div class="w-full space-y-3">
     <div class="flex flex-wrap justify-between items-start mt-3 gap-x-5">
      <h2 class="font-bold text-2xl text-green-900"><?= htmlspecialchars($product['name']) ?></h2>
      <div class="text-right">
       <h2 class="font-semibold text-xl text-yellow-700">&#8369;<?= htmlspecialchars($product['price']) ?></h2>
       <h2 class="font-semibold text-lg text-yellow-700 line-through">&#8369;<?= htmlspecialchars($product['discount_price']) ?></h2>
      </div>
     </div>
     <div class="w-full text-justify text-green-900 overflow-auto h-40 scrollbar-hide">
      <p><?= htmlspecialchars($product['description']) ?></p>
     </div>
     <div class="w-full text-right">
      <input class="rounded-md cursor-pointer bg-green-500 py-2 px-4 font-semibold text-green-950" type="button" value="ADD TO CART">
     </div>
    </div>
   </div>
   <?php endforeach; ?>
  </div>
 </section>

 <!-- TESTIMONIALS -->

 <section class="flex flex-col items-center p-10 space-y-8">
  <div class="font-poppins text-center">
   <h1 class="font-semibold text-3xl text-green-900">Testimonials</h1>
  </div>
  <div class="container swiper">
   <div class="card-wrapper max-w-[1200px] mb-10 mx-auto overflow-hidden py-5">
    <?php 
     $stmt = $pdo->query("SELECT * FROM testimonials ORDER BY id ASC LIMIT 10");
     $stml_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <ul class="card-list swiper-wrapper mx-auto">
     <?php foreach($stml_result as $testimonia): ?>
     <li class="swiper-slide card-item font-poppins">
      <div class=" shadow-md block bg-green-200 py-5 px-7 h-90 flex flex-col justify-between rounded-lg space-y-5">
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
 </section>

 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script src="src/index.js"></script>
</body>
</html>

