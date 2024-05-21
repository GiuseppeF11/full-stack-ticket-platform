<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ticket;
use Faker\Generator as Faker;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 20; $i++) {
            $newTicket = new Ticket();
            $newTicket -> operator_id = $faker->numberBetween(1 , 12);
            $newTicket -> date =$faker-> dateTimeBetween('-1year', 'now')->format('Y-m-d');
            $newTicket ->status =  $faker->randomElement(['aperto', 'in attesa', 'in lavorazione', 'chiuso']);
            $newTicket ->title = $faker->sentence;
            $newTicket ->description = $faker->paragraph;
            $newTicket->save();
        }
    }
}
