<?php
declare(strict_types=1);




function numberColorStatus(float|string $num): array
{
   $num = (float) $num; // cascade value to float
   $prime = null;
   $even = null;


   if ($num != 1 && !is_decimal($num)) {
      $prime = check_prime($num);

      $even = check_even($num);
      // var_dump($prime, $even);
   }

   if ($prime !== null || $even !== null) {


      if ($prime && !$even) {
         return ['brown', 'prime && even numbers'];
      }
      if (!$prime && !$even) { // composite number
         return ['green', 'non-prime && odd numbers'];
      }

      if ($prime && $even) {
         return ['yellow', 'prime && even numbers'];
      }

      if (!$prime && $even) {
         return ['blue', 'non-prime && even numbers'];
      }
   }


   return ['black', 'decimal numbers'];

}

function is_decimal(int|float $val): bool
{
   return floor($val) != $val;
}



function check_prime(int|float $num): bool
{

   for ($i = 2; $i <= $num / 2; $i++) {
      if ($num % $i == 0) {
         return false;
      }
   }
   return true;
}

function check_even(int|float $num): bool
{
   if ($num % 2 == 0) {
      return true;
   }
   return false;
}