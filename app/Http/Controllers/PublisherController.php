<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publishers\StoreRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {

        $publishers = Publisher::query()->orderBy('id', 'DESC')->get();
        return view('Publishers.publisher', [
            'publishers' => $publishers
        ]);
    }

    public function create()
    {
        return view('Publishers.create');
    }

    public function store(StoreRequest $request)
    {
        $publisher = Publisher::query()->create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('publishers');
    }
}
