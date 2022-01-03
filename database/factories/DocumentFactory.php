<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayName = array("Program learn HTML/CSS", "Download course slides", "Download course videos");
        $randIndex = array_rand($arrayName);
        return [
            'lesson_id' => $this->faker->randomDigit(),
            'name' => $arrayName[$randIndex],
            'type' => 'pdf',
            'logo_path' => 'img/pdf-icon.png',
            // 'video_path' => 'https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/documents/gytDhPQoKSNNaRepnM2WKdNqLz6AdWgL5K65KXPb.mp4'
            'file_path' => 'https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/documents/k2BYCFmuMkL8Bw1tCo1x6dcnhDUbHeDCCmbXSLe7.pdf'
            // 'file_path' => "https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/documents/AjOzjW9n3XhuhrNpzL7moEF0GVlt8Q4dJa61qYQC.pdf",
        ];
    }
}
