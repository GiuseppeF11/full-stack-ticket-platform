<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketToCategory;

class TicketToCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for($i=1; $i<=20; $i++){
        $new_ticket_category = new TicketToCategory();
        $new_ticket_category ->ticket_id = $i;
        $new_ticket_category ->category_id = rand(1,5);
        $new_ticket_category->save();
       }
    }
}
