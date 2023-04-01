<?php

namespace App\Session;

class Session
{


   protected static $instance;

   public $id; // Store user's id
   public $username; // Store user's name
   public $role; // Store user's role

   public function __construct()
   { // Runs when object created
      session_start(); // Start, or restart, session
      $this->id = $_SESSION['id'] ?? 0; // Set id property of this object
      $this->username = $_SESSION['username'] ?? ''; // Set username property of this object
      $this->role = $_SESSION['role'] ?? 'public'; // Set role property of this object
   }

   // Create new session
   public function create($user)
   {
      session_regenerate_id(true); // Update session id
      $_SESSION['id'] = $user['id']; // Add user id to session
      $_SESSION['username'] = $user['username']; // Add username to session
      $_SESSION['role'] = $user['role']; // Add role to session
   }

   // Update existing session - alias for create()
   public function update($user)
   {
      $this->create($user); // Update data in session
   }

   public static function action(): Session
   {
      if (!self::$instance) {
         self::$instance = new self();
      }
      return self::$instance;
   }


   // Delete existing session
   public function delete()
   {
      $_SESSION = []; // Empty $_SESSION superglobal
      $param = session_get_cookie_params(); // Get session cookie parameters
      setcookie(
         session_name(),
         '',
         time() - 2400,
         $param['path'],
         $param['domain'],
         $param['secure'],
         $param['httponly']
      ); // Clear session cookie
      session_destroy(); // Destroy the session
   }
}