<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $permissions = [

                'role create',
                'role edite',
                'role status',
                'category create',
                'category edite',
                'category delete',
                'post create',
                'post edite',
                'post delete',
                'user create',
                'user edite',
                'user ban',


            ];


            foreach($permissions as $permission){

               Permission::create(['name' => $permission]);

            }
    }
}
