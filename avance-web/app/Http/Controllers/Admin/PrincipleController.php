<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Principle;
use App\Models\PrincipleStage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PrincipleController extends Controller
{
    public function create(PrincipleStage $principleStage): View
    {
        return view('admin.principles.create', compact('principleStage'));
    }

    public function store(Request $request, PrincipleStage $principleStage): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['principle_stage_id'] = $principleStage->id;

        Principle::create($data);

        return redirect()->route('admin.principle-stages.edit', $principleStage)->with('status', 'Principio creado correctamente.');
    }

    public function edit(PrincipleStage $principleStage, Principle $principle): View
    {
        abort_unless($principle->principle_stage_id === $principleStage->id, 404);

        return view('admin.principles.edit', compact('principleStage', 'principle'));
    }

    public function update(Request $request, PrincipleStage $principleStage, Principle $principle): RedirectResponse
    {
        abort_unless($principle->principle_stage_id === $principleStage->id, 404);

        $principle->update($this->validatedData($request));

        return redirect()->route('admin.principle-stages.edit', $principleStage)->with('status', 'Principio actualizado correctamente.');
    }

    public function destroy(PrincipleStage $principleStage, Principle $principle): RedirectResponse
    {
        abort_unless($principle->principle_stage_id === $principleStage->id, 404);

        $principle->delete();

        return redirect()->route('admin.principle-stages.edit', $principleStage)->with('status', 'Principio eliminado correctamente.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
