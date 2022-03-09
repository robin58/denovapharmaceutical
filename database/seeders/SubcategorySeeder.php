<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subcategories = [
            //Electromeso
            [
                'category_id' => 1,
                'name'        =>'Línea Kits Corporales',
                'slug'        => Str::slug('Línea Kits Corporales')
            ],
            [
                'category_id' => 1,
                'name'        =>'Línea Anticelulíticos',
                'slug'        => Str::slug('Línea Anticelulíticos')
            ],[
                'category_id' => 1,
                'name'        =>'Línea Moldeamiento Corporal',
                'slug'        => Str::slug('Línea Moldeamiento Corporal')
            ],[
                'category_id' => 1,
                'name'        =>'Línea Total Reduction',
                'slug'        => Str::slug('Línea Total Reduction')
            ],[
                'category_id' => 1,
                'name'        =>'Línea Reafirmante Anti-flacidez',
                'slug'        => Str::slug('Línea Reafirmante Anti-flacidez')
            ],[
                'category_id' => 1,
                'name'        =>'Línea Corporal Detox',
                'slug'        => Str::slug('Línea Corporal Detox')
            ],[
                'category_id' => 1,
                'name'        =>'Línea Glúteos',
                'slug'        => Str::slug('Línea Glúteos')
            ],[
                'category_id' => 1,
                'name'        =>'Línea Peptonas',
                'slug'        => Str::slug('Línea Peptonas')
            ],[
                'category_id' => 1,
                'name'        =>'Línea cuidado Piernas',
                'slug'        => Str::slug('Línea cuidado Piernas')
            ],[
                'category_id' => 1,
                'name'        =>'Línea Enzimas',
                'slug'        => Str::slug('Línea Enzimas')
            ],
            //Medicare
            [
                'category_id' => 2,
                'name'        =>'Línea Medicamentos',
                'slug'        => Str::slug('Línea Medicamentos')
            ],
            [
                'category_id' => 2,
                'name'        =>'Línea Dispositivos Médicos',
                'slug'        => Str::slug('Línea Dispositivos Médicos')
            ],
            //Personal Care
            [
                'category_id' => 3,
                'name'        =>'Línea Protección Solar',
                'slug'        => Str::slug('Línea Protección Solar')
            ],
            [
                'category_id' => 3,
                'name'        =>'Línea Body Care',
                'slug'        => Str::slug('Línea Body Care')
            ],
            //Formulas Magistrales
            [
                'category_id' => 4,
                'name'        =>'Formulas Magistrales',
                'slug'        => Str::slug('Formulas Magistrales')
            ],
            //Bioseguridad
            [
                'category_id' => 5,
                'name'        =>'Línea Sanitizante Manos',
                'slug'        => Str::slug('Línea Sanitizante Manos')
            ],
            [
                'category_id' => 5,
                'name'        =>'Línea Desifectante Ambientes y Superficies',
                'slug'        => Str::slug('Línea Desifectante Ambientes y Superficies')
            ]
        ];
        foreach ($subcategories as $subcategory) {

            Subcategory::factory(1)->create($subcategory);
        }
    }
}
