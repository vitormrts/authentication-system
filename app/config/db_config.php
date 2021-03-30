<?php

// Fill in the information according to your database
$localhost = '';
$name = '';
$user = '';
$password = '';

putenv('DB_HOST=' . $localhost);
putenv('DB_NAME=' . $name);
putenv('DB_USER=' . $user);
putenv('DB_PASS=' . $password);
