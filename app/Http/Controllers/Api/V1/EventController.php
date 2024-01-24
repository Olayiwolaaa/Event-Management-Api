<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_public', true)->paginate();
        return EventResource::collection($events);
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->all());
        return response()->json($event, 201);
    }
}
