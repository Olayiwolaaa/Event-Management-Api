<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Event $event)
    {
        $tickets =  $event->tickets()
            ->orderBy('type')
            ->paginate();
        
        return TicketResource::collection($tickets);
    }
}
