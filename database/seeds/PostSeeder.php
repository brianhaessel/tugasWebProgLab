<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Category;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20)->create();

        $categories = Category::all();

        Post::all()->each(function ($post) use ($categories) {
            $post->categories()->attach(
                $categories->random(random_int(1, 3))->pluck('id')->toArray()
            );
        });

        $users = User::all();
        $faker = Faker\Factory::create();
        Post::all()->each(function ($post) use ($users, $faker) {
            $post->comments()->attach(
                random_int(1, $users->count()),
                [
                    'comment' => $faker->realText(10)
                ]
            );
        });
    }

}
