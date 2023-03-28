<?php

declare(strict_types=1);

include './functions.php';

// 1)
$employees = [
   [
      'first_name' => 'Mike',
      'last_name' => 'Toko',
      'place_of_employment' => 'Yaounde',
      'location' => 'Yaounde',
      'salary' => 20000
   ],
   [
      'first_name' => 'Jolie',
      'last_name' => 'Mvondo',
      'place_of_employment' => 'Douala',
      'location' => 'Yaounde',
      'salary' => 300000
   ],
   [
      'first_name' => 'Luc',
      'last_name' => 'Atangana',
      'place_of_employment' => 'Yaounde',
      'location' => 'Douala',
      'salary' => 450000
   ],
   [
      'first_name' => 'Manoah',
      'last_name' => 'Moumi',
      'place_of_employment' => 'Bafousssam',
      'location' => 'Douala',
      'salary' => 460000
   ],
   [
      'first_name' => 'Elisa',
      'last_name' => 'Mofou',
      'place_of_employment' => 'Yaounde',
      'location' => 'Yaounde',
      'salary' => 80000
   ]
];


// 2)
display_results(get_by_location('yaounde', $employees));
echo '<br/>';
// 3)
display_results(get_by_salary_range(400000, $employees));
echo '<br/>';
// 4)
display_results(get_by_highest_salary($employees));
echo '<br/>';
// 5)
echo calculate_average_salary($employees) . ' FCFA';