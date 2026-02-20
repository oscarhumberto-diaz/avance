<?php

namespace App\Http\Controllers;

use App\Models\PrincipleStage;
use Illuminate\View\View;

class PrinciplesController extends Controller
{
    public function index(): View
    {
        $stages = PrincipleStage::with(['principles' => fn ($query) => $query->orderBy('order')])
            ->orderBy('order')
            ->get();

        return view('principles.index', compact('stages'));
    }

    public function show(PrincipleStage $stage): View
    {
        $stage->load([
            'principles' => fn ($query) => $query->orderBy('order')->with([
                'lessons' => fn ($lessonQuery) => $lessonQuery->orderBy('order'),
            ]),
        ]);

        return view('principles.show', compact('stage'));
    }
}
