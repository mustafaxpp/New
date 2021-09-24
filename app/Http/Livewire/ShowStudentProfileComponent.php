<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowStudentProfileComponent extends Component
{
    public $student ;
    public function render()
    {
        return view('livewire.show-student-profile-component');
    }
}
