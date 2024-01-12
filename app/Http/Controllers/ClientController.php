<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = Client::with('user')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

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

        // Redirect to the clients index page or any other route you prefer
        return redirect('/clients')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Find the user and client by ID
        $user = User::findOrFail($id);
        $client = $user->client;

        // Return the edit view with the user and client data
        return view('clients.edit', compact('user', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Find the user and client by ID
        $user = User::findOrFail($id);
        $client = $user->client;

        // Validation rules
        $validationRules = [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'adress' => 'required|string',
            'contact' => 'required|string',
            'user_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id), // Exclude the current user's email from the unique check
            ],
            'password' => 'nullable|min:6', // You may adjust this based on your requirements
        ];

        // Validate the request data
        $request->validate($validationRules);



        // Update the user information
        $user->update([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'adress' => $request->input('adress'),
            'email' => $request->input('email'),
        ]);

        // Update the client information
        $client->update([
            'contact' => $request->input('contact'),
        ]);

        // If a new image is uploaded store it to the database::
        // Get the old user picture path
        $oldUserPicPath = $user->user_pic;
        // Check if a new user picture is provided in the request
        if ($request->hasFile('user_pic')) {
            // Delete the old user picture
            if ($oldUserPicPath != 'users/default.png' && Storage::exists('public/' . $oldUserPicPath)) {
                Storage::delete('public/' . $oldUserPicPath);
            }
            // Store the new user picture
            $newUserPicPath = $request->file('user_pic')->store('users', 'public');
        } else {
            // No new user picture provided, keep the old one
            $newUserPicPath = $oldUserPicPath;
        }
        // Update the user with the new user picture path
        $user->update(['user_pic' => $newUserPicPath]);


        // Update the password if provided
        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        // Redirect to the clients index page or any other route you prefer
        return redirect('/clients')->with('successUP', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        // Find the user and client by ID
        $user = User::findOrFail($id);
        $client = $user->client;

        // Delete the associated client
        if ($client) {
            // Delete the client's picture if it exists
            if ($user->user_pic != 'users/default.png' && Storage::exists('public/' . $user->user_pic)) {
                Storage::delete('public/' . $user->user_pic);
            }

            $client->delete();
        }

        // Delete the user
        $user->delete();

        // Redirect to the index page or any other route you prefer
        return redirect('/clients')->with('successDel', 'Client deleted successfully.');
    }
}
