<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\MediaLibrary\InteractsWithMedia;

class Create extends Component
{
    use InteractsWithMedia;

    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|email')]
    public $email;
    #[Rule('required|image')]
    public $image;
    #[Rule('required')]
    public $class_id;
    #[Rule('required')]
    public $section_id;


    public $sections = [];

    public function render()
    {
        return view('livewire.student.create',[
            'classes' => Classes::all()
        ]);
    }

    public function save()
    {
        $this->validate();
        $student = Student::create(
            $this->only(['title','eamil','image','class_id','section_id'])
        );   

        $student 
        ->addMedia($this->image)
        ->toMediaCollection();

        return redirect(route('students.index'))
                ->with('status','Student Succesfully Created');
    }


    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id',$value)->get();
    }
}
