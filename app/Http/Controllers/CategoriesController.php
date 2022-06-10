<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
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

    // ----------------------------------------------------------  backend  --------------------------------------------------------

    private $validationArray = [
        'name' => 'required|max:191',
        'image' => 'image|mimes:jpeg,png,jpg,gif|nullable',
        'restaurant_id' => '',
    ];

    /**
     * @param Category $category
     * @param $restaurant_id
     * @return Application|Factory|View
     */
    public function index(Category $category, $restaurant_id)
    {
        $this->data['restaurant_id'] = $restaurant_id;
        $this->data['list'] = $category->getCategories($restaurant_id);
        return view('modules.admin.categories.wrapper', $this->data);
    }

    /**
     * @param $restaurant_id
     * @return Application|Factory|View
     */
    public function add($restaurant_id)
    {
        $this->data['templateName'] = 'create';
        $this->data['restaurant_id'] = $restaurant_id;
        return view('modules.admin.categories.create', $this->data);
    }

    /**
     * @param Category $category
     * @param $category_id
     * @param $restaurant_id
     * @return Application|Factory|View
     */
    public function edit(Category $category,$restaurant_id, $category_id)
    {
        $this->data['row'] = $category->getCategory($category_id);
        $this->data['templateName'] = 'update';
        $this->data['restaurant_id'] = $restaurant_id;
        return view('modules.admin.categories.update', $this->data);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Request $request)
    {
        $attributes = request()->validate($this->validationArray);
        $restaurant_id = $request->get('restaurant_id');
        $attributes['restaurant_id'] = $restaurant_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $attributes['image'] = $image;
            $request->image->move(public_path('/storage'), $image);
        }
        Category::create($attributes);

        return redirect(route('categories', ['restaurant_id' => $restaurant_id]));

    }

    /**
     * @param Category $category
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Category $category, Request $request, $restaurant_id)
    {
        $id = $request->get('category_id');
        $row = $category->getCategory($id);
        $attributes = request()->validate($this->validationArray);

        if (empty($request->file('image'))) {
            $this->validationArray['image'] = '';
            $attributes = request()->validate($this->validationArray);
        } else {
            if ($request->hasFile('image')) {
                if (!empty($row->image) && File::exists(public_path('/storage/' . $row->image))) {
                    unlink(public_path('/storage/' . $row->image));
                }
                $image = $request->file('image')->getClientOriginalName();
                $attributes['image'] = $image;
                $request->image->move(public_path('/storage'), $image);
            } else
                return redirect(route('categories.edit', ['category_id' => $id]))->with('error', 'Image does not upload');
        }
        Category::where('id', $id)->update($attributes);

        return redirect(route('categories', ['restaurant_id' => $restaurant_id]))->with('success', 'The category was updated!');
    }

    /**
     * @param Category $category
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Category $category, Request $request)
    {
        $id = $request->get('category_id');
        $row = $category->getCategory($id);
        $restaurant_id = $row['restaurant_id'];
        if (!empty($row->image) && File::exists(public_path('/storage/' . $row->image))) {
            unlink(public_path('/storage/' . $row->image));
        }
        $row->delete();
        return redirect(route('categories', ['restaurant_id' => $restaurant_id]));
    }

    /* frontend */

    /**
     * @param Restaurant $restaurant
     * @param Request $request
     * @param Category $category
     * @param $table
     * @param $restaurant_id
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function front(Restaurant $restaurant, Request $request, Category $category, $table, $restaurant_id)
    {
        $request->session()->put('restaurant_id', $restaurant_id);
        $request->session()->put('table', $table);
        $row = $restaurant->getRestaurant($restaurant_id);
        if (empty($row)){
            return redirect(route('scan.QR'))->with('error', 'Incorrect restaurant id');
        }

        $this->data['list'] = $category->getCategories($restaurant_id);
        return view('modules.frontend.categories.wrapper', $this->data);
    }
}
