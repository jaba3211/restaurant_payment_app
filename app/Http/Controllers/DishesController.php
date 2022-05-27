<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
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

    /* backend */

    private $validationArray = [
        'name' => 'required|max:191',
        'price' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif',
        'description' => '',
        'category_id' => 'required',
        'restaurant_id' => '',
    ];

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->data['list'] = $category->getCategories();
    }

    /**
     * @param Dish $dish
     * @param Request $request
     * @param $restaurant_id
     * @return Application|Factory|View
     */
    public function index(Dish $dish, Request $request, $restaurant_id)
    {
        $this->data['list'] = $dish->getDishes($restaurant_id);
        $this->data['restaurant_id'] = $restaurant_id;
        return view('modules.admin.dishes.wrapper',$this->data);
    }

    /**
     * @return Application|Factory|View
     */
    public function add(Request $request, $restaurant_id)
    {
        $this->data['restaurant_id'] = $restaurant_id;
        return view('modules.admin.dishes.create', $this->data);
    }

    /**
     * @param Request $request
     * @param $restaurant_id
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Request $request, $restaurant_id)
    {
        $attributes = request()->validate($this->validationArray);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['restaurant_id'] = $restaurant_id;
        if (!empty($request->image) && $request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $attributes['image'] = $image;
            $request->image->storeAs('public/images/', $image);
        } else
            return redirect(route('dishes.add', $this->data))->withInput()->withErrors(['success' => "Image does not upload"]);
        Dish::create($attributes);
        return redirect(route('dishes.add', ['restaurant_id' => $restaurant_id]))->with('success', 'The dish was added!');

    }

    /**
     * @param Dish $dish
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Dish $dish,Request $request)
    {
        $id = $request->get('id');
        $row = $dish->getDish($id);
        $restaurant_id = $row['restaurant_id'];
        if(!empty($row->image) && File::exists(storage_path('app/public/images/'.$row->image))){
            unlink(storage_path('app/public/images/'.$row->image));
        }
        $row->delete();
        return redirect('dish/list/'.$restaurant_id);
    }
}
