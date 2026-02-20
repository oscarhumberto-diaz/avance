<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Principle;
use App\Models\PrincipleLesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrincipleLessonController extends Controller
{
    public function create(Principle $principle): View
    {
        $principle->load('stage');

        return view('admin.principle-lessons.create', compact('principle'));
    }

    public function store(Request $request, Principle $principle): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['principle_id'] = $principle->id;

        PrincipleLesson::create($data);

        return redirect()
            ->route('admin.principle-stages.edit', $principle->stage)
            ->with('status', 'Lección creada correctamente.');
    }

    public function edit(Principle $principle, PrincipleLesson $lesson): View
    {
        abort_unless($lesson->principle_id === $principle->id, 404);
        $principle->load('stage');

        return view('admin.principle-lessons.edit', compact('principle', 'lesson'));
    }

    public function update(Request $request, Principle $principle, PrincipleLesson $lesson): RedirectResponse
    {
        abort_unless($lesson->principle_id === $principle->id, 404);

        $lesson->update($this->validatedData($request));

        return redirect()
            ->route('admin.principle-stages.edit', $principle->stage)
            ->with('status', 'Lección actualizada correctamente.');
    }

    public function destroy(Principle $principle, PrincipleLesson $lesson): RedirectResponse
    {
        abort_unless($lesson->principle_id === $principle->id, 404);

        $lesson->delete();

        return redirect()
            ->route('admin.principle-stages.edit', $principle->stage)
            ->with('status', 'Lección eliminada correctamente.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'summary' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
