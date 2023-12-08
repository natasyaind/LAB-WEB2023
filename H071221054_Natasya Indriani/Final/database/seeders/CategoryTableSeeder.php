<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
            'title' => 'Matematika',
            'slug' => 'matematika',
            'description' => 'Matematika adalah ilmu yang mempelajari tentang besaran, struktur, bangun ruang, dan perubahan-perubahan pada suatu bilangan.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Aljabar',
            'slug' => 'aljabar',
            'description' => 'Berisi tentang teori bilangan, geometri, dan analisis penyelesaian.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 1
            ],
            [
            'title' => 'Trigonometri',
            'slug' => 'trigonometri',
            'description' => 'Berisi tentang hubungan sisi serta sudut yang ada pada segitiga. Hubungan ini biasanya disebut sebagai perbandingan sinus, kosinus, dan juga tangen.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 1
            ],
            [
            'title' => 'Biologi',
            'slug' => 'biologi',
            'description' => 'Ilmu yang mempelajari tentang makhluk hidup.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Kimia',
            'slug' => 'kimia',
            'description' => 'Ilmu yang mempelajari tentang komposisi, sifat zat, struktur, hingga materi tentang skala atom dan molekul disertai transformasi atau perubahan serta bagaimana interaksinya, dalam pembentukan materi yang ditemukan sehari-hari.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Bahasa Indonesia',
            'slug' => 'bahasa-indonesia',
            'description' => 'Bahasa Indonesia merupakan pelajaran yang diarahkan untuk berkomunikasi bahasa Indonesia dengan baik dan benar, baik secara lisan maupun tulis.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            ]);
    }
}
