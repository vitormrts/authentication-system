<?php

// Fill in the information according to your database
$localhost = 'host_example';
$name = 'name_example';
$user = 'user_example';
$password = 'password_example';

putenv('DB_HOST=' . $localhost);
putenv('DB_NAME=' . $name);
putenv('DB_USER=' . $user);
putenv('DB_PASS=' . $password);