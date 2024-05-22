<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Sviluppo e Programmazione',' Design e UI/UX','Contenuti e SEO','Manutenzione e Supporto Tecnico', ' Gestione Progetti e Clienti'];

        foreach($categories as $element){
            $new_category = new Category();
            $new_category ->name = $element;
            $new_category->save();
          }
    }

}
