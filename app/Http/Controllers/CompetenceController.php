<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetenceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;

class CompetenceController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'Technicien') {
            throw new AuthorizationException('Unauthorized.');
        }

        $competences = $user->competences()->get();

        return view('competences.index', compact('competences'));
    }

    public function store(StoreCompetenceRequest $request): RedirectResponse
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'Technicien') {
            throw new AuthorizationException('Unauthorized.');
        }

        $user->competences()->attach(
            $request->validated()['id_competence']
        );

        return redirect()
            ->route('competences.index')
            ->with('status', 'Competence added');
    }

    public function destroy($competenceId): RedirectResponse
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'Technicien') {
            throw new AuthorizationException('Unauthorized.');
        }

        $user->competences()->detach($competenceId);

        return redirect()
            ->route('competences.index')
            ->with('status', 'Competence removed');
    }
}