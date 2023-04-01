# challenge-4 setup

1- Verify the code below to set up your local configurations inside the config.php file

```php
<?php

define('DEV', true); // In development or live? Development = true | Live = false
define('ROOT_FOLDER', 'public'); // Name of document root folder (e.g. public, content, htdocs)
define('VIEW_FOLDER', 'templates'); // Name of template root folder (e.g. views , templates)


$this_folder = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
$parent_folder = dirname($this_folder);
define("DOC_ROOT", $parent_folder . DIRECTORY_SEPARATOR . ROOT_FOLDER . DIRECTORY_SEPARATOR);

/// Database settings
define("DBHOST", "localhost");
define("TYPE", "mysql");
define("DBUSER", "root");
define("PORT", "3306");
define("DBPASS", "");
define("DBNAME", "challenge_4");
define("CHARSET", "utf8mb4");



// DO NOT CHANGE NEXT LINE
$dsn = TYPE . ":host=" . DBHOST . ";dbname=" . DBNAME . ";port=" . PORT . ";charset=" . CHARSET;
```

2- make sure to enter the sql file inside the challenge-4 folder in your database
