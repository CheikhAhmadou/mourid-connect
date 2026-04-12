<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminController extends Controller
{
    public function users(Request $request): AnonymousResourceCollection
    {
        $users = User::with('roles')
            ->when($request->role, fn ($q, $role) => $q->role($role))
            ->latest()
            ->paginate(30);

        return UserResource::collection($users);
    }

    public function assignRole(Request $request, User $user): UserResource
    {
        $request->validate(['role' => ['required', 'in:vendor,admin']]);

        $user->syncRoles([$request->role]);

        return new UserResource($user->load('roles'));
    }
}
