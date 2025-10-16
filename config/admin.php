<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin Credentials
    |--------------------------------------------------------------------------
    |
    | These are the default admin credentials for the HRIS system.
    | In a production environment, these should be stored securely
    | and retrieved from environment variables or a database.
    |
    */

    'username' => env('ADMIN_USERNAME', 'admin'),
    'password' => env('ADMIN_PASSWORD', 'admin123'),
    
    /*
    |--------------------------------------------------------------------------
    | Admin User Details
    |--------------------------------------------------------------------------
    */
    
    'name' => env('ADMIN_NAME', 'Admin User'),
    'role' => 'admin',
];
