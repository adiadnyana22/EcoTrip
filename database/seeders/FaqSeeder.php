<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'title' => 'Apa itu EcoWisata?',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.'
        ]);

        Faq::create([
            'title' => 'Bagaimana Cara memesan EcoExplore?',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.'
        ]);

        Faq::create([
            'title' => 'Apa itu EcoWisata?',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.'
        ]);

        Faq::create([
            'title' => 'Apa itu EcoWisata?',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.'
        ]);

        Faq::create([
            'title' => 'Bagaimana Cara memesan EcoExplore?',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.'
        ]);

        Faq::create([
            'title' => 'Apa itu EcoWisata?',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.'
        ]);
    }
}
