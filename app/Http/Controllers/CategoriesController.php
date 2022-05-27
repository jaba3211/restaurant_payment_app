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


class CategoriesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;

    /* backend */

    private $validationArray = [
        'name' => 'required|max:191',
        'image' => 'image|mimes:jpeg,png,jpg,gif|nullable',
    ];

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function index(Category $category)
    {
        $this->data['list'] = $category->getCategories();
        return view('modules.admin.categories.beck',$this->data);
    }

    /**
     * @return Application|Factory|View
     */
    public function add(Category $category)
    {
        $this->data['templateName'] = 'create';
        return view('modules.admin.categories.create',$this->data);
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
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Category $category,Request $request)
    {
        $id = $request->get('id');
        $row = $category->getCategory($id);
        if(!empty($row->image) && File::exists(storage_path('app/public/images/'.$row->image))){
            unlink(storage_path('app/public/images/'.$row->image));
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
