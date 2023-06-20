<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
          'name' => 'Kartu Nama',
          'quantity' => 10,
          'weight' => 200,
          'price' => 35000,
          'image' => 'https://source.unsplash.com/random/?name-card', // get the random photo of name card 
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
          ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
          in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur 
          sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
          mollit anim id est laborum.'
        ]);

        Product::create([
          'name' => 'Id Card',
          'quantity' => 20,
          'weight' => 100,
          'price' => 5000,
          'image' => 'https://source.unsplash.com/random/300×200/?id-card', // get the random photo of name card with specific size
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

    }
}
