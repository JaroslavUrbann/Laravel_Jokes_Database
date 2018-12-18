<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Joke;
use Auth;

class CategoryController extends Controller
{
    public function Create(){
        return view("category.create");
    }

    public function Store(Request $request){
        $this->validate($request, [
            "name" => "required"
        ]);

        try{
            $category = Category::create([
                "name" => $request->name
            ]);
        }
        catch(Exception $e){
            echo $e;
        }
        finally{
            $categories = Category::all();
            $jokes = Joke::all();
            return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
        }
    }

    public function Delete($id){
        $category = Category::find($id);
        $jokes = Joke::where("category_id", $id);
        $jokes->delete();
        $category->delete();
        
        $categories = Category::all();
        $jokes = Joke::all();
        return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
    }
}
