<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $users = Group::get();

        return GroupResource::collection($users);
    }

    public function show($group)
    {
        $groups = Group::findOrFail($group);

        return new GroupResource($groups);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
        ]);
        $group = Group::create($validated);

        return new GroupResource($group);
    }


    public function update(Request $request, Group $group)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
        ]);
        $group->update($validated);

        return new GroupResource($group);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return GroupResource::collection(Group::all());
    }
}
