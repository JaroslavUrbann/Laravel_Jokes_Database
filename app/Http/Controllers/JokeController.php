<?php

namespace App\Http\Controllers;

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

    public function ShowCategory($category_id){
        $categories = Category::all();
        $jokes = Joke::all()->where("category_id", $category_id);
        return view("jokes.index")->with("jokes", $jokes)->with("categories", $categories);
    }

    public function Create(){
        return view("jokes.create");
    }

    public function Store(Request $request){
        $this->validate($request, [
            "text" => "required"
        ]);

        try{
            $joke = Joke::create([
                "text" => $request->text,
                "users_id"=> Auth::user()->id
                // + žánr automaticky zvolen, možná přes url (/create/jokes/yomama)
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
}
