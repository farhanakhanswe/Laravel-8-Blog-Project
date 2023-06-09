<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class HelperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('migrate:refresh');

        $user = User::factory()->count(1)->create(['password' => Hash::make('12345678')]); // Create test user of the app
        $latest_user = User::latest()->first();

        /* Generate posts using the factory for the user */

        $postCount = 2; // Number of posts to generate
        Post::factory()->count($postCount)->create(['user_id' => $latest_user->id]);

        /*
        if you want to seperately create factory posts using tinker use the following code:
             App\Models\Post::factory()->times(2)->create(['user_id' => 1]);   
        */
    }
}
