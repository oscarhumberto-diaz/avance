<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Principle;
use App\Models\PrincipleStage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MaterialController extends Controller
{
    public function index(): View
    {
        $materials = Material::with(['stage:id,name', 'principle:id,title'])->latest()->paginate(20);

        return view('admin.materials.index', compact('materials'));
    }

    public function create(): View
    {
        return view('admin.materials.create', $this->formData());
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['leaders_only'] = $request->boolean('leaders_only');
        $file = $request->file('file');

        $data['file_path'] = $file->store('materials', 'local');
        $data['file_name'] = $file->getClientOriginalName();
        $data['mime_type'] = $file->getClientMimeType() ?: $file->getMimeType() ?: 'application/octet-stream';
        $data['file_size'] = $file->getSize();

        Material::create($data);

        return redirect()->route('admin.materials.index')->with('status', 'Material creado correctamente.');
    }

    public function edit(Material $material): View
    {
        return view('admin.materials.edit', array_merge($this->formData(), compact('material')));
    }

    public function update(Request $request, Material $material): RedirectResponse
    {
        $data = $this->validatedData($request, false);
        $data['leaders_only'] = $request->boolean('leaders_only');

        if ($request->hasFile('file')) {
            Storage::disk('local')->delete($material->file_path);
            $file = $request->file('file');
            $data['file_path'] = $file->store('materials', 'local');
            $data['file_name'] = $file->getClientOriginalName();
            $data['mime_type'] = $file->getClientMimeType() ?: $file->getMimeType() ?: 'application/octet-stream';
            $data['file_size'] = $file->getSize();
        }

        $material->update($data);

        return redirect()->route('admin.materials.index')->with('status', 'Material actualizado correctamente.');
    }

    public function destroy(Material $material): RedirectResponse
    {
        Storage::disk('local')->delete($material->file_path);
        $material->delete();

        return redirect()->route('admin.materials.index')->with('status', 'Material eliminado correctamente.');
    }

    private function formData(): array
    {
        return [
            'types' => Material::TYPES,
            'stages' => PrincipleStage::orderBy('order')->get(['id', 'name']),
            'principles' => Principle::orderBy('title')->get(['id', 'title']),
        ];
    }

    private function validatedData(Request $request, bool $requireFile = true): array
    {
        $fileRules = [
            'file',
            'mimetypes:application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,video/mp4',
            'max:102400',
        ];

        if ($requireFile) {
            array_unshift($fileRules, 'required');
        } else {
            array_unshift($fileRules, 'nullable');
        }

        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(Material::TYPES)],
            'leaders_only' => ['nullable', 'boolean'],
            'principle_stage_id' => ['nullable', 'integer', 'exists:principle_stages,id'],
            'principle_id' => ['nullable', 'integer', 'exists:principles,id'],
            'file' => $fileRules,
        ]);
    }
}
