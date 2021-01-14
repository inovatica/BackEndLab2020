<?php

namespace Database\Seeders;

use App\Models\ToDo;
use Illuminate\Database\Seeder;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [];
        for ($i = 1; $i < 20; $i++) {
            $toDoData = [
                "title" => "Testowy ToDo " . $i,
                "description" => "Opis testowy" . $i,
                "progress" => $i,
                "priority" => $i
            ];
            $toDo = ToDo::create($toDoData);
            if (rand(0, 1)) {
                for ($j = 1; $j < rand(1, 5); $j++) {
                    $childToDoData = [
                        "title" => "Testowy Child ToDo " . $i,
                        "description" => "Opis Child testowy" . $i,
                        "progress" => 0,
                        "priority" => 0,
                        "parent_id" => $toDo->id
                    ];
                    ToDo::create($childToDoData);
                }

            }
            $insert[] = $toDoData;
        }

//        ToDo::insert($insert);
    }
}
