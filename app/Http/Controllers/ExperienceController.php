<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Auth\Access\AuthorizationException;

class ExperienceController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'Technicien') {
            throw new AuthorizationException('Unauthorized.');
        }

        $experiences = $user->experiences()->get();

        return view('experiences.index', compact('experiences'));
    }

    public function store(ExperienceRequest $request): RedirectResponse
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'Technicien') {
            throw new AuthorizationException('Unauthorized.');
        }

        $validated = $request->validated();

        $user->experiences()->create($validated);

        return redirect()
            ->route('experiences.index')
            ->with('status', 'Experience added');
    }

    public function update(
        ExperienceRequest $request,
        Experience $experience
    ): RedirectResponse {
        $user = auth()->user();

        if (! $user || $user->role !== 'Technicien') {
            throw new AuthorizationException('Unauthorized.');
        }

        if ($experience->id_utilisateur !== $user->id) {
            throw new AuthorizationException('Unauthorized.');
        }

        $validated = $request->validated();

        $experience->update($validated);

        return redirect()
            ->route('experiences.index')
            ->with('status', 'Experience updated');
    }

    public function destroy(Experience $experience): RedirectResponse
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'Technicien') {
            throw new AuthorizationException('Unauthorized.');
        }

        if ($experience->id_utilisateur !== $user->id) {
            throw new AuthorizationException('Unauthorized.');
        }

        $experience->delete();

        return redirect()
            ->route('experiences.index')
            ->with('status', 'Experience deleted');
    }
}