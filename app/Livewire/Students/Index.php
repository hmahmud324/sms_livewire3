<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.students.index',[
            'students' => Student::all()
        ]);
    }
}
