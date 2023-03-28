<?php

declare(strict_types=1);

include './functions.php';

$mssg = [
   'success' => null,
   'failure' => null,
]; // messages
$data = [];
$error = 0; // check if errors

$check_colors = []; // avoid duplicates in color palette

$inValidNumbers = array(); // to catch invalid numbers



if (isset($_GET['numbers'])) {
   $numbers = explode(',', $_GET['numbers']);

   $numbers = array_map('trim', $numbers);


   $numbers = array_filter($numbers, function ($num) { // remove empty string
      if (!empty($num)) {
         return $num;
      }
   });
   // echo '<pre>';
   // var_dump($numbers);
   // echo '</pre>';

   if (!empty($numbers)) {
      foreach ($numbers as $number) {
         if (!is_numeric($number)) {
            $error++; // increment error count
            array_push($inValidNumbers, $number);
         }
      }
      if ($error != 0) {
         $mssg['failure'] = 'invalid input : ' . implode(", ", $inValidNumbers) . ' please enter valid number(s)';
      } else {
         $data = array_merge($data, $numbers);
         $mssg['success'] = 'valid number(s) : ' . implode(", ", $numbers);
      }
   } else {
      $mssg['failure'] = 'empty input please try again';
   }

}
// echo numberColorStatus(1);



require_once './view.php';