<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post1 = new Post();
        $post1->type="Announcement";
        $post1->title="Opening of School";
        $post1->description="Term one opens on 1st semptember";
        $post1->image_uploaded="opening.jpg";
        $post1->user_id=1;
        $post1->save();

        $post2 = new Post();
        $post2->type="Announcement";
        $post2->title="Closing of School";
        $post2->description="Term one closes on 30th July";
        $post2->image_uploaded="closing.jpg";
        $post2->user_id=1;
        $post2->save();


        $post3 = new Post();
        $post3->type="Gallery";
        $post3->title="Students admitted";
        $post3->description="Students queing for admissions";
        $post3->image_uploaded="admissions.jpg";
        $post3->user_id=1;
        $post3->save();

    }
}
