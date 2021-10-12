<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Cliente'
        ]);
        Category::create([
            'name' => 'Proveedor'
        ]);
        Category::create([
            'name' => 'Funcionario Interno'
        ]);
    }
}
