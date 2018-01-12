<?php

use App\Product;
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
        $product = new Product([
            'imagePath'=> 'https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg',
            'title'=> 'Harry Potter',
            'description'=> 'Super cool - at least as a child',
            'price'=> 20
        ]);
        $product->save();
        $product = new Product([
            'imagePath'=> 'https://ewedit.files.wordpress.com/2016/09/hpsorcstone.jpg?w=405',
            'title'=> 'Harry Potter2',
            'description'=> 'the beginnings!',
            'price'=>'15'
        ]);
        $product->save();
        $product = new Product([
            'imagePath'=> 'http://www.bookworldzambia.com/wp-content/uploads/2014/08/2.jpg',
            'title'=> 'Harry Potter3',
            'description'=> 'Whoops there\'s a snake!',
            'price'=> 30
        ]);
        $product->save();
        $product = new Product([
            'imagePath'=> 'https://s3.amazonaws.com/s3.plus.scholastic.com/uploads/cms/27/book/cover/496/HP_5_9ddeb27327.jpg',
            'title'=> 'Harry Potter4',
            'description'=> 'Some order of some kind',
            'price'=> 24
        ]);
        $product->save();
    }
}
