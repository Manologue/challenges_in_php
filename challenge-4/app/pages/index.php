<?php
declare(strict_types=1);

use App\Model\User;


$usersModel = new User();
$success = $_GET['success'] ?? null; // Get success message

$users = $usersModel->getAll();








include APP_ROOT . '/templates/index.php';