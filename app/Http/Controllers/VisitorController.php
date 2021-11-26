<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitors;

class VisitorController extends Controller
{
    public function getVisitors(){
        $model = Visitors::with('position')->get();
        dd($model);
        $visitors = [];
        // foreach($model as $row){
        //     $visitors[] = array(
        //         'name' =>yp
        //     )
        // }
    }
}
