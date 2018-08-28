<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /*post table အတြက္*/
        for ($i=0; $i < 3; $i++) {
          $post = new App\Model\ControlPanel\Post();
          $post->whatabout = $faker->sentence();
          $post->content = $faker->paragraph();
          $post->user_id = $i+1;
          $post->publish = '1';
          $post->save();
        }

        /*category table အတြက္*/
        $category = new App\Model\ControlPanel\Category();
        $category->name = 'Education';
        $category->save();
        $category = new App\Model\ControlPanel\Category();
        $category->name = 'Dhamma';
        $category->save();
        $category = new App\Model\ControlPanel\Category();
        $category->name = 'jQuery';
        $category->save();


        /*user table အတြက္*/
        $user = new App\User();
        $user->profile = 'shanshan.jpg';
        $user->name = 'shanshan';
        $user->email = 'shanshan@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user = new App\User();
        $user->profile = 'juejue.jpg';
        $user->name = 'juejue';
        $user->email = 'juejue@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user = new App\User();
        $user->profile = 'koko.jpg';
        $user->name = 'koko';
        $user->email = 'koko@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        /*post_categories table အတြက္*/
        $post_category = new App\Model\ControlPanel\post_category();
        $post_category->post_id = 1;
        $post_category->category_id = 1;
        $post_category->save();
        $post_category = new App\Model\ControlPanel\post_category();
        $post_category->post_id = 1;
        $post_category->category_id = 2;
        $post_category->save();
        $post_category = new App\Model\ControlPanel\post_category();
        $post_category->post_id = 2;
        $post_category->category_id = 1;
        $post_category->save();
        $post_category = new App\Model\ControlPanel\post_category();
        $post_category->post_id = 2;
        $post_category->category_id = 2;
        $post_category->save();
        // $this->call(UsersTableSeeder::class);
    }
}
