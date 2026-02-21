<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::orderBy('starts_at')->paginate(20);

        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.events.create', [
            'event' => new Event(),
            'visibilities' => Event::VISIBILITIES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Event::create($this->validatedData($request));

        return redirect()->route('admin.events.index')->with('status', 'Evento creado correctamente.');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', [
            'event' => $event,
            'visibilities' => Event::VISIBILITIES,
        ]);
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $event->update($this->validatedData($request));

        return redirect()->route('admin.events.index')->with('status', 'Evento actualizado correctamente.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('status', 'Evento eliminado correctamente.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after_or_equal:starts_at'],
            'location' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'visibility' => ['required', Rule::in(Event::VISIBILITIES)],
        ]);
    }
}
