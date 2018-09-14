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
        for ($i=0; $i < 7; $i++) {
          $post = new App\Model\ControlPanel\Post();
          $post->titlephoto = "title-photo.jpg";
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
        /*End category table အတြက္*/

        /*user table အတြက္*/
        $profile = ['shanshan.jpg' , 'juejue.jpg' , 'koko.jpg', 'minmin.jpg', 'kyawkyaw.jpg' ,'zawzaw.jpg', 'linlin.jpg' , 'wawa.jpg'];
        $name = ['shanshan' , 'juejue' , 'koko', 'minmin', 'kyawkyaw', 'zawzaw', 'linlin', 'wawa'];
        $email = ['shanshan@gmail.com' , 'juejue@gmail.com' , 'koko@gmail.com', 'minmin@gmail.com', 'kyawkyaw@gmail.com', 'zawzaw@gmail.com', 'linlin@gmail.com', 'wawa@gmail.com'];
        $phone = ['09773457345','093643252435','09876283422', '09773457345','093643252435','09876283422','0978757647','0946257635'];
        $education = ['graduate', 'M.B.B.S', 'B.Sc' ,'graduate', 'M.B.B.S', 'B.Sc','B.Sc'];
        $job = ['driver','Doctor','English Teacher','driver','Doctor','English Teacher','vet'];
        $CurAction = ['Attending Repair car class','Training Junior','Sport in School','Attending Repair car class','Training Junior','Sport in School','Tutor'];
        $note = ['Power is Mind','Care is better than Treatment','Education is the light for life.','Power is Mind','Care is better than Treatment','Education is the light for life.','Work is the main for building the life'];
        $address = ['Thanlyin','MDY','YGN','Thanlyin','MDY','YGN','MG'];

        for ($i=0; $i < 7; $i++) {
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
        /*End user table အတြက္*/



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
