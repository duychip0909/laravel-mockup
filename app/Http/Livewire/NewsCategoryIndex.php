<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Categories;
use Masmerise\Toaster\Toaster;


class NewsCategoryIndex extends Component
{
    public $deleteId = '';

    public function render()
    {
        $categories= Categories::all();
        return view('livewire.news-category-index', compact('categories'));
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function destroy()
    {
        Categories::findOrFail($this->deleteId)->delete();
        Toaster::success('Deleted successfully');
    }
}
