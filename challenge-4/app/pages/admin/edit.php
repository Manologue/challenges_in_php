<?php
declare(strict_types=1);

use App\Model\User;
use App\Session\Session;
use App\Validate\Validate;

if (Session::action()->role !== 'admin') {
   redirect('index');
}

$userModel = new User();
$user = $userModel->get($id);

if ($user === false) { // if user does not exist
   redirect('admin/index');
}


$errors = [
   'username' => '',
   'password' => '',
   'warning' => ''

];

if (isset($_POST['update'])) {
   $data['id'] = $user['id'];
   $data['username'] = $_POST['username'];
   $data['password'] = $_POST['password'];
   $data['role'] = $_POST['role'];

   $errors['username'] = Validate::isText($user['username'], 1, 255)
      ? '' : 'Please enter a username between 1 and 255 characters';

   if (empty($data['password'])) {
      $data['password'] = $user['password'];
   } else {
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); // Hash password
   }

   $invalid = implode($errors);

   if ($invalid !== '') {
      $errors['warning'] = 'Please correct form errors';
   } else {
      $result = $userModel->update($data);
      if ($result === false) { // If result is false
         $errors['username'] = 'name already used'; // Store a warning
         $errors['warning'] = 'Please correct form error';
      } else {
         redirect('admin/index/', ['success' => 'Edited user ' . $user['id'] . ' successfully']);
      }
   }
}










include APP_ROOT . '/templates/admin/edit.php';