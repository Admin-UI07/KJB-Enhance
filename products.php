<?php include('dbadminconnection.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Products</title>
 <link rel="icon" href="img/KJB-Logo.webp">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 <link href="src/global.css" rel="stylesheet">
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

 <!-- Foods Section -->
 <?php
  $stmt = $pdo->query("SELECT * FROM food_products LIMIT 9");
  $food_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <section class="font-poppins w-full min-h-[576px] py-8 px-10 space-y-10">
  <div class="text-center">
   <h1 class="text-3xl font-semibold text-green-900">Foods</h1>
  </div>
  <?php if (!empty($food_result)): ?>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-8 max-w-[1400px] mx-auto">
   <?php foreach( $food_result as $foods ): ?>
   <a href="food-details.php?id=<?= htmlspecialchars($foods['id']); ?>">
    <div class="group flex items-center bg-[#B7EFC5] rounded-lg overflow-hidden shadow-md cursor-pointer border-b-3 border-green-800">
     <img class="w-24 h-24 md:w-31 md:h-31 object-cover object-center" src="foods_img/<?= htmlspecialchars($foods['image']) ?>" alt="">
     <div class="flex w-full flex-col sm:flex-row justify-start sm:justify-between px-5 md:px-7 font-poppins text-green-900 font-medium text-md md:text-xl">
      <p class="group-hover:underline"><?= htmlspecialchars($foods['name']) ?></p>
      <p>&#8369;<?= htmlspecialchars($foods['price']) ?></p>
     </div>
    </div>
   </a>
   <?php endforeach; ?>
  </div>
  <?php else: ?>
  <div class="flex items-center justify-center text-center h-100">
   <h2 class="font-poppins">No Products at the moment.</h2>
  </div>
  <?php endif; ?>
 </section>

 <!-- Non-Foods Section -->
 <?php
  $stmt = $pdo->query('SELECT * FROM non_food_products LIMIT 9');
  $non_food_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <section class="font-poppins w-full min-h-[576px] py-8 px-10 space-y-10">
  <div class="text-center">
   <h1 class="text-3xl font-semibold text-green-900">Non-Foods</h1>
  </div>
  <?php if (!empty($non_food_result)): ?>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-8 max-w-[1400px] mx-auto">
   <?php foreach( $non_food_result as $non_food ): ?>
   <a href="non-foods-details.php?id=<?= htmlspecialchars($non_food['id']); ?>">
    <div class="group flex items-center bg-[#B7EFC5] rounded-lg overflow-hidden shadow-md cursor-pointer border-b-3 border-green-900">
     <img class="w-24 h-24 md:w-31 md:h-31 object-cover object-center" src="foods_img/<?= htmlspecialchars($non_food['image']) ?>" alt="">
     <div class="flex w-full flex-col sm:flex-row justify-start sm:justify-between px-5 md:px-7 font-poppins text-green-900 font-medium text-md md:text-xl">
      <p class="group-hover:underline"><?= htmlspecialchars($non_food['name']) ?></p>
      <p>&#8369;<?= htmlspecialchars($non_food['price']) ?></p>
     </div>
    </div>
   </a>
   <?php endforeach; ?>
  </div>
  <?php else: ?>
  <div class="flex items-center justify-center text-center h-100">
   <h2 class="font-poppins">No Products at the moment.</h2>
  </div>
  <?php endif; ?>
 </section>

 <!-- FOOTER -->
 <?php include('footer.html'); ?>

</body>

</html>

<script src="src/navbar.js"></script>