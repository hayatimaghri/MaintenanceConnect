<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::whereIn('role', ['Entreprise', 'Technicien'])
            ->latest()
            ->get();

        return view('admin.users.index', compact('users'));
    }

    public function suspend(User $user): RedirectResponse
    {
        $user->update([
            'is_active' => false,
        ]);

        return back()->with('success', 'Compte suspendu avec succès.');
    }

    public function activate(User $user): RedirectResponse
    {
        $user->update([
            'is_active' => true,
        ]);

        return back()->with('success', 'Compte réactivé avec succès.');
    }
}