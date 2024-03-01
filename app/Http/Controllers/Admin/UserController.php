<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/User/Index', [
            'users' => User::paginate(10),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/User/Create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $user = User::create($request->safe()->except('file'));

        if ($request->hasFile('file')) {
            $user->addMedia($request->file)->toMediaCollection('media');
        }

        return Redirect::route('admin.users.index');
    }

    public function edit(User $user): Response
    {
        return Inertia::render('Admin/User/Edit', [
            'user' => $user,
        ]);
    }

    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->safe()->except('file'));

        if ($request->hasFile('file')) {
            $user->clearMediaCollection('media');

            $user->addMedia($request->file)->toMediaCollection('media');
        }

        return Redirect::route('admin.users.index');
    }
}
