<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Masmerise\Toaster\Toaster;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Masmerise\Toaster\Toast;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formOptions = [
            'method' => 'post',
            'action' => route('category.store'),
            'button' => 'Create'
        ];
        return view('category-form', compact('formOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        Categories::create($request->all());
        return Redirect::route('news-category-index')->success('Your Category has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories, $id)
    {
        $category = $categories::findOrFail($id);
        $formOptions = [
            'method' => 'patch',
            'action' => route('category.update', $category->id),
            'button' => 'Save'
        ];
        return view('category-form', compact('category', 'formOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories, $id)
    {
        $category = $categories::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string'
        ]);
        $data['updated_at'] = now()->tz('asia/ho_chi_minh');
        $category->update($data);
        return redirect()->route('news-category-index')->with('toast_success', 'Your category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories, $id)
    {
//        $category = $categories::findOrFail($id);
//        $category->delete();
//        toast('Your Category has been deleted!','success');
//        return redirect()->back();
    }
}
