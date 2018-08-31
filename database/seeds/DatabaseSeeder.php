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
        $profile = ['shanshan.jpg' , 'juejue.jpg' , 'koko.jpg'];
        $name = ['shanshan' , 'juejue' , 'koko'];
        $email = ['shanshan@gmail.com' , 'juejue@gmail.com' , 'koko@gmail.com'];
        $phone = ['09773457345','093643252435','09876283422'];
        $education = ['graduate', 'M.B.B.S', 'B.Sc'];
        $job = ['driver','Doctor','English Teacher'];
        $CurAction = ['Attending Repair car class','Training Junior','Sport in School'];
        $note = ['Power is Mind','Care is better than Treatment','Education is the light for life.'];
        $address = ['Thanlyin','MDY','YGN'];

        for ($i=0; $i < 3; $i++) {
          $user = new App\User();
          $user->profile = $profile[$i];
          $user->name = $name[$i];
          $user->email = $email[$i];
          $user->phone = $phone[$i];
          $user->education = $education[$i];
          $user->job = $job[$i];
          $user->CurAction = $CurAction[$i];
          $user->note = $note[$i];
          $user->address = $address[$i];
          $user->password = bcrypt('123456');
          $user->save();
        }


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
