<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\View\View;

class TestimonyController extends Controller
{
    public function index(): View
    {
        $testimonies = Testimony::query()
            ->published()
            ->latest()
            ->paginate(12);

        return view('testimonies.index', compact('testimonies'));
    }
}
