<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        // User::create([
        //     'name' => 'Muammar',
        //     'username' => 'muammar',
        //     'email' => 'ammar@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // User::create([
        //     'name' => 'Test User',
        //     'email' => 'test2@example.com',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        Category::create([
            'name' => 'Cloud Computing',
            'slug' => 'cloud-computing',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        // Post::factory(100)->create();

        // Post::create([
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis ducimus quidem natus ullam labore cum quibusdam repellat eius est animi!',
        //     'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis ducimus quidem natus ullam labore cum quibusdam repellat eius est animi! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime excepturi suscipit provident impedit earum aliquid amet hic tempore a aperiam. Accusamus quibusdam vero rem ratione nam, totam sed saepe quidem, sunt tenetur ut accusantium, asperiores tempora eum quas inventore iure natus temporibus suscipit magnam voluptate libero? Ipsam, nostrum sint voluptatibus aspernatur aperiam officia officiis obcaecati repellendus quos voluptas reprehenderit eligendi id pariatur quo ex corporis eum possimus recusandae. Vel illo quod architecto expedita explicabo eaque esse corrupti voluptatem illum doloribus?'
        // ]);
        // Post::create([
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis ducimus quidem natus ullam labore cum quibusdam repellat eius est animi!',
        //     'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis ducimus quidem natus ullam labore cum quibusdam repellat eius est animi! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime excepturi suscipit provident impedit earum aliquid amet hic tempore a aperiam. Accusamus quibusdam vero rem ratione nam, totam sed saepe quidem, sunt tenetur ut accusantium, asperiores tempora eum quas inventore iure natus temporibus suscipit magnam voluptate libero? Ipsam, nostrum sint voluptatibus aspernatur aperiam officia officiis obcaecati repellendus quos voluptas reprehenderit eligendi id pariatur quo ex corporis eum possimus recusandae. Vel illo quod architecto expedita explicabo eaque esse corrupti voluptatem illum doloribus?'
        // ]);
        // Post::create([
        //     'user_id' => 2,
        //     'category_id' => 2,
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis ducimus quidem natus ullam labore cum quibusdam repellat eius est animi!',
        //     'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis ducimus quidem natus ullam labore cum quibusdam repellat eius est animi! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime excepturi suscipit provident impedit earum aliquid amet hic tempore a aperiam. Accusamus quibusdam vero rem ratione nam, totam sed saepe quidem, sunt tenetur ut accusantium, asperiores tempora eum quas inventore iure natus temporibus suscipit magnam voluptate libero? Ipsam, nostrum sint voluptatibus aspernatur aperiam officia officiis obcaecati repellendus quos voluptas reprehenderit eligendi id pariatur quo ex corporis eum possimus recusandae. Vel illo quod architecto expedita explicabo eaque esse corrupti voluptatem illum doloribus?'
        // ]);
    }
}

