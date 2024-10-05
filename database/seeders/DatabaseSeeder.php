<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(5)->create();
        $user=User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        Listing::factory(6)->create([
            'user_id' => $user
        ]);

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        /*Listing::create([
            'title'=> 'Laravel Senior developper',
            'tags' => 'laravel,js',
            'company'=>'laracomp',
            'location'=>'Antananarivo , Madagascar',
            'email'=>'test@example.com',
            'website'=>'http://website.example.com',
            'description'=>'lorem ipsum dolor sit amet, consectet ut labore et 
            json dfùqflùkqndùnkl'
        ]);

        Listing::create([
            'title'=> 'Laravel intermediate developper',
            'tags' => 'laravel,js',
            'company'=>'larame',
            'location'=>'Miarinarivo, Madagascar',
            'email'=>'test@example1.com',
            'website'=>'http://website.example1.com',
            'description'=>'lorem ipsum dolor sit amet, consectet ut labore et 
            json dfùqflùkqndùnkl'
        ]);
        */

    }
}
