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
        return view('modules.admin.categories.wrapper',$this->data);
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
     * @return void
     */
    public function edit(Category $category, Request $request, $category_id)
    {
        $this->data['row'] = $category->getCategory($category_id);
        $this->data['templateName'] = 'update';
        return view('modules.admin.categories.update',$this->data);
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
            $request->image->move(public_path('/images'), $image);
        } else
            return redirect(route('categories.add'))->with('error', 'Image does not upload');

        Category::create($attributes);

        return redirect('category/list');

    }

    /**
     * @param Category $category
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Category $category ,Request $request)
    {
        $id = $request->get('category_id');
        $row = $category->getCategory($id);
        $attributes = request()->validate($this->validationArray);

        if(Empty($request->file('image'))){
            $this->validationArray['image'] = '';
            $attributes = request()->validate($this->validationArray);
        }else {
            if ($request->hasFile('image')) {
                if (!empty($row->image) && File::exists(public_path('/images/' . $row->image))) {
                    unlink(public_path('/images/' . $row->image));
                }
                $image = $request->file('image')->getClientOriginalName();
                $attributes['image'] = $image;
                $request->image->move(public_path('/images'), $image);
            } else
                return redirect(route('categories.edit', ['category_id' => $id]))->with('error', 'Image does not upload');
        }
        Category::where('id',$id)->update($attributes);

        return redirect('category/list');
    }

    /**
     * @param Category $category
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Category $category,Request $request)
    {
        $id = $request->get('category_id');
        $row = $category->getCategory($id);
        if (!empty($row->image) && File::exists(public_path('/images/' . $row->image))) {
            unlink(public_path('/images/' . $row->image));
        }
        $row->delete();
        return redirect('category/list');
    }

                                          /* frontend */

    /**
     * @param Category $category
     * @return void
     */
    public function front(Category $category)
    {
        $this->data['list'] = $category->getCategories();
        return view('modules.frontend.categories.wrapper',$this->data);
    }
}
