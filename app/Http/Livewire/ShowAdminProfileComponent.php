<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAdminProfileComponent extends Component
{
    public $admin ;
    public function render()
    {
        return view('livewire.show-admin-profile-component');
    }
}
