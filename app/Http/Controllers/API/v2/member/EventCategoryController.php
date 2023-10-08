<?php

namespace App\Http\Controllers\API\v2\member;;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventCategory;


class EventCategoryController extends Controller
{
    public function index()
    {

        return EventCategory::get();
    }

}
