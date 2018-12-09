<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joke;
use App\Category;
use Auth;

class JokeController extends Controller
{
    public function Index(){
        $jokes = Joke::all();
        $categories = Category::all();
        return view("jokes.index")->with("jokes", $jokes);
    }

    public function Create(){
        return vies("jokes.create");
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
            $jokes = Joke::all();
            return view("jokes.index")->with("jokes", $jokes);
        }
    }
}
