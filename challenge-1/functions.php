<?php

declare(strict_types=1);


function get_by_location(string $location, array $employees): array
{

   $filter_by_location = array_filter($employees, function ($array) use ($location) {
      if (strtolower($array['location']) === strtolower($location)) {
         return $array;
      }
   });
   return $filter_by_location;
}

function get_by_salary_range(float $salary, array $employees): array
{
   $filter_by_salary = array_filter($employees, function ($array) use ($salary) {
      if ($array['salary'] > $salary) {
         return $array;
      }
   });
   return $filter_by_salary;
}

function get_by_highest_salary(array $employees): array
{
   // $array = array();
   $salary_amount = 0;
   $array = array();
   foreach ($employees as $employee) {
      if ($employee['salary'] >= $salary_amount) {
         if ($employee['salary'] != $salary_amount) {
            $array = []; // empty array
         }
         $array[] = array_merge($array, $employee);
         $salary_amount = $employee['salary'];
      }
   }
   return $array;
}

function calculate_average_salary(array $employees): float
{
   $total_salary = 0;
   $total_workers = sizeof($employees);
   foreach ($employees as $employee) {
      $total_salary += $employee['salary'];
   }

   $average = $total_salary / $total_workers;

   return $average;
}


function display_results(array $array_list): void
{
   $output = '';

   if (empty($array_list)) {
      echo 'empty list';
   }

   foreach ($array_list as $list) {
      $output .= "
      <table>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Location</th>
        <th>Place of employment</th>
        <th>Salary</th>
      </tr>
      <tr>
        <td>{$list['first_name']}</td>
        <td>{$list['last_name']}</td>
        <td>{$list['location']}</td>
        <td>{$list['place_of_employment']}</td>
        <td>{$list['salary']}</td>
      </tr>
      </table>
    ";
   }
   echo $output;
}