<?php
declare(strict_types=1);

namespace App\Model;

use App\Model;

class User extends Model
{
   public function getAll(): array
   {
      $sql = "SELECT id, username, role
                FROM users;";
      return $this->db->runSQL($sql)->fetchAll();
   }


   public function get(int $id)
   {
      $sql = "SELECT id, username, role, password
                 FROM users
                WHERE id = :id;"; // SQL to get user
      return $this->db->runSQL($sql, [$id])->fetch(); // Return user
   }


   public function login(string $username, string $password)
   {
      $sql = "SELECT id, username, role, password 
                 FROM users 
                WHERE username = :username;"; // SQL to collect user data
      $user = $this->db->runSQL($sql, [$username])->fetch(); // Run SQL

      if (!$user) { // If no user found
         return false; // Return false
      } // Otherwise
      $authenticated = password_verify($password, $user['password']); // Did password match
      return ($authenticated ? $user : false); // Return whether password matched
   }


   // Create a new user
   public function create(array $user): bool
   {
      $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT); // Hash password
      try { // Try to add user
         $sql = "INSERT INTO users (username, role, password) 
                    VALUES (:username, :role, :password);"; // SQL to add user
         $this->db->runSQL($sql, $user); // Run SQL
         return true; // Return true
      } catch (\PDOException $e) { // If PDOException thrown
         if ($e->errorInfo[1] === 1062) { // If error indicates duplicate entry
            return false; // Return false to indicate duplicate name
         }
         throw $e; // Re-throw exception
      }
   }

   // Update an existing user
   public function update(array $user): bool
   {
      try { // Try to update user
         $sql = "UPDATE users 
                        SET username = :username, role = :role, password = :password
                      WHERE id = :id;"; // SQL to update user
         $this->db->runSQL($sql, $user); // Run SQL
         return true; // Return true
      } catch (\PDOException $e) { // If PDOException thrown
         if ($e->errorInfo[1] == 1062) { // If a duplicate (username in use)
            return false; // Return false
         } // Any other error
         throw $e; // Re-throw exception
      }
   }

   public function delete(int $id): bool
   {
      try {
         $sql = "DELETE FROM users
               WHERE id = :id;"; // SQL to delete 
         $this->db->runSQL($sql, [$id]); // Delete 
         return true; // It worked, return true
      } catch (\PDOException $e) { // If exception was thrown
         if ($e->errorInfo[1] === 1451) { // If error is integrity constraint
            return false;
         } else { // 
            throw $e;
         }
      }
   }

}