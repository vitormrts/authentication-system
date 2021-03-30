<?php

// Fill in the information according to your database
$localhost = 'localhost';
$name = 'system_login';
$user = 'root';
$password = 'Levelup@777';

putenv('DB_HOST=' . $localhost);
putenv('DB_NAME=' . $name);
putenv('DB_USER=' . $user);
putenv('DB_PASS=' . $password);