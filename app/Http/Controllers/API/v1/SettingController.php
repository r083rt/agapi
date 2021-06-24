<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use TCG\Voyager\Facades\Voyager;
use App\Models\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Voyager::model('Setting')->orderBy('id','asc')->get();
        return response()->json($settings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function information(){
        $res['posts_max'] = DB::select(DB::raw("SELECT users.*,count(*) as total_posts, (select count(*) from books where books.user_id=users.id) as total_books, (select count(*) from lesson_plans where lesson_plans.user_id=users.id) as total_lesson_plans, (select count(*) from events where events.user_id=users.id) as total_events, (select count(*) from event_guests where event_guests.user_id=users.id) as total_event_guests from users inner join posts on users.id=posts.author_id group by users.id order by total_posts desc limit 100"));

        $res['books_max'] = DB::select(DB::raw("SELECT users.*,count(*) as total_books, (select count(*) from posts where posts.author_id=users.id) as total_posts, (select count(*) from lesson_plans where lesson_plans.user_id=users.id) as total_lesson_plans, (select count(*) from events where events.user_id=users.id) as total_events, (select count(*) from event_guests where event_guests.user_id=users.id) as total_event_guests from users inner join books on users.id=books.user_id group by users.id order by total_books desc limit 100"));

        $res['lesson_plans_max'] = DB::select(DB::raw("SELECT users.*,count(*) as total_lesson_plans, (select count(*) from posts where posts.author_id=users.id) as total_posts, (select count(*) from books where books.user_id=users.id) as total_books, (select count(*) from event_guests where event_guests.user_id=users.id) as total_event_guests, (select count(*) from `events` where events.user_id=users.id) as total_events from users inner join lesson_plans on users.id=lesson_plans.user_id group by users.id order by total_lesson_plans desc limit 100"));

        $res['event_guests_max'] = DB::select(DB::raw("SELECT users.*,count(*) as total_event_guests, (select count(*) from posts where posts.author_id=users.id) as total_posts, (select count(*) from books where books.user_id=users.id) as total_books, (select count(*) from `events` where `events`.user_id=users.id) as total_events, (select count(*) from lesson_plans where lesson_plans.user_id=users.id) as total_lesson_plans from users inner join event_guests on users.id=event_guests.user_id group by users.id order by total_event_guests desc limit 100"));

        return response()->json($res);
    }

}
