<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categoryData = Category::select('*')->orderby('id', 'DESC')->get();
        return view('admin.categories.index', ['categoryData' => $categoryData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        try {
            $categoryData = '';
            $categories = Category::select('id', 'name')->get();
            return view('admin.categories.create', ['categoryData' => $categoryData, 'categories' => $categories]);
        } catch (Exception $e) {
            return redirect()->route('admin.categories.index')
                ->with('error_message', 'Oops!Internal Server Error.Please Try Again Later.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);
 
        if ($validator->fails()) {
            return to_route('admin.categories.create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            DB::beginTransaction();
            try {
                // Retrieve the validated input...
                $validated = $validator->validated();
                Category::create($validated);
                DB::commit();
                return redirect()->route('admin.categories.index')->with('success_message', 'Category Created Successfully!');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->route('admin.category.index')
                    ->with('error_message', 'Oops!Internal Server Error.Please Try Again Later.');
            }

        }
 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        try {
            $categoryData = Category::findOrFail($id);
            if (!empty($categoryData)) {
                return view('admin.categories.create', ['categoryData' => $categoryData]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'Category does not exists!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.categories.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Category $category)
    {
        dd($category);
    }
}
