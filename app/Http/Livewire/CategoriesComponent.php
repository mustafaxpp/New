<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesComponent extends Component
{
    use WithFileUploads;

    public $name ;
    public $main_id;
    public $category_id ;

    protected $rules = [
        'name' => 'required|max:25',
    ];


    public function render()
    {
        return view('livewire.categories-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


     // Save Function

     public function save()
     {
         $this->validate();
         if ($this->category_id)
             $category = Category::find($this->category_id);
         else {
             $category = new Category();
         }

         $category->name = $this->name;
         if($this->main_id){
             $category->category_id = $this->main_id;
            }else{
                $category->category_id = null ;

            }
         $category->save();
         $this->clear();
        session()->flash('message', 'Category '. $category->name .' Added successfully .');

        }

        // Clear Function

        public function clear()
        {
            $this->name = null ;
            $this->main_id = null ;
            $this->category_id = null ;
        }

        // Edit Function
        public function edit($category_id)
        {
            $category = Category::find($category_id);
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->main_id = $category->category_id;
     }

     // Delete Function

     public function delete($category_id)
     {
         $category = Category::find($category_id);
         Category::destroy($category_id);
         session()->flash('message', 'Category ' . $category->name .' Deleted successfully .');
     }
}
