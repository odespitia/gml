<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'document' => 1110515706,
            'email' => 'odespitia@gmail.com',
            'password' => Hash::make('1110515706'),
            'first_name' => 'Usuario',
            'last_name' => 'Prueba',
            'address' => 'Bogota',
            'movil' => '3102380000',
            'country' => 'CO',
            'status_id' => 1,
            'category_id'=> 3
        ]);
    }
}
