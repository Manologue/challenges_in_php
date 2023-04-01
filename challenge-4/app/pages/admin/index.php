<?php
declare(strict_types=1);

use App\Model\User;
use App\Session\Session;
use App\Validate\Validate;

if (Session::action()->role !== 'admin') {
   redirect('index');
}

$userModel = new User();
$success = $_GET['success'] ?? null; // Get success message

$user = [
   'username' => '',
   'password' => '',
   'role' => 'subscriber', //default
];

$errors = [
   'username' => '',
   'password' => '',
   'warning' => ''

];

if (isset($_POST['add'])) {
   $user['username'] = $_POST['username'];
   $user['password'] = $_POST['password'];
   $user['role'] = $_POST['role'];

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
         $success = $user['username'] . 'added successfully';
      }

   }

}

if (isset($_POST['delete'])) {
   $user_id = (int) $_POST['id'];
   $deleted = $userModel->delete($user_id);
   if ($deleted) {
      $success = 'user with id ' . $user_id . ' deleted successfully';
   } else {
      $errors['warning'] = 'failed to delete please try again';
   }
}



$users = $userModel->getAll();




include APP_ROOT . '/templates/admin/index.php';