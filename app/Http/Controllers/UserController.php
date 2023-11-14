<?php

namespace App\Http\Controllers;

use App\Models\RequestSignin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];

        $user = User::where('email', $email)->first();
        $users = User::all();

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $request->session()->put('name', $user['name']);

            if ($user['role'] == 0) {
                return view("area_admin", [
                    'nome' => $user->name,
                    'users' => $users
                ]);
            } else {
                return view("area_user", [
                    'nome' => $user['name']
                ]);
            }
        } else {
            return view('welcome', [
                'erro_login' => true
            ]);
        }
    }

    public function request(Request $request)
    {
        return view("request");
    }

    public function index(Request $request)
    {
        $current_name = $request->session()->get('name');

        $users = User::all();

        return view("area_admin", [
            'nome' => $current_name,
            'users' => $users
        ]);
    }

    public function area_requests(Request $request)
    {
        $current_name = $request->session()->get('name');

        $requests = RequestSignin::all();

        return view("area_requests", [
            'nome' => $current_name,
            'requests' => $requests
        ]);
    }

    public function signin(Request $request)
    {
        RequestSignin::create([
            'email' => $request['email'],
            'status' => 0
        ]);

        return view("request_success");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'role' => $request['role']
        ]);

        $current_name = $request->session()->get('name');
        $users = User::all();

        if ($user) {
            return view("area_admin", [
                'nome' => $current_name,
                'users' => $users
            ]);
        }
    }

    public function edit(Request $request, string $id)
    {
        $user = User::where('id',$id)->first();
        $current_name = $request->session()->get('name');

        return view("edit_user",[
            'user' => $user,
            'nome' => $current_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id',$id)->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        $current_name = $request->session()->get('name');

        $users = User::all();

        return view("area_admin",[
            'users' => $users,
            'nome' => $current_name
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        User::destroy($id);

        $current_name = $request->session()->get('name');
        $users = User::all();

        return view('area_admin', [
            'nome' => $current_name,
            'users' => $users
        ]);
    }

    public function block(Request $request, $id)
    {
        $request_order = RequestSignin::where('id', $id)->first();

        $user = User::where('email', $request_order['email'])->first();

        $current_name = $request->session()->get('name');

        if (!$user) {
            $request_order_updated = RequestSignin::where('id', $id)->update(['status' => false]);
            $requests = RequestSignin::all();
            return view('area_requests', [
                'nome' => $current_name,
                'requests' => $requests
            ]);
        }else{
            User::destroy($user['id']);

            $requests = RequestSignin::all();
            return view('area_requests', [
                'nome' => $current_name,
                'requests' => $requests
            ]);
        }

        $requests = RequestSignin::all();

        return view('area_requests', [
            'nome' => $current_name,
            'requests' => $requests
        ]);
    }

    public function unlock(Request $request, $id)
    {
        $request_order = RequestSignin::where('id', $id)->first();

        $user = User::where('email', $request_order['email'])->first();

        if (!$user) {
            $name_user = explode("@", $request_order['email']);

            $user = User::create([
                'name' => $name_user[0],
                'email' => $request_order['email'],
                'password' => '123',
                'role' => 1
            ]);
        }

        $request_order_updated = RequestSignin::where('id', $id)->update(['status' => true]);

        $current_name = $request->session()->get('name');

        $requests = RequestSignin::all();

        return view('area_requests', [
            'nome' => $current_name,
            'requests' => $requests
        ]);
    }
}
