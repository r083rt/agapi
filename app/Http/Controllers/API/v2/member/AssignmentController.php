<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\File;
use App\Models\AnswerList;
use App\Models\QuestionList;
use Illuminate\Support\Facades\Storage;

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
            ->where('is_publish', 1)
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
        // return response()->json('asd');
        $assignment = new Assigment($request->all());
        $assignment->code = base_convert($request->user()->id . time(), 10, 36);
        $assignment->is_publish = 1;
        $request->user()->assigments()->save($assignment);

        foreach ($request->question_lists as $ql => $question_list) {
            $assignment->question_lists()->attach([$question_list['id'] => [
                'creator_id' => $question_list['pivot']['creator_id'],
                'user_id' => $request->user()->id,
                'assigment_type_id' => $question_list['pivot']['assigment_type_id'],
            ]]);
        }
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
        // $request->question_lists = json_decode($request->question_lists, true);
        // return response()->json($question_lists);
        $assignment = new Assigment($request->all());
        $assignment->code = base_convert($request->user()->id . time(), 10, 36);
        // $assignment->fill($request->all());
        $request->user()->assigments()->save($assignment);

        foreach ($request->question_lists as $ql => $question_list) {
            // return response()->json($question_list);
            $item_question_list = new QuestionList($question_list);
            $item_question_list->save();
            $assignment->question_lists()->attach([$item_question_list->id => [
                'creator_id' => $request->user()->id,
                'user_id' => $request->user()->id,
                'assigment_type_id' => $question_list['assignment_type_id'],
            ]]);
            //check if question_list has image and save it
            if (isset($question_list['image'])) {
                $image = $request->question_lists[$ql]['image'];

                //compress image
                $fileName = time() . '.' . $image->extension();
                $compressedImage = \Image::make($image)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 60);
                $folderPath = "files";
                $path = "{$folderPath}/{$fileName}";

                Storage::disk(env('FILESYSTEM_DRIVER', 'wasabi'))->put($path, $compressedImage);
                //end compress image

                $file = new File();
                $file->type = 'image/jpeg';
                if ($path) {
                    $file->src = $path;
                    $item_question_list->images()->save($file);
                }
            }

            //check if question list has audio and save it
            if (isset($question_list['audio'])) {
                $file = new File();
                $file->type = 'audio/m4a';
                $path = $request->question_lists[$ql]['audio']->store('files', 'wasabi');
                if ($path) {
                    $file->src = $path;
                    $item_question_list->audio()->save($file);
                }
            }

            //save answer list
            foreach ($request->question_lists[$ql]['answer_lists'] as $al => $answer_list) {
                $item_answer_list = new AnswerList($answer_list);
                $item_question_list->answer_lists()->save($item_answer_list);

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

    public function showquestionlist($id)
    {
        $assignment = Assigment::with('question_lists.images', 'question_lists.answer_lists', 'grade', 'assigment_category', 'question_lists.assigment_types')->find($id);
        return response()->json($assignment);
    }

    public function search($keyword)
    {
        $assignment = Assigment::with('grade', 'user', 'teacher', 'assigment_category', 'comments', 'likes', 'liked', 'ratings', 'reviews')
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere(function ($query) use ($keyword) {
                $query->whereHas('grade', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })
                    ->orWhereHas('assigment_category', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('user', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate();
        return response()->json($assignment);
    }
}
