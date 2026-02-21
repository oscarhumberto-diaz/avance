<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TestimonyController extends Controller
{
    public function index(): View
    {
        $testimonies = Testimony::latest()->paginate(20);

        return view('admin.testimonies.index', compact('testimonies'));
    }

    public function create(): View
    {
        return view('admin.testimonies.create', ['types' => Testimony::TYPES]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['status'] = Testimony::STATUS_PENDING;

        Testimony::create($data);

        return redirect()->route('admin.testimonies.index')->with('status', 'Testimonio creado correctamente.');
    }

    public function edit(Testimony $testimonio): View
    {
        return view('admin.testimonies.edit', [
            'testimony' => $testimonio,
            'types' => Testimony::TYPES,
        ]);
    }

    public function update(Request $request, Testimony $testimonio): RedirectResponse
    {
        $data = $this->validatedData($request);

        $testimonio->update($data);

        return redirect()->route('admin.testimonies.index')->with('status', 'Testimonio actualizado correctamente.');
    }

    public function destroy(Testimony $testimonio): RedirectResponse
    {
        $testimonio->delete();

        return redirect()->route('admin.testimonies.index')->with('status', 'Testimonio eliminado correctamente.');
    }

    public function approve(Testimony $testimonio): RedirectResponse
    {
        $testimonio->update(['status' => Testimony::STATUS_APPROVED]);

        return redirect()->route('admin.testimonies.index')->with('status', 'Testimonio aprobado correctamente.');
    }

    public function publish(Testimony $testimonio): RedirectResponse
    {
        $testimonio->update(['status' => Testimony::STATUS_PUBLISHED]);

        return redirect()->route('admin.testimonies.index')->with('status', 'Testimonio publicado correctamente.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'type' => ['required', Rule::in(Testimony::TYPES)],
            'author_name' => ['required', 'string', 'max:255'],
            'age' => ['nullable', 'integer', 'between:1,120'],
            'stage_principle' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:500'],
            'body' => ['nullable', 'string', 'max:5000'],
            'video_url' => ['nullable', 'url', 'max:2048', 'required_if:type,video'],
        ]);
    }
}
