<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class StudentComponent extends Component
{

    public $name , $email , $password , $user_id;

    protected $rules = [
        'name' => 'required|min:3|max:25',
        'email' => 'required|email',
        'password' => 'required|min:9',
    ];

    public function render()
    {
        return view('livewire.student-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
     {
         $this->validate();
         if ($this->user_id)
             $user = User::find($this->user_id);
         else {
             $user = new User();
         }

         $user->name = $this->name;
         $user->email = $this->email;
         $user->password = Crypt::encryptString($this->password);
         $user->save();
         $this->clear();
        session()->flash('message', 'User '. $user->name .' Added successfully .');

        }

        public function clear()
        {
            $this->name = null ;
            $this->email = null ;
            $this->password = null ;
        }



    public function edit($user_id)
        {
            $user = User::find($user_id);
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = $user->password;
     }

    public function delete($user_id)
    {
        // dd($user_id);
        User::destroy($user_id);
        session()->flash('message', 'User Deleted successfully .');
    }
}
