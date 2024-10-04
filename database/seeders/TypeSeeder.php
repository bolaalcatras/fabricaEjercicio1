<?php

namespace Database\Seeders;

use App\Models\Type as ModelsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'tipoTransaccion' => 'ingresos',
        ]);
        Type::create([
            'tipoTransaccion' => 'Egresos',
        ]);
    }
}
