<?php
declare(strict_types=1);

use App\Session\Session;
use App\Model\User;
use App\Validate\Validate;

if (Session::action()->role !== 'public') {
   redirect('index');
}

$userModel = new User();


$user = [
   'username' => '',
   'password' => ''
];

$errors = [
   'username' => '',
   'password' => '',
   'warning' => ''
];


if (isset($_POST['login'])) {
   $user['username'] = $_POST['username']; // Get username address
   $user['password'] = $_POST['password']; // Get password

   $errors['username'] = Validate::isText($user['username'], 1, 255)
      ? '' : 'Please enter a username between 1 and 255 characters';
   $errors['password'] = Validate::isPassword($user['password'])
      ? '' : 'Password is empty';


   $invalid = implode($errors); // Join errors

   if ($invalid) { // If data is not valid
      $errors['warning'] = 'Please try again.'; // Store error message
   } else { // If data was valid
      $user = $userModel->login($user['username'], $user['password']);

      if ($user) {
         Session::action()->create($user); // Create session
         if ($user['role'] !== 'admin') {
            redirect('index');
         } else {
            redirect('admin/index');
         }
      } else {
         $errors['warning'] = 'wrong credentials please try again.'; // Store error message
      }
   }
}







include APP_ROOT . '/templates/login.php';