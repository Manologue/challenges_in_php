<?php

$firstArray = [
   "field1" => "1",
   "field2" => "2",
   "field3" => "3",
   "field4" => "4",
   "field5" => "5",
   "field6" => "6",
];
$secondArray = [
   "field1value" => "dinosaur",
   "field2value" => "pig",
   "field3value" => "platypus",
   "field4value" => "toto",
   // "field5value" => "toto",
   // "field6value" => "toto",
   // "field7value" => "toto",
   // "field8value" => "toto"
];

$result = [];

$increment = 1;
foreach ($secondArray as $key => $value) {
   if (array_key_exists('field' . $increment, $firstArray)) {
      $field = $firstArray['field' . $increment];
      $result[$field] = $value;
      $increment++;

   } else {
      $result[$increment] = $value;
      $increment++;
   }
}
echo '<pre>';
var_dump($result);
echo '</pre>';