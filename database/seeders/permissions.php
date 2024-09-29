<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission  = new Permission();
        $permission->name = 'Categories';
        $permission->status = 0;
        $permission->save();

        $permission  = new Permission();
        $permission->name = 'Subcategories';
        $permission->status = 0;
        $permission->save();

        $permission  = new Permission();
        $permission->name = 'Products';
        $permission->status = 0;
        $permission->save();

        $permission  = new Permission();
        $permission->name = 'Enquries';
        $permission->status = 0;
        $permission->save();

        $permission  = new Permission();
        $permission->name = 'Contact Enquiries';
        $permission->status = 0;
        $permission->save();
    }
}
