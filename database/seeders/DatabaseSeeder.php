<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('public/categories'); // Elimina la carpeta
        Storage::deleteDirectory('public/subcategories'); // Elimina la carpeta
        Storage::deleteDirectory('public/products');

        Storage::makeDirectory('public/categories'); // Vuelve a crear la carpeta: products
        Storage::makeDirectory('public/subcategories'); // Vuelve a crear la carpeta: products
        Storage::makeDirectory('public/products');

        // LLamadas a Seeder
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
