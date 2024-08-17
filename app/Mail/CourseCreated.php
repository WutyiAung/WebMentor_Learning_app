<?php
// app/Mail/CourseCreated.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $course;

    public function __construct($course)
    {
        $this->course = $course;
    }

    public function build()
    {
        return $this->view('emails.course_created')
                    ->with([
                        'title' => $this->course->title,
                        'description' => $this->course->description,
                        'url' => 'http://127.0.0.1:8000/public-courses/course/'.$this->course->id,
                    ])
                    ->subject('New Course Created: ' . $this->course->title)
                    ->with([
                        'content' => 'A new course has been created. Check it out now!',
                    ]);
    }
}
