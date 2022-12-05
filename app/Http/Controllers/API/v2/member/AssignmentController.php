<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\File;
use App\Models\AnswerList;
use App\Models\QuestionList;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assignment = Assigment::with('grade', 'user', 'teacher', 'assigment_category', 'comments', 'likes', 'liked', 'ratings', 'reviews')
            ->orderBy('id', 'desc')
            ->paginate();
        return response()->json($assignment);
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

    public function storequestionlist(Request $request)
    {
        // return response()->json($request->all());
        $assignment = new Assigment($request->all());
        $assignment->code = base_convert($request->user()->id . time(), 10, 36);
        // $assignment->fill($request->all());
        $request->user()->assigments()->save($assignment);

        foreach ($request->question_lists as $ql => $question_list) {
            $item_question_list = new QuestionList($question_list);
            $assignment->question_lists()->save($item_question_list);
            $assignment->question_lists()->attach([$item_question_list->id => [
                'creator_id' => $request->user()->id,
                'user_id' => $request->user()->id,
                'assigment_type_id' => $question_list['assignment_type_id'],
            ]]);
            //check if question_list has image and save it
            if (isset($question_list['image'])) {
                $image = $request->question_lists[$ql]['image'];

                $file = new File();
                $file->type = 'image/jpeg';
                $path = $image->store('files', 'wasabi');
                if ($path) {
                    $file->src = $path;
                    $question_list->images()->save($file);
                }
            }

            //check if question list has audio and save it
            if (isset($question_list['audio'])) {
                $file = new File();
                $file->type = 'audio/m4a';
                $path = $request->question_lists[$ql]['audio']->store('files', 'wasabi');
                if ($path) {
                    $file->src = $path;
                    $question_list->audio()->save($file);
                }
            }
            //save answer list
            foreach ($question_list['answer_lists'] as $al => $answer_list) {
                $question_list->answer_lists()->create($answer_list);

                //check if answer_list has image and save it
                if (isset($answer_list['image'])) {
                    $file = new File();
                    $file->type = 'image/jpeg';
                    $path = $request->$answer_list[$al]['image']->store('files', 'wasabi');
                    if ($path) {
                        $file->src = $path;
                        $answer_list->images()->save($file);
                    }
                }

                //check if answer list has audio and save it
                if (isset($answer_list['audio'])) {
                    $file = new File();
                    $file->type = 'audio/m4a';
                    $path =
                        $request->$answer_list[$al]['audio']->store('files', 'wasabi');
                    if ($path) {
                        $file->src = $path;
                        $answer_list->audio()->save($file);
                    }
                }
            }
        }


        //save to assignment question list


        return response()->json($assignment->load('question_lists', 'question_lists.answer_lists'));
    }
}
