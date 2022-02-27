<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
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
        Category::create([
            'nama_kategori' => 'Karya Seni'
        ]);

        Category::create([
            'nama_kategori' => 'Pakaian'
        ]);

        Category::create([
            'nama_kategori' => 'Piala dan Piagam'
        ]);

        Category::create([
            'nama_kategori' => 'Buku'
        ]);

        Category::create([
            'nama_kategori' => 'Tulisan dan Tanda Tangan'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt("user"),
        ]);
    }
}
