<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Page::class, 'page');
    }

    public function index(): View
    {
        $pages = Page::with('parent')->orderBy('parent_id')->orderBy('order')->paginate(15);

        return view('admin.pages.index', compact('pages'));
    }

    public function create(): View
    {
        $parents = Page::orderBy('title')->get();

        return view('admin.pages.create', compact('parents'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('status', 'Página creada correctamente.');
    }

    public function edit(Page $page): View
    {
        $parents = Page::whereKeyNot($page->id)->orderBy('title')->get();

        return view('admin.pages.edit', compact('page', 'parents'));
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        $data = $this->validatedData($request, $page);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('status', 'Página actualizada correctamente.');
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('status', 'Página eliminada correctamente.');
    }

    private function validatedData(Request $request, ?Page $page = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('pages', 'slug')->ignore($page?->id),
            ],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],
            'parent_id' => ['nullable', 'integer', Rule::exists('pages', 'id')],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
