<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Facades\File;
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


class DishesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;

    // ----------------------------------------------------------  backend  --------------------------------------------------------

    private $validationArray = [
        'name' => 'required|max:191',
        'price' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif',
        'description' => '',
        'short_desc' => '',
        'category_id' => 'required',
        'restaurant_id' => '',
    ];

    /**
     * @param Dish $dish
     * @param Category $category
     * @param $restaurant_id
     * @return Application|Factory|View
     */
    public function index(Dish $dish, Category $category, $restaurant_id)
    {
        $this->data['list'] = $dish->getDishes($restaurant_id);
        $this->data['restaurant_id'] = $restaurant_id;
        return view('modules.admin.dishes.wrapper',$this->data);
    }

    /**
     * @param $restaurant_id
     * @return Application|Factory|View
     */
    public function add(Category $category, $restaurant_id)
    {
        $this->data['templateName'] = 'create';
        $this->data['list'] = $category->getCategories($restaurant_id);
        $this->data['restaurant_id'] = $restaurant_id;
        return view('modules.admin.dishes.create', $this->data);
    }

    /**
     * @param Dish $dish
     * @param Request $request
     * @param $restaurant_id
     * @param $dish_id
     * @return Application|Factory|View
     */
    public function edit(Category $category, Dish $dish, $restaurant_id, $dish_id)
    {
        $this->data['templateName'] = 'update';
        $this->data['row'] = $dish->getDish($dish_id);
        $this->data['restaurant_id'] = $restaurant_id;
        $this->data['categoryList'] = $category->getCategories($restaurant_id);

        return view('modules.admin.dishes.update', $this->data);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Request $request)
    {
        $restaurant_id = $request->get('restaurant_id');
        $attributes = request()->validate($this->validationArray);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['restaurant_id'] = $restaurant_id;
        if (!empty($request->image) && $request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $attributes['image'] = $image;
            $request->image->move(public_path('/storage'), $image);
        }
        Dish::create($attributes);
        return redirect(route('dishes.add', ['restaurant_id' => $restaurant_id]))->with('success', 'The dish was added!');

    }

    /**
     * @param Dish $dish
     * @param Request $request
     * @param $restaurant_id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Dish $dish, Request $request, $restaurant_id)
    {
        $id = $request->get('dish_id');
        $this->data['row'] = $dish->getDish($id);
        $row = $this->data['row'];
        $attributes = request()->validate($this->validationArray);
        $attributes['user_id'] = auth()->id();
        $attributes['restaurant_id'] = $restaurant_id;
        if(Empty($request->file('image'))){
            $this->validationArray['image'] = '';
            $attributes = request()->validate($this->validationArray);
        }else {
            if (!empty($request->image) && $request->hasFile('image')) {
                if (!empty($row->image) && File::exists(public_path('/storage/' . $row->image))) {
                    unlink(public_path('/storage/' . $row->image));
                }
                $image = $request->file('image')->getClientOriginalName();
                $attributes['image'] = $image;
                $request->image->move(public_path('/storage'), $image);
            } else
                return redirect(route('dishes.edit', ['restaurant_id' => $restaurant_id, 'dish_id' => $id], $this->data))
                    ->withInput()->withErrors(['image' => "Image does not upload"]);
        }
        Dish::where('id',$id)->update($attributes);
        return redirect(route('dishes.edit', ['restaurant_id' => $restaurant_id,'dish_id' => $id]))
            ->with('success', 'The dish was updated!');

    }

    /**
     * @param Dish $dish
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Dish $dish,Request $request)
    {
        $id = $request->get('dish_id');
        $row = $dish->getDish($id);
        $restaurant_id = $row['restaurant_id'];
        if (!empty($row->image) && File::exists(public_path('/storage/' . $row->image))) {
            unlink(public_path('/storage/' . $row->image));
        }
        $row->delete();
        return redirect('dish/list/'.$restaurant_id);
    }

    // ----------------------------------------------------------  frontend  --------------------------------------------------------

    /**
     * @param Dish $dish
     * @param $category_id
     * @param Request $request
     * @return Application|Factory|View
     */
    public function front(Dish $dish, $category_id, Request $request)
    {
        $restaurantId = $request->session()->get('restaurant_id');
        $this->data['list'] = $dish->getFrontList($category_id, $restaurantId);
        return view('modules.frontend.dishes.wrapper',$this->data);
    }

    /**
     * @param Dish $dish
     * @param $dish_id
     * @return Application|Factory|View
     */
    public function show(Dish $dish, $dish_id)
    {
        $this->data['row'] = $dish->getDish($dish_id);
        return view('modules.frontend.dishes.show',$this->data);
    }
}
