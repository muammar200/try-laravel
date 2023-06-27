<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Diperlukan kode di bawah agar bisa melakukan create penambahan data/update data pada tabel database
    
    // Protected $fillable : untuk mengatur attribute mana saja yang dapat diisi pada tabel database. Jika ada attribut yang tidak dimasukka, maka saat di create akan mengambil nilai defaultnya
    // protected $fillable = ['title', 'excerpt', 'content'];

    // Protected $guarded = untuk mengatur attribute mana saja yang tidak dapat diisi ketika menjalankan create
    protected $guarded = ['id'];

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
        
}
