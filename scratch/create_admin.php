<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::updateOrCreate(
    ['email' => 'admin@gmail.com'],
    [
        'name' => 'Administrator',
        'full_name' => 'Admin',
        'password' => Hash::make('123456'),
        'level' => 1
    ]
);
echo "Admin account created successfully.\n";
