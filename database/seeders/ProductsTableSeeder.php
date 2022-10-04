<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Products();
        $product->name = 'Aeonium';
        $product->description = "Une belle plante pour votre intérieur.";
        $product->price_ht = 25;
        $product->picture = 'aeonium.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Aloe Vera';
        $product->description = "Une plante hydratante.";
        $product->price_ht = 28;
        $product->picture = 'aloevera.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Cactus';
        $product->description = "Une plante qui a du piquant !";
        $product->price_ht = 22;
        $product->picture = 'cactus.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Crassula';
        $product->description = "Une plante facile à entretenir.";
        $product->price_ht = 20;
        $product->picture = 'crassula.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Echeveria';
        $product->description = "Une plante célèbre que vous connaissez.";
        $product->price_ht = 23;
        $product->picture = 'echeveria.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Haworthia';
        $product->description = "Une plante qui a du style.";
        $product->price_ht = 27;
        $product->picture = 'haworthia.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Peperomia';
        $product->description = "Attention, rien à voir avec le pepperoni.";
        $product->price_ht = 24;
        $product->picture = 'peperomia.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Rhipsalis';
        $product->description = "Une plante dans un style touffu !";
        $product->price_ht = 30;
        $product->picture = 'rhipsalis.jpg';
        $product->save();

        $product = new Products();
        $product->name = 'Sedum Morganianum';
        $product->description = "Non ce n'est pas un sortilège.";
        $product->price_ht = 32;
        $product->picture = 'sedummorganianum.jpg';
        $product->save();
    }
}
