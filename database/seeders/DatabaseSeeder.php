<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Posts;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Posts::truncate();
        // Category::truncate();

        $user = User::factory()->create([
            'name' => 'Ali Khan'
        ]);

        Posts::factory(5)->create([
            'user_id' => $user->id
        ]);
         

//         $user = User::factory()->create();

//         $personal = Category::create([
//             'name' => 'Personal',
//             'slug' => 'persoal'
//         ]);

//         $work = Category::create([
//             'name' => 'Work',
//             'slug' => 'work'
//         ]);

//         $family = Category::create([
//             'name' => 'Family',
//             'slug' => 'family'
//         ]);

//         Posts::create([
//             'user_id' => '$user->id',
//             'category_id' => '$family->id',
//             'title' => 'My Family Post',
//             'slug' => 'my-family-post',
//             'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
//             'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet sollicitudin mattis. Aliquam pretium fringilla porta. Donec a mi eget elit condimentum maximus. Nulla fringilla commodo purus. Maecenas pharetra tempus dolor eget vestibulum. Suspendisse porttitor, risus vel iaculis tristique, erat nulla consequat diam, sit amet cursus nisi felis ut nunc. Maecenas congue metus tristique, facilisis ipsum non, faucibus eros. Sed fringilla facilisis enim vitae sodales. Etiam libero metus, finibus quis laoreet sed, faucibus sit amet leo. Fusce pulvinar, nibh nec blandit dapibus, metus urna ultricies enim, ut porttitor ipsum libero et est. Vivamus gravida aliquet lectus.</p>'


//         ]);

//         Posts::create([
//             'user_id' => '$user->id',
//             'category_id' => '$work->id',
//             'title' => 'My Work Post',
//             'slug' => 'my-work-post',
//             'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ',
//             'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet sollicitudin mattis. Aliquam pretium fringilla porta. Donec a mi eget elit condimentum maximus. Nulla fringilla commodo purus. Maecenas pharetra tempus dolor eget vestibulum. Suspendisse porttitor, risus vel iaculis tristique, erat nulla consequat diam, sit amet cursus nisi felis ut nunc. Maecenas congue metus tristique, facilisis ipsum non, faucibus eros. Sed fringilla facilisis enim vitae sodales. Etiam libero metus, finibus quis laoreet sed, faucibus sit amet leo. Fusce pulvinar, nibh nec blandit dapibus, metus urna ultricies enim, ut porttitor ipsum libero et est. Vivamus gravida aliquet lectus.'

//         ]);



    }
}
