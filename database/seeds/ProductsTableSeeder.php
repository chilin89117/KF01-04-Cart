<?php
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
  public function run()
  {
    factory(App\Product::class, 100)->create();
  }
}
