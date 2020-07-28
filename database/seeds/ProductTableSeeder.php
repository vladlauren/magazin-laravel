<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath'=> 'https://static.cartepedia.ro/image/296458/harry-potter-si-camera-secretelor-vol2-produs_galerie_mare.jpg',
            'title'=> 'Harry Potter',
            'description'=>'O carte ce contine scene fantastice si personaje cu puteri',
            'price' => 10
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath'=> 'https://www.libris.ro/img/pozeprod/59/1002/F1/323927.jpg',
            'title'=> 'Povesti, Povestiri, Amintiri',
            'description'=>'Carte scrisa de Ion Creanga ce reflecta amintiri ',
            'price' => 30
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath'=> 'https://cdn.dc5.ro/img-prod/9789731352589-1790439-240.jpg',
            'title'=> 'Poezii',
            'description'=>'Carte scrisa de Mihai Eminesu, contine opere ale acestuia',
            'price' => 10
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath'=> 'https://cdn.dc5.ro/img-prod/9786066093651-2073369.jpg',
            'title'=> 'Stapanul Inelelor',
            'description'=>'Carte renumita, contine scene superbe si are personaje fantastice',
            'price' => 20
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath'=> 'https://upload.wikimedia.org/wikipedia/ro/thumb/4/40/Padurea_spanzuratilor_1922.jpg/200px-Padurea_spanzuratilor_1922.jpg',
            'title'=> 'Padurea Spanzuratilor',
            'description'=>'Carte scrisa de Liviu Rebreanu, contina o poveste',
            'price' => 40
        ]);
        $product->save();

    }
}
