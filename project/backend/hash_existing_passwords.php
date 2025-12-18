<?php

use Illuminate\Support\Facades\Hash;
use App\Models\User;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = User::all();
$count = 0;
foreach ($users as $user) {
    if (strpos($user->password, '$2y$') !== 0) {
        $user->password = Hash::make($user->password);
        $user->save();
        $count++;
    }
}
echo "Mots de passe hashés pour $count utilisateur(s).\n";