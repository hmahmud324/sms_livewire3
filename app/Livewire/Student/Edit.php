<?php

namespace App\Livewire\Student;



use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\MediaLibrary\InteractsWithMedia;

class Edit extends Component
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

    public function mount()
    {
        $this->fill($this->student->only('name','email','class_id','section_id'));
        $this->sections = Section::where('class_id',$this->student->class_id)->get();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.student.edit',[
            'classes' => Classes::all()
        ]);
    }
}
