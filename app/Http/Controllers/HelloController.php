<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function hi($name){
        echo $name;
    }
    function hello(Request $request){
        // echo "Hello"; 
        return view("hello")->with("empName" ,$request->fname . " " . $request->lname);
    }

    function sum(Request $request){
        echo $request->x . " + " . $request->y . " = "  . ($request->x + $request->y);
     }
    function add(Request $request){
        // return view("calc")->with("n1" ,$request->x)->with("n2" ,$request->y);
        $name ="ahmed";
        return view("calc" ,["n1"=> $request->x , "n2"=>$request->y])->with(compact("name"));

        //with("name",$name)
        
    }

    function sub($n1=10 ,$n2 =0){
        echo $n1 -$n2 ;
    }
    function mul(Request $request){
        echo $request->x * $request->y ;
    }
}
