<?php

namespace App\Http\Livewire;

use App\Models\Skill;
use Livewire\Component;

class SkillsComponent extends Component
{

    public $name , $skill_id ;

    protected $rules = [
        'name' => 'required|max:25',
    ];

    public function render()
    {
        return view('livewire.skills-component');
    }


    public function save()
    {
        $this->validate();
        if ($this->skill_id)
            $skill = Skill::find($this->skill_id);
        else {
            $skill = new Skill();
        }

        $skill->name = $this->name;
        $skill->save();
        $this->clear();
       session()->flash('message', 'Skill '. $skill->name .' Added successfully .');

       }

       // Clear Function

       public function clear()
       {
           $this->name = null ;
           $this->skill_id = null ;
       }

       // Edit Function
       public function edit($skill_id)
       {
           $skill = Skill::find($skill_id);
           $this->skill_id = $skill->id;
           $this->name = $skill->name;
    }

    // Delete Function

    public function delete($skill_id)
    {
        $skill = Skill::find($skill_id);
        Skill::destroy($skill_id);
        session()->flash('message', 'Skill ' . $skill->name .' Deleted successfully .');
    }
}
