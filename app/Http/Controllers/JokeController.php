<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;
use App\Joke;
use App\Category;
use Auth;

class JokeController extends Controller
{
    public function Index(){
        $categories = Category::all();
        $jokes = Joke::all();
        return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
    }

    public function Edit($id){
        $joke = Joke::find($id);
        return view("jokes.edit")->with("joke", $joke);
    }

    public function Update(Request $request){
        $joke = Joke::find($request->id);

        if($joke) {
            $joke->text = $request->text;
            $joke->save();
        }

        $categories = Category::all();
        $jokes = Joke::all();
        return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
    }

    public function Delete($id){
        $joke = Joke::find($id);
        $joke->delete();
        
        $categories = Category::all();
        $jokes = Joke::all();
        return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
    }

    public function ShowCategory($category_id){
        $categories = Category::all();
        $jokes = Joke::all()->where("category_id", $category_id);
        return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
    }

    public function Create(){
        $categories = Category::all();
        return view("jokes.create")->with("categories", $categories);
    }

    public function Store(Request $request){
        $this->validate($request, [
            "text" => "required"
        ]);

        $joke = Joke::create([
            "text" => $request->text,
            "users_id"=> Auth::user()->id,
            "category_id" => $request->category
        ]);
        $categories = Category::all();
        $jokes = Joke::all();
        return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
    }
}
