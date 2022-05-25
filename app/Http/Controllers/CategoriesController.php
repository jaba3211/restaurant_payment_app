<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;

    /* backend */

    private $validationArray = [
        'name' => 'required|max:191',
        'image' => 'unique:categories|image|mimes:jpeg,png,jpg,gif',
    ];

    /**
     * @return Application|Factory|View
     */
    public function index(Category $category)
    {
        return view('modules.admin.categories.create');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Request $request)
    {
        $attributes = request()->validate($this->validationArray);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $attributes['image'] = $image;
            $request->image->storeAs('public/images/', $image);
        } else
            return redirect(route('categories.create'))->with('error', 'Image does not upload');

        Category::create($attributes);

        return redirect('category/list');

    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function beck(Category $category)
    {
        $this->data['list'] = $category->getCategories();
        return view('modules.admin.categories.beck',$this->data);
    }

    /**
     * @param Category $category
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Category $category,Request $request)
    {
        $id = $request->get('id');
        $row = $category->getCategory($id);
        if(!empty($row->image) && File::exists(public_path('images'.$row->image))){
            Storage::delete('public/images/'.$row->image);
        }
        $row->delete();
        return redirect('category/list');
    }
    /*front */
    /**
     * @param Category $category
     * @return void
     */
    public function front(Category $category)
    {
        $this->data['list'] = $category->getCategories();
        return view('modules.admin.categories.front',$this->data);
    }
}
