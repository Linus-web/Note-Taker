<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\NoteBlock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoteBlock>
 */
class NoteBlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = NoteBlock::class;

    public function definition(): array
    {
        $types = ['header', 'subheader', 'paragraph', 'list', 'code_snippet'];

        return [
            'note_id' => Note::factory(), // Create a new note if needed
            'type' => $this->faker->randomElement($types),
            'content' => $this->faker->text(200),
            'meta' => null, // Could add meta logic here if necessary (e.g., list items)
            'order' => $this->faker->randomDigitNotNull,
        ];
    }
}
