<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRolesSeeder extends Seeder
{
    public function run()
    {
        // Asignar rol de administrador al usuario con ID 1
        $user = User::find(1); // Reemplaza 1 con el ID del usuario que desees
        if ($user) {
            $user->assignRole('admin'); // O 'stock manager', 'flavor manager'
        }
    }
}
