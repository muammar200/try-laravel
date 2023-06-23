<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
        [
            "title" => "Post 1",
            "slug" => "post-1",
            "author" => "Muammar",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui dolorem inventore possimus maiores necessitatibus facere repellendus quod suscipit sequi voluptatum provident facilis, praesentium deleniti sed dolore veritatis veniam ducimus atque numquam accusamus fugiat aut repellat natus non. Repellat, officia. Rem ad fugit alias assumenda, corporis nobis itaque porro provident beatae?"
        ],
        [
            "title" => "Post Imank",
            "slug" => "post-2",
            "author" => "Imank",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui dolorem inventore possimus maiores necessitatibus facere repellendus quod suscipit sequi voluptatum provident facilis, praesentium deleniti sed dolore veritatis veniam ducimus atque numquam accusamus fugiat aut repellat natus non. Repellat, officia. Rem ad fugit alias assumenda, corporis nobis itaque porro provident beatae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, quasi!  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus libero laudantium quae recusandae. Illo minima praesentium nobis repudiandae dignissimos a? Magni a fugiat omnis voluptas commodi aperiam quisquam neque minima." 
        ]
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        // $posts = self::$blog_posts;
        // ::self untuk properti static, self ::static untuk method static
        $posts = static::all();

        // $post = [];
        // foreach($posts as $p){
        //     if($p["slug"] === $slug){
        //         $post = $p;
        //     }
        // }

        // Dengan menggunakan collection, kode looping seperti di atas tidak diperlukan lagi. Di bawah adalah penerapannya

        // dengan menggunakan method yang ada pada collection, dapat lebih memudahkan pencarian data. Seperti di bawah menggunakan firstWhere(), yang mempunyai parameter slug dan parameter berikutnya adalah nilai yang ditangkap oleh function find yang dikirim melalui routes\web.php, dan kemudian dicocokkan data yang mana yang memiliki slug yang sama.
        return $posts->firstWhere('slug', $slug);
    }
}
