<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Principle;
use App\Models\PrincipleStage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\View\View;

class MaterialsController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'type' => ['nullable', 'in:' . implode(',', Material::TYPES)],
            'stage' => ['nullable', 'integer', 'exists:principle_stages,id'],
            'principle' => ['nullable', 'integer', 'exists:principles,id'],
        ]);

        $materials = Material::query()
            ->with(['stage:id,name', 'principle:id,title'])
            ->when($filters['type'] ?? null, fn (Builder $query, string $type) => $query->where('type', $type))
            ->when($filters['stage'] ?? null, fn (Builder $query, string $stageId) => $query->where('principle_stage_id', $stageId))
            ->when($filters['principle'] ?? null, fn (Builder $query, string $principleId) => $query->where('principle_id', $principleId))
            ->when(!$request->user() || !in_array($request->user()->role, ['leader', 'editor', 'admin'], true), fn (Builder $query) => $query->where('leaders_only', false))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $stages = PrincipleStage::orderBy('order')->get(['id', 'name']);
        $principles = Principle::orderBy('title')->get(['id', 'title']);

        return view('materials.index', [
            'materials' => $materials,
            'types' => Material::TYPES,
            'stages' => $stages,
            'principles' => $principles,
            'filters' => $filters,
        ]);
    }

    public function download(Material $material): StreamedResponse
    {
        Gate::authorize('view', $material);

        abort_unless(Storage::disk('local')->exists($material->file_path), 404);

        return Storage::disk('local')->download($material->file_path, $material->file_name);
    }
}
