<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $adminPermissions = [];
        $userPermissions = [];

        $permissions = [

            'admin' => [
                ['name' => 'invite-user'],
                ['name' => 'create-user'],
                ['name' => 'edit-user'],
                ['name' => 'delete-user'],
                ['name' => 'create-project'],
                ['name' => 'edit-project'],
                ['name' => 'delete-project'],
                ['name' => 'view-all-projects'],
                ['name' => 'assign-user-project'],
                ['name' => 'create-issue'],
                ['name' => 'edit-issue'],
                ['name' => 'delete-issue'],
                ['name' => 'add-issue-comment'],
                ['name' => 'edit-issue-comment'],
                ['name' => 'delete-issue-comment'],
                ['name' => 'update-issue-status'],
                ['name' => 'upload-attachments'],

            ],
            'user' => [
                ['name' => 'edit-own-user'],
                ['name' => 'create-issue'],
                ['name' => 'add-issue-comment'],
                ['name' => 'edit-issue-comment'],
                ['name' => 'delete-issue-comment'],
                ['name' => 'update-issue-status'],
                ['name' => 'upload-attachments'],
                ['name' => 'view-assigned-projects']
            ]
        ];
    


        foreach ($permissions['admin'] as $adminPermission) {

            Permission::firstOrCreate($adminPermission);

            array_push($adminPermissions, $adminPermission);
        }

        foreach ($permissions['user'] as $userPermission) {


            Permission::firstOrCreate($userPermission);

            array_push($userPermissions, $userPermission);
        }

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('user'),
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        $adminRole->givePermissionTo($adminPermissions);
        $userRole->givePermissionTo($userPermissions);

        $admin->assignRole($adminRole);
        $user->assignRole($userRole);
    
    }

}
