<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use HasFactory, Sluggable;

    // method sluggable
    // source : https://github.com/cviebrock/eloquent-sluggable

    // Ask ChatGPT
    //Kode di bawah merupakan fungsi yang mengembalikan sebuah array. Fungsi ini mungkin masih berhubungan dengan pembuatan slug untuk URL yang ramah mesin. Mari kita bahas penjelasan kode tersebut:
    // - Fungsi ini juga disebut "sluggable" dan mengembalikan sebuah array.
    // - Array ini berisi satu elemen dengan kunci "slug".
    // - Nilai dari kunci "slug" adalah sebuah array yang memiliki satu elemen dengan kunci "source".
    // - Nilai dari kunci "source" adalah string "title".
    // Dalam hal ini, kode tersebut menunjukkan bahwa slug yang akan dibuat didasarkan pada properti "title". Dengan kata lain, jika Anda memiliki suatu objek atau data yang memiliki properti "title", fungsi ini mungkin akan mengambil nilai dari properti tersebut dan menggunakan nilainya untuk membuat slug yang sesuai dengan aturan yang telah ditetapkan.
    public function sluggable(): array
    {  
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // Diperlukan kode di bawah agar bisa melakukan create penambahan data/update data pada tabel database
    
    // Protected $fillable : untuk mengatur attribute mana saja yang dapat diisi pada tabel database. Jika ada attribut yang tidak dimasukka, maka saat di create akan mengambil nilai defaultnya
    // protected $fillable = ['title', 'excerpt', 'content'];

    // Protected $guarded = untuk mengatur attribute mana saja yang tidak dapat diisi ketika menjalankan create
    protected $guarded = ['id'];

    // Kode di bawah digunakan sebagai eager load tanpa harus menuliskannya di Controller. Cukup di Modelnya saja. Ingat, harus menggunakan atribut/propert $with
    protected $with = ['category', 'author'];

    // Kedua cara di atas dapat dilakukan, pilih mana yang diinginkan

    // Untuk membuat relasi antar model/tabel. Relasi yang digunakan yaitu One to One. Di mana 1 post hanya bisa memiliki satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class); 
    }

    // Pada kode relasi dengan Model User di bawah, memiliki arti yaitu : 1 Post hanya bisa dimiliki oleh 1 User

    // Cari tau kenapa harus menggunakan nama function user untuk melakukan relasi dengan Model User, kenapa tidak bisa mengggunakan nama function yang lain?
    // public function author(){
    //     return $this->belongsTo(User::class);
    // }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // Saat ingin membuat relasi, tapi nama function nya tidak sesuai dengan foreignKey pada tabel yang dimaksud, maka dibutuhkan alias. Pada contoh di atas kita menggunakan nama function author yang merujuk pada foreign key user_id yang ada pada posts_table migrations (atau pada database)
    //Contoh data yang ada di posts_table migrations
    /* 
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id'); *INI ADALAH foreignKey YANG DIMAKSUD
            ...
            ...
            ...
    */    

    
    // FUNCTION UNTUK PENCARIAN
    public function scopeFilter($query, array $filters){ //Memang diperlukan 2 parameter untk menggunakan scope Function. Parameter pertama yakni $query saya tidak tau apa isinya secara detail karena ketika saya var_dump hasilnya yaitu kumpulan data yang sangat banyak dan saya tidak tau cara membacanya. Untuk paramter yang kedua, merupakan paramater yang diterima oleh request pada Post Controller

        // Query untuk mencari blog berdasarkan judul dan isinya
        $query->when($filters['search']  ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                return $query->where(   'title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
            });  
        });

        // Query untuk mencari blog berdasarkan kategorinya
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){ //parameter 'category' yang ada pada function whereHas adalah method category yang ada di halaman ini. Di mana method category tersebut berfungsi untuk mengatur relasi antara tabel post dan tabel category. Fucntion whereHas() sendiri berguna untuk melakukan join antara tabel category dan tabel post agar pencarian post berdasarkan kategori dapat dilakukan. whereHas juga adalah penyederhanaan yang dilakukan Laravel untuk join table.
            //lalu kata kunci use digunakan agar parameter $category dapat dipakai
            // var_dump($category); die();
                $query->where('slug', $category); 
                //lalu kode di atas yaitu mencocokkan antara slug dan $category(berisi apa yang dicari oleh user). 'slug' berisi data slug yang ada pada tabel category
            });
        });

        // Query untuk mencari blog berdasarkan penulisnya
        // $query->when($filters['author'] ?? false, fn($query, $author) =>
        //     $query->whereHas('author', fn($query) =>
        //         $query->where('username', $author)
        //     )
        //  );
        
        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use ($author){ 
                $query->where('username', $author); 
            });
        });
    }
    
    //method di bawah adalah method dari dokumentasi. Route Model Binding->Customizing The Key
    public function getRouteKeyName(): string
    {
        //sederhananya, setiap route akan mencari slug, bukan lagi id. Defaultnya adalah slug, bukan lagi id
        return 'slug';
    }   
}