<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}