<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrincipleStage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PrincipleStageController extends Controller
{
    public function index(): View
    {
        $stages = PrincipleStage::withCount('principles')->orderBy('order')->paginate(20);

        return view('admin.principle-stages.index', compact('stages'));
    }

    public function create(): View
    {
        return view('admin.principle-stages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        PrincipleStage::create($data);

        return redirect()->route('admin.principle-stages.index')->with('status', 'Etapa creada correctamente.');
    }

    public function edit(PrincipleStage $principleStage): View
    {
        $principleStage->load([
            'principles' => fn ($query) => $query->orderBy('order')->with([
                'lessons' => fn ($lessonQuery) => $lessonQuery->orderBy('order'),
            ]),
        ]);

        return view('admin.principle-stages.edit', compact('principleStage'));
    }

    public function update(Request $request, PrincipleStage $principleStage): RedirectResponse
    {
        $data = $this->validatedData($request, $principleStage);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        $principleStage->update($data);

        return redirect()->route('admin.principle-stages.index')->with('status', 'Etapa actualizada correctamente.');
    }

    public function destroy(PrincipleStage $principleStage): RedirectResponse
    {
        $principleStage->delete();

        return redirect()->route('admin.principle-stages.index')->with('status', 'Etapa eliminada correctamente.');
    }

    private function validatedData(Request $request, ?PrincipleStage $stage = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('principle_stages', 'slug')->ignore($stage?->id)],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
