<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    
    const PATH_VIEW = 'admin.categories.';
    public function index(){
        $data = Category::query()->latest('id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }
    public function create(Request $request)
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(){

    }
}
