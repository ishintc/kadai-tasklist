<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ['課題1', '課題2', '課題3', '課題4', '課題5', '課題6'];
        $content = ['111111111111', '222222222222', '3333333333333', '4444444444', '5555555', '66666666666'];
        $status = ['0.2', '0.5', '0.7', '1'];

        $name = $name[rand(0, count($name) - 1)];
        $content = $content[rand(0, count($content) - 1)];
        $status = $status[rand(0, count($status) - 1)];
        return [
            //'id' => $id,
            'name' => $name,
            'content' => $content,
            'status' => $status,
        ];

    }
}
