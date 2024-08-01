<?php

$connect = mysqli_connect( 
    "localhost", // Host
    "root", // Username
    "root", // Password
    "pet_adoption_portal" // Database
);

mysqli_set_charset( $connect, 'UTF8' );
