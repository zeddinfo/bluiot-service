<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\User;
use App\Models\Visitors;
use App\Events\NewMessage;
use App\Models\UserPosition;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        // die();
        $user = Users::where('email', $request->email)->first();
        if($user) {
            return response()->json([
                'success' => 1,
                'message' => 'Login Berhasil',
                'user' => $user
            ]);
        }
        return response()->json([
            'success' => 0,
            'message' => 'Email tidak ada'
        ]);
    }

    public function get_login()
    {
        return response()->json(Users::all(), 200);
    }

    public function visibleLocation(Request $request){
        $model = Visitors::where('id_user', $request->id_user   )->first();

        if(empty($model)){
            return response()->json([
                'success' => 200,
                'message' => 'User tidak ditemukan',
            ]);
        } else {
            $model->is_visible = $request->visibleValue;
            $model->save();

            $response = UserPosition::with('users', 'visitors')->get();
            // dd($response);
            NewMessage::dispatch($response);
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil mendapatkan data',
                'user' => $response
            ]);
        }
    }

    public function statusVisible(Request $request){
        $model = Visitors::where('id_user', $request->id_user)->first();

        return response()->json([
            'success' => 1,
            'message' => 'Berhasil',
            'data' => $model,
        ]);
    }
}
