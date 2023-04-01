<?php
declare(strict_types=1);

use App\Model\User;
use App\Session\Session;
use App\Validate\Validate;


$userModel = new User();

$user = [
   'username' => '',
   'password' => '',
   'role' => 'subscriber', // default
];

$errors = [
   'username' => '',
   'password' => '',
   'warning' => ''

];

if (isset($_POST['register'])) {
   $user['username'] = $_POST['username'];
   $user['password'] = $_POST['password'];

   $errors['username'] = Validate::isText($user['username'], 1, 255)
      ? '' : 'Please enter a username between 1 and 255 characters';
   $errors['password'] = Validate::isPassword($user['password'])
      ? '' : 'Password is empty';

   $invalid = implode($errors);

   if ($invalid !== '') {
      $errors['warning'] = 'Please correct form errors';
   } else {

      $result = $userModel->create($user);
      if ($result === false) { // If result is false
         $errors['username'] = 'name already used'; // Store a warning
         $errors['warning'] = 'Please correct form error';
      } else {
         Session::action()->create($user); // Create session
         redirect('index/', ['success' => 'Thanks for joining us! ' . $user['username']]);
      }

   }

}

include APP_ROOT . '/templates/register.php';