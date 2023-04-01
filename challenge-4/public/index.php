<?php
include '../app/bootstrap.php'; // Setup file


// simple routing
$path = mb_strtolower($_SERVER['REQUEST_URI']); // Get path in lowercase
$path = substr($path, strlen(DOC_ROOT)); // Remove up to DOC_ROOT
$parts = explode('/', $path); // Split into array at /

if ($parts[0] != 'admin') { // If an admin page
   $page = $parts[0] ?: 'index'; // Page name (or use index)
   $id = $parts[1] ?? null; // Get ID (or use null)
} else { // If not an admin page
   $page = 'admin/' . ($parts[1] ?? 'index'); // Page name

   $id = $parts[2] ?? null; // Get ID
}
$id = filter_var($id, FILTER_VALIDATE_INT); // Validate ID

$php_page = APP_ROOT . '/app/pages/' . $page . '.php'; // Path to PHP page

if (!file_exists($php_page)) { // If page not in array
   $php_page = APP_ROOT . '/app/pages/404.php'; // Include page not found
}


include $php_page; // Include PHP file