<?php

declare(strict_types=1);

use App\Session\Session;

Session::action()->delete(); // Call method to end session
redirect('index'); // Redirect to login page
