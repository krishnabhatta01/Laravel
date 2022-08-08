<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* \App\Models\User::factory(5)->create(); */

        $user=User::factory()->create([
            'name'=>'john Doe',
            'email'=>'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        /* Listing::create([
            
            'title' => 'First title',
            'tags' => 'Laravel, PHP',
            'company' => 'Rise of code',
            'location' => 'Kathmandu',
            'email' => 'email@gmail.com',
            'website' => 'https://www.youtube.com',
            'description' => 'Invidunt stet est dolor elitr erat kasd sea stet vero clita, dolores erat sadipscing consetetur eos kasd clita, sit dolor.',
        ]);

        Listing::create([

            'title' => 'second title',
            'tags' => 'puthon, django',
            'company' => 'ABC',
            'location' => 'pokhara',
            'email' => 'example@gmail.com',
            'website' => 'https://www.facebook.com',
            'description' => 'Invidunt stet est dolor elitr erat kasd sea stet vero clita, dolores erat sadipscing consetetur eos kasd clita, sit dolor.',
        ]); */
    }
}
