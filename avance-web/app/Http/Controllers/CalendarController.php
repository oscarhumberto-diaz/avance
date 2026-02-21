<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function index(Request $request): View
    {
        $viewMode = $request->query('view', 'month');
        $viewMode = in_array($viewMode, ['month', 'list'], true) ? $viewMode : 'month';

        $monthInput = (string) $request->query('month', now()->format('Y-m'));
        $month = preg_match('/^\d{4}-\d{2}$/', $monthInput) ? Carbon::parse($monthInput . '-01') : now();

        $monthStart = $month->copy()->startOfMonth()->startOfDay();
        $monthEnd = $month->copy()->endOfMonth()->endOfDay();

        $eventsQuery = Event::query()
            ->orderBy('starts_at');

        if (!$this->canViewNonPublicEvents($request)) {
            $eventsQuery->visibleToPublic();
        }

        $monthEvents = (clone $eventsQuery)
            ->where('starts_at', '<=', $monthEnd)
            ->where('ends_at', '>=', $monthStart)
            ->get();

        $timelineEvents = (clone $eventsQuery)
            ->where('starts_at', '>=', now()->startOfDay())
            ->limit(30)
            ->get();

        $eventsByDay = $this->groupEventsByDay($monthEvents, $monthStart, $monthEnd);

        return view('calendar.index', [
            'viewMode' => $viewMode,
            'month' => $month,
            'eventsByDay' => $eventsByDay,
            'timelineEvents' => $timelineEvents,
        ]);
    }

    private function canViewNonPublicEvents(Request $request): bool
    {
        return $request->user() && in_array($request->user()->role, ['admin', 'editor'], true);
    }

    private function groupEventsByDay(Collection $events, Carbon $monthStart, Carbon $monthEnd): array
    {
        $eventsByDay = [];

        for ($day = $monthStart->copy(); $day->lte($monthEnd); $day->addDay()) {
            $dayKey = $day->toDateString();
            $eventsByDay[$dayKey] = $events
                ->filter(function (Event $event) use ($day): bool {
                    return $event->starts_at->copy()->startOfDay()->lte($day)
                        && $event->ends_at->copy()->startOfDay()->gte($day);
                })
                ->values();
        }

        return $eventsByDay;
    }
}
