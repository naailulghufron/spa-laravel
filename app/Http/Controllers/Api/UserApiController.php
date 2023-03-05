<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::take(100)->orderBy('id', 'desc')->get();
        return response()->json(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        // $validated = $request->validate([
        //     'user_name' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'password' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) :
            $status = false;
            $message = $validator->errors();
            return response()->json(compact('status', 'message'), 403);
        endif;
        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $status = true;
        $message = 'Data berhasil disimpan';
        $data = $user;
        return response()->json(compact('status', 'message', 'data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return response()->json(compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return response()->json(compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        ]);

        if ($validator->fails()) :
            $status = false;
            $message = $validator->errors();
            return response()->json(compact('status', 'message'), 403);
        endif;

        $user = User::find($id);
        $user->update([
            'name' => $request->user_name,
            'email' => $request->email,
        ]);

        $status = true;
        $message = 'Data berhasil diubah';
        $data = $user;
        return response()->json(compact('status', 'message', 'data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        // $user->delete();

        $status = true;
        $message = 'Data berhasil dihapus';
        $data = $user;
        return response()->json(compact('status', 'message', 'data'));
    }
}
