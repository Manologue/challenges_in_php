<?php
function redirect(string $location, array $parameters = [], $response_code = 302)
{
   $qs = $parameters ? '?' . http_build_query($parameters) : ''; // Create query string
   $location = $location . $qs; // Create new path
   header('Location: ' . DOC_ROOT . $location, $response_code); // Redirect to new page
   exit; // Stop code
}

function html_escape($text): string
{
   $text = $text ?? '';
   return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false); // Return escaped string
}