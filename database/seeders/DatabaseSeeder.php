<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Clear tables to avoid duplicate entries
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('likes')->truncate();
        DB::table('comments')->truncate();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Seed users
        $users = [
            [
                'id' => 1,
                'name' => 'Cheryl',
                'email' => 'cherylkong50@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$KqEzDKhL5cMeGOAxcqTj6OB/lqrqAwToZpmVuulJTM4JML88c37Ve',
                'remember_token' => null,
                'created_at' => '2025-03-15 21:31:15',
                'updated_at' => '2025-03-15 21:31:15',
                'is_admin' => 1
            ],
            [
                'id' => 2,
                'name' => 'test',
                'email' => 'teste@teste.com',
                'email_verified_at' => null,
                'password' => '$2y$10$7xP2gOfnuUNDp2v7LNLxO.0V4P3vGZW8VqLqR.ZLrFEOQt..SHjyW',
                'remember_token' => null,
                'created_at' => '2025-03-16 17:40:20',
                'updated_at' => '2025-03-16 17:40:20',
                'is_admin' => 0
            ],
            [
                'id' => 3,
                'name' => 'Justin 11',
                'email' => 'justinbieber@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$DiP0K18AgUv4V.3PFsyRyOk7lUoshstWu6qwPGUT5aOOLh73LS7YO',
                'remember_token' => 'wn558Z1B0ethfXez8sm6IAmSSfYlCthiqeQ1GOxg5zwn2VPIS5lDZL7hDqj4',
                'created_at' => '2025-03-21 22:54:29',
                'updated_at' => '2025-03-21 22:54:29',
                'is_admin' => 0
            ],
            [
                'id' => 4,
                'name' => 'Michelle',
                'email' => 'michelle@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$UQBO6YbfAmD1YFh1mrMVf.UH4CagKGxGlwmJP05OvrBOAP7A6HxVe',
                'remember_token' => null,
                'created_at' => '2025-03-22 21:02:11',
                'updated_at' => '2025-03-22 21:02:11',
                'is_admin' => 0
            ],
            [
                'id' => 5,
                'name' => 'Jamin',
                'email' => 'jamin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$776SWVEd./QJIrcbdTu6tuW99lTO1ogk0bY.WXM1QiqGytJeaGGJ2',
                'remember_token' => null,
                'created_at' => '2025-03-22 21:09:01',
                'updated_at' => '2025-03-22 21:09:01',
                'is_admin' => 0
            ],
            [
                'id' => 6,
                'name' => 'test',
                'email' => 'testtest@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$AQYdEnwtxTkh8rtKSDJRC.aXKDbyAD0HoB3Hym7nzNT256OHRivNO',
                'remember_token' => null,
                'created_at' => '2025-03-22 21:28:06',
                'updated_at' => '2025-03-22 21:28:06',
                'is_admin' => 0
            ],
            [
                'id' => 7,
                'name' => 'Lisa',
                'email' => 'lisa@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$JwAuhpUssFAlbRucg9jZY.CSKFXHUsI1AqLtOANEMcs/8Upa2bJT.',
                'remember_token' => null,
                'created_at' => '2025-03-22 21:41:28',
                'updated_at' => '2025-03-22 21:41:28',
                'is_admin' => 0
            ],
            [
                'id' => 8,
                'name' => 'test2',
                'email' => 'test2@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$GksEdyy7ruEl9PuE8672BOZ.PBcy18lTu4jVzqqt9/txcqS5ELn02',
                'remember_token' => null,
                'created_at' => '2025-03-22 21:45:55',
                'updated_at' => '2025-03-22 21:45:55',
                'is_admin' => 0
            ],
            [
                'id' => 9,
                'name' => 'Admin',
                'email' => 'admin@admin',
                'email_verified_at' => null,
                'password' => '$2y$10$8Kgv4Z6IegOe9xN86dutEOYu1icsu4anRQESHvpZZCm.2y78SB9wW',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'is_admin' => 1
            ]
        ];

        DB::table('users')->insert($users);

        // Seed posts
        $posts = [
            [
                'id' => 10,
                'slug' => 'the-day-boba-broke-her-leg',
                'title' => 'The Day Boba Broke Her Leg',
                'description' => 'A very adventurous Boba decided to take on a challenge one day in 2020 - which didn\'t end up very well. She jumped from 3 levels of stairs, and broke her leg. We rushed her to a vet. The vet said she needed surgery immediately. She ended up getting a metal piece attached to her leg - which is still in there to this day! The vet said that was the last piece available, and that we were very lucky, as it could\'ve ended up in a worse scenario.

We were worried sick about our little baby. She spent the night in the vet, and thankfully held out well throughout medical procedures. She was okay to go home the next day. Phew!

I want to emphasise to dog parents out there to make sure your furry buddies never think of themselves as cats! They! Are! Dogs! And unsurprisingly they don\'t take a fall well.',
                'image_path' => '67dd60568141f-Boba Broke Her Leg.jpg',
                'created_at' => '2025-03-21 12:49:26',
                'updated_at' => '2025-03-21 13:26:06',
                'user_id' => 1
            ],
            [
                'id' => 12,
                'slug' => 'weird-sleep-postures',
                'title' => 'Weird Sleep Postures',
                'description' => 'Ever turned your head around just to see your dog sleeping like he doesn\'t have any bones? That\'s my daily life. My dogs just can\'t seem to run out of ideas in terms of sleeping postures. I have no idea how the one in the picture\'s even comfy enough to drift off to sleepyland.',
                'image_path' => '67dd687bad3ba-Weird Sleep Postures.jpg',
                'created_at' => '2025-03-19 13:24:11',
                'updated_at' => '2025-03-19 13:24:11',
                'user_id' => 1
            ],
            [
                'id' => 13,
                'slug' => 'cuddles',
                'title' => 'Cuddles',
                'description' => '"Shhhhh go away hooman don\'t wake Boba up she\'s asleep"

Unbelievably this is the first time I\'ve seen my dogs cuddling to sleep and I pray to god everyday this happens again (alexa play Please Please Please by Sabrina Carpenter)',
                'image_path' => '67ddb00649048-Cuddles.jpg',
                'created_at' => '2025-02-18 18:29:26',
                'updated_at' => '2025-02-18 18:29:26',
                'user_id' => 1
            ],
            [
                'id' => 15,
                'slug' => 'guitarist-coming-through',
                'title' => 'Guitarist Coming Through',
                'description' => 'I saw a cute doggie outfit on Amazon the other day and I ABSOLUTELY had to get it. Pudding doesn\'t seem to love it as much as I do though.',
                'image_path' => '67df1c7010bf0-Guitarist Coming Through.jpg',
                'created_at' => '2025-03-06 15:32:16',
                'updated_at' => '2025-03-06 15:32:16',
                'user_id' => 1
            ],
            [
                'id' => 16,
                'slug' => 'happy-chinese-new-year',
                'title' => 'Happy Chinese New Year',
                'description' => 'A warm Chinese New Year from Pulabo to all you lovely people. We\'re so blessed for all the support and love. Please stay healthy and happy, and most importantly - continue to thrive through the new year!',
                'image_path' => '67df1ceab4daa-Happy Chinese New Year.jpg',
                'created_at' => '2025-01-29 20:26:18',
                'updated_at' => '2025-01-29 20:26:18',
                'user_id' => 1
            ],
            [
                'id' => 18,
                'slug' => 'smug',
                'title' => 'Smug',
                'description' => 'I have no idea what to write this picture of Pudding is just too cute that I had to share it. Peace out!',
                'image_path' => '67df1e8e14de1-test.jpg',
                'created_at' => '2025-03-11 20:33:18',
                'updated_at' => '2025-03-11 20:38:43',
                'user_id' => 1
            ],
            [
                'id' => 20,
                'slug' => 'car-rides',
                'title' => 'Car Rides',
                'description' => 'Latte loves climbing around the car. We have to grab on him like a seatbelt to make sure he doesn\'t fly away in case of an emergency.',
                'image_path' => '67df1fadb9250-Car Rides.jpg',
                'created_at' => '2025-03-22 20:38:05',
                'updated_at' => '2025-03-22 20:38:05',
                'user_id' => 1
            ]
        ];

        DB::table('posts')->insert($posts);

        // Seed comments
        $comments = [
            [
                'id' => 2,
                'user_id' => 1,
                'post_id' => 10,
                'content' => 'Boba is fine and healthy now thankfully, but the vet told us never to let her strain her injured leg too much so that\'s one thing to be careful of.',
                'created_at' => '2025-03-21 23:58:21',
                'updated_at' => '2025-03-21 23:58:21'
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'post_id' => 10,
                'content' => 'Thank you for all the support guys!',
                'created_at' => '2025-03-22 00:15:54',
                'updated_at' => '2025-03-22 00:15:54'
            ],
            [
                'id' => 5,
                'user_id' => 3,
                'post_id' => 12,
                'content' => 'He\'s just adorable!',
                'created_at' => '2025-03-22 01:03:35',
                'updated_at' => '2025-03-22 01:03:35'
            ],
            [
                'id' => 6,
                'user_id' => 3,
                'post_id' => 10,
                'content' => 'I\'m so glad she\'s fine now.',
                'created_at' => '2025-03-22 01:12:00',
                'updated_at' => '2025-03-22 01:12:00'
            ],
            [
                'id' => 7,
                'user_id' => 3,
                'post_id' => 20,
                'content' => 'Cheeky little boy 🤭',
                'created_at' => '2025-03-22 21:00:27',
                'updated_at' => '2025-03-22 21:00:27'
            ],
            [
                'id' => 8,
                'user_id' => 3,
                'post_id' => 16,
                'content' => 'Happy Chinese New Year! 🎉🧧',
                'created_at' => '2025-03-22 21:01:22',
                'updated_at' => '2025-03-22 21:01:22'
            ],
            [
                'id' => 9,
                'user_id' => 4,
                'post_id' => 16,
                'content' => 'Happy Chinese New Year 🧧🧧',
                'created_at' => '2025-03-22 21:02:48',
                'updated_at' => '2025-03-22 21:02:48'
            ],
            [
                'id' => 10,
                'user_id' => 4,
                'post_id' => 10,
                'content' => 'The poor little baby looks so traumatised.',
                'created_at' => '2025-03-22 21:03:26',
                'updated_at' => '2025-03-22 21:03:26'
            ],
            [
                'id' => 11,
                'user_id' => 4,
                'post_id' => 12,
                'content' => '100% relatable',
                'created_at' => '2025-03-22 21:03:50',
                'updated_at' => '2025-03-22 21:03:50'
            ]
        ];

        DB::table('comments')->insert($comments);

        // Seed likes
        $likes = [
            [
                'id' => 30,
                'created_at' => '2025-03-21 22:54:41',
                'updated_at' => '2025-03-21 22:54:41',
                'user_id' => 3,
                'post_id' => 12
            ],
            [
                'id' => 32,
                'created_at' => '2025-03-21 22:54:58',
                'updated_at' => '2025-03-21 22:54:58',
                'user_id' => 3,
                'post_id' => 13
            ],
            [
                'id' => 33,
                'created_at' => '2025-03-22 00:15:39',
                'updated_at' => '2025-03-22 00:15:39',
                'user_id' => 1,
                'post_id' => 10
            ],
            [
                'id' => 34,
                'created_at' => '2025-03-22 20:39:19',
                'updated_at' => '2025-03-22 20:39:19',
                'user_id' => 1,
                'post_id' => 18
            ],
            [
                'id' => 35,
                'created_at' => '2025-03-22 20:44:20',
                'updated_at' => '2025-03-22 20:44:20',
                'user_id' => 3,
                'post_id' => 16
            ],
            [
                'id' => 37,
                'created_at' => '2025-03-22 21:02:23',
                'updated_at' => '2025-03-22 21:02:23',
                'user_id' => 4,
                'post_id' => 13
            ],
            [
                'id' => 38,
                'created_at' => '2025-03-22 21:02:29',
                'updated_at' => '2025-03-22 21:02:29',
                'user_id' => 4,
                'post_id' => 16
            ],
            [
                'id' => 39,
                'created_at' => '2025-03-22 21:03:07',
                'updated_at' => '2025-03-22 21:03:07',
                'user_id' => 4,
                'post_id' => 10
            ],
            [
                'id' => 40,
                'created_at' => '2025-03-22 21:03:35',
                'updated_at' => '2025-03-22 21:03:35',
                'user_id' => 4,
                'post_id' => 12
            ],
            [
                'id' => 41,
                'created_at' => '2025-03-22 21:03:58',
                'updated_at' => '2025-03-22 21:03:58',
                'user_id' => 4,
                'post_id' => 20
            ],
            [
                'id' => 42,
                'created_at' => '2025-03-22 21:04:05',
                'updated_at' => '2025-03-22 21:04:05',
                'user_id' => 4,
                'post_id' => 15
            ],
            [
                'id' => 43,
                'created_at' => '2025-03-22 21:07:56',
                'updated_at' => '2025-03-22 21:07:56',
                'user_id' => 4,
                'post_id' => 18
            ],
            [
                'id' => 44,
                'created_at' => '2025-03-22 21:08:29',
                'updated_at' => '2025-03-22 21:08:29',
                'user_id' => 1,
                'post_id' => 15
            ],
            [
                'id' => 45,
                'created_at' => '2025-03-22 21:08:38',
                'updated_at' => '2025-03-22 21:08:38',
                'user_id' => 1,
                'post_id' => 16
            ],
            [
                'id' => 46,
                'created_at' => '2025-03-22 21:09:12',
                'updated_at' => '2025-03-22 21:09:12',
                'user_id' => 5,
                'post_id' => 10
            ],
            [
                'id' => 47,
                'created_at' => '2025-03-22 21:09:21',
                'updated_at' => '2025-03-22 21:09:21',
                'user_id' => 5,
                'post_id' => 15
            ],
            [
                'id' => 50,
                'created_at' => '2025-03-22 21:30:56',
                'updated_at' => '2025-03-22 21:30:56',
                'user_id' => 3,
                'post_id' => 20
            ],
            [
                'id' => 51,
                'created_at' => '2025-03-22 21:41:37',
                'updated_at' => '2025-03-22 21:41:37',
                'user_id' => 7,
                'post_id' => 10
            ],
            [
                'id' => 52,
                'created_at' => '2025-03-22 21:46:06',
                'updated_at' => '2025-03-22 21:46:06',
                'user_id' => 8,
                'post_id' => 10
            ],
            [
                'id' => 53,
                'created_at' => '2025-03-22 21:48:49',
                'updated_at' => '2025-03-22 21:48:49',
                'user_id' => 3,
                'post_id' => 10
            ]
        ];

        DB::table('likes')->insert($likes);
    }
}
