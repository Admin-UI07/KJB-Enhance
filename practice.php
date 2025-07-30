<?php

class cryptoConverter {
 public function __construct(public string $currencyCode) {}

 public function convert($amount) {
  $url = "http://cex.io/api/ticker/{$this->currencyCode}/USD";
  $apiResponse = file_get_contents($url);
  $data = json_decode($apiResponse, true);
  if ($url) {
   $currentPrice = $data['last'];
   return $amount * $currentPrice;
  }

  return false;
 }
}

$amount = 2;
$crypto = "BTC";

$converter = new cryptoConverter($crypto);
$result = $converter->convert($amount);

if (!$result) {
 echo "<h1>ERROR!</h1>";
 return;
}

echo "<h1>You have $result $crypto</h1>";

?>
