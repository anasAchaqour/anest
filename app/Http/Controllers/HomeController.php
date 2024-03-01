<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function storeClient(Request $request)
    {
        // Validation rules
        $validationRules = [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'adress' => 'required|string',
            'contact' => 'required|string',
            'user_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];
        info('sdv');

        // Validate the request data
        $request->validate($validationRules);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'adress' => $request->input('adress'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 1, // Assuming role 1 is for clients
        ]);

        // Create a new client associated with the user
        $client = new Client([
            'user_id' => $user->id,
            'contact' => $request->input('contact'),
        ]);

        if ($request->hasFile('user_pic')) {
            // If a file was uploaded, store it and get the path
            $userPicPath = $request->file('user_pic')->store('users', 'public');
            $user->update(['user_pic' => $userPicPath]);
        } else {
            // If no file was uploaded, use the default image path
            $userPicPath = 'users/default.png'; // Adjust the default image filename/path
            $user->update(['user_pic' => $userPicPath]);
        }
        // Save the client
        $user->client()->save($client);

        // info('User and client created successfully');
        // Redirect to the clients index page or any other route you prefer
        return redirect('/login')->with('success', 'Enter you informations to Login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function adminHome()
    {
        // return view('home',["msg"=>"Hello! I am admin"]);
        return view('test');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function warehouse_staffHome()
    {
        return view('warehouse-staff-pages.test');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clientHome()
    {
        return view('client-pages.test');
    }
}
