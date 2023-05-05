<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class NewsCategoryForm extends Component
{
    public Categories $categories;
    public $name;
    public $editMode = false;

    protected $rules = [
        'name' => 'required|string'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->editMode = true;
        }
        $this->categories = Categories::firstOrNew(['id' => $id]);
        $this->name = $this->categories->name;
    }

    public function render()
    {
        return view('livewire.news-category-form', [
            'category' => $this->name,
            'edit' => $this->editMode
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeOrUpdate()
    {
        $data = $this->validate();
        if ($this->editMode = false) {
            $this->categories->firstOrCreate($data);
        } else {
            $this->categories->update($data);
        }
        $this->redirectRoute('news-category-index');
    }
}
