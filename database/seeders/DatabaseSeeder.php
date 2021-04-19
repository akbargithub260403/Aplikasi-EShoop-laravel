<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Salman',
            'email'     => 'salman@gmail.com',
            'role'      => 'admin',
            'password'  => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name'      => 'Gilang',
            'email'     => 'gilang@gmail.com',
            'role'      => 'user',
            'password'  => Hash::make('12345678'),
        ]);

        DB::table('tb_produk')->insert([
            'kategori_id'       => '1',
            'nama_barang'       => 'baju polo pria',
            'harga_barang'      => '120000',
            'jumlah_barang'     => '10',
            'ukuran_barang'     => 'XL',
            'gambar'            => '1617067526_product12.jpg',
            'deskripsi'         => 'baju untuk pria dewasa'
        ]);

        DB::table('tb_kategori')->insert([
            'nama_kategori'     => 'baju pria',
            'deskripsi'         => 'baju untuk pria dewasa'
        ]);

        // User::factory(10)->create();
    }
}
