<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cria o usuário comum
        $user = User::create([
            'name' => 'User Teste',
            'email' => 'user@teste.com',
            'password' => bcrypt('123456789'),
            'token' => '02020202',
            'status' => 1,
        ]);

        // Cria a role user
        $roleUser = Role::firstOrCreate(['name' => 'User']);

        // Define permissões limitadas
        $permissions = [
            'product-list',
            'product-create'
        ];

        foreach ($permissions as $permission) {
            $perm = Permission::where('name', $permission)->first();
            if ($perm) {
                $roleUser->givePermissionTo($perm);
            }
        }

        // Atribui a role user ao usuário
        $user->assignRole($roleUser);
    }
}
