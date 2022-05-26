<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        // create permissions
        Permission::create(['name' => 'allrole']);

        $role1 = Role::create(['name' => 'super-admin']);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('allrole');

        $role3 = Role::create(['name' => 'admin-prov']);
        $role3->givePermissionTo('allrole');

        $role4 = Role::create(['name' => 'cabdin']);
        $role4->givePermissionTo('allrole');

        $role5 = Role::create(['name' => 'penilai']);
        $role5->givePermissionTo('allrole');

        $role6 = Role::create(['name' => 'guru']);
        $role6->givePermissionTo('allrole');




        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'username' => '123456789',
        ]);
        $user->assignRole([$role1->id]);


        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => '234567891',
        ]);
        $user->assignRole([$role2->id]);


        $user = \App\Models\User::factory()->create([
            'name' => 'Admin Provinsi',
            'email' => 'adminprov@gmail.com',
            'username' => '345678912',
        ]);
        $user->assignRole([$role3->id]);


        $user = \App\Models\User::factory()->create([
            'name' => 'Cabdin',
            'email' => 'cabdin@gmail.com',
            'username' => '456789123',
        ]);
        $user->assignRole([$role4->id]);


        $user = \App\Models\User::factory()->create([
            'name' => 'Penilai',
            'email' => 'penilai@gmail.com',
            'username' => '567891234',
        ]);
        $user->assignRole([$role5->id]);


        $user = \App\Models\User::factory()->create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'username' => '678912345',
        ]);
        $user->assignRole([$role6->id]);
    }
}
