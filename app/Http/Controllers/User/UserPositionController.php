<?php

namespace App\Http\Controllers\User;

use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Models\UserPosition;
use Illuminate\Http\Request;

class UserPositionController extends Controller
{
    public function position(Request $request)
    {
        $user = UserPosition::where('name', $request->name)->first();

        if (empty($user)) {
            $model = new UserPosition();
            $model->name = $request->name;
            $model->position_x = $request->x;
            $model->position_y = $request->y;
            $model->save();
        } else {
            $user->position_x = $request->x;
            $user->position_y = $request->y;
            $user->save();
        }

        try {
            $data = UserPosition::get();
            NewMessage::dispatch($data);
            return response()->json('Berhasil Post Data' . $data);
        } catch (\Exception $e) {
            return response()->json('Terjadi kesalahan' . $e);
        }
    }

    public function get_position(Request $request)
    {
        // $model = UserPosition::with('users', 'visitors')->get();
        // dd(UserPosition::with('users', 'visitors')->get());
        return response()->json(UserPosition::with('users', 'visitors')->get(), 200);
    }

    public function update_position(Request $request)
    {
        $user = UserPosition::where('id', $request->id)->first();

        if (empty($user)) {
            $model->name = $request->name;
            $model->position_x = $request->x;
            $model->position_y = $request->y;
            $model->save();
        } else {
            $user->position_x = $request->x;
            $user->position_y = $request->y;
            $user->save();
        }

        try {
            $data = UserPosition::get();
            NewMessage::dispatch($data);
            return response()->json('Berhasil Update Data' . $data);
        } catch (\Exception $e) {
            return response()->json('Terjadi kesalahan' . $e);
        }
    }
}
