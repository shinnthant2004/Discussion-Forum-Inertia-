<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'name'=>'shinn thant',
           'email'=>'shinthant@gmail.com',
           'password'=>Hash::make('password'),
           'image'=>'images/profile/default.png'
       ]);

       Tag::create([
           'name'=>'Web Development',
           'slug'=>'web development'
       ]);

       Tag::create([
        'name'=>'Web Design',
        'slug'=>'web design'
       ]);

       Tag::create([
        'name'=>'Mobile Development',
        'slug'=>'mobile development'
       ]);

       Question::create([
           'user_id'=> 1,
           'title'=>'what is wrong with inertia',
           'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
       ]);

    }
}

