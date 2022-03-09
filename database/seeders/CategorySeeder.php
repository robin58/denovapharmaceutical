<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
           [
               'name' => 'Electromeso',
               'slug' => Str::slug('Electromeso'),
               'icon' => '<i class="fa-solid fa-person-simple"></i>'
           ],
            [
               'name' => 'Medicare',
               'slug' => Str::slug('Medicare'),
               'icon' => '<i class="fa-solid fa-face-viewfinder"></i>'
           ],
            [
               'name' => 'Personal Care',
               'slug' => Str::slug('Personal Care'),
               'icon' => '<i class="fa-duotone fa-person-running"></i>'
           ],
            [
               'name' => 'Formulas Magistrales',
               'slug' => Str::slug('Formulas Magistrales'),
               'icon' => '<i class="fa-light fa-vial"></i>'
           ],
            [
               'name' => 'Bioseguridad',
               'slug' => Str::slug('Bioseguridad'),
               'icon' => '<i class="fa-regular fa-face-smile-plus"></i>'
           ]
        ];

        foreach ($categories as $category){
            $category = Category::factory(1)->create($category)->first();

            $brands=Brand::factory(4)->create();

            foreach ($brands as $brand){
                $brand->categories()->attach($category->id);
            }
        }
    }
}
