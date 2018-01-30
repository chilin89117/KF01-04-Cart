<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('image');
      $table->float('price', 8, 2);
      $table->text('description');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('products');
  }
}
