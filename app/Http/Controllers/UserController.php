<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;
    public function index()
    {
        $users = User::get();

        return UserResource::collection($users);
    }

    public function show($user)
    {
        $users = User::findOrFail($user);

        return new UserResource($users);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'is_active' => 'sometimes|boolean',
            'profile_pic' => 'required',
            'name' => 'required|max:30',
            'email' => 'required|unique:users,email|email',
            'contact' => 'required|unique:users,contact',
            'email_verified_at' => 'required',
            'password' => 'required|min:3'
        ]);
        $user = User::create($validated);

        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'is_active' => 'sometimes|boolean',
            'profile_pic' => 'required',
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'contact' => 'required|unique:users,contact,'->$user->id,
            'email_verified_at' => 'required',
            'password' => 'required|min:3'
        ]);
        $user->update($validated);

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return UserResource::collection(User::all());
    }
}
