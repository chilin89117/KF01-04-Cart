<?php
use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
  public function run()
  {
    User::create([
      'name' => 'Abbie M.',
      'email' => 'abbie@example.com',
      'password' => bcrypt('123456')
    ]);
  }
}
