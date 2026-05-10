<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FleetCategory;

class ServiceController extends Controller
{
    public function index()
    {
        $fleetCategories = FleetCategory::with(['photos' => fn($q) => $q->where('is_active', true)])
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('web.services', get_defined_vars());
    }
}
