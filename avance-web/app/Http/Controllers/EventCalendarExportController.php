<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventCalendarExportController extends Controller
{
    public function __invoke(Request $request, Event $event): Response
    {
        if (!$this->canViewEvent($request, $event)) {
            abort(404);
        }

        $ics = $this->generateIcs($event);
        $filename = 'evento-' . $event->id . '.ics';

        return response($ics, 200, [
            'Content-Type' => 'text/calendar; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function canViewEvent(Request $request, Event $event): bool
    {
        if ($event->visibility === Event::VISIBILITY_PUBLIC) {
            return true;
        }

        return $request->user() && in_array($request->user()->role, ['admin', 'editor'], true);
    }

    private function generateIcs(Event $event): string
    {
        $uid = 'event-' . $event->id . '@avance.local';
        $now = now()->utc()->format('Ymd\THis\Z');
        $startsAt = $event->starts_at->copy()->utc()->format('Ymd\THis\Z');
        $endsAt = $event->ends_at->copy()->utc()->format('Ymd\THis\Z');

        $lines = [
            'BEGIN:VCALENDAR',
            'VERSION:2.0',
            'PRODID:-//AVANCE//Calendario de Eventos//ES',
            'CALSCALE:GREGORIAN',
            'METHOD:PUBLISH',
            'BEGIN:VEVENT',
            'UID:' . $uid,
            'DTSTAMP:' . $now,
            'DTSTART:' . $startsAt,
            'DTEND:' . $endsAt,
            'SUMMARY:' . $this->escapeIcsText($event->title),
            'LOCATION:' . $this->escapeIcsText((string) $event->location),
            'DESCRIPTION:' . $this->escapeIcsText((string) $event->description),
            'END:VEVENT',
            'END:VCALENDAR',
        ];

        return implode("\r\n", $lines) . "\r\n";
    }

    private function escapeIcsText(string $value): string
    {
        return str_replace(
            ["\\", ';', ',', "\r\n", "\n", "\r"],
            ['\\\\', '\\;', '\\,', '\\n', '\\n', '\\n'],
            $value
        );
    }
}
