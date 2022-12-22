<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\IslamicStudy;
use Illuminate\Http\Request;

class IslamicStudyController extends Controller
{
    //

    public function index(Request $request){
        $islamic_studies = IslamicStudy::with('thumbnail', 'content', 'category')->orderBy('id', 'desc');

        if($request->filter){
            $islamic_studies->where('title', 'like', "%$request->filter%");
        }

        $islamic_studies = $islamic_studies->paginate($request->per_page);

        return response()->json($islamic_studies);
    }

    public function approval($id){
        $islamic_study = IslamicStudy::findOrFail($id);
        $islamic_study->status = "Published";
        $islamic_study->save();

        return response()->json($islamic_study->load('thumbnail', 'content', 'category'));
    }

    public function rejected($id)
    {
        $islamic_study = IslamicStudy::findOrFail($id);
        $islamic_study->status = "Rejected";
        $islamic_study->save();

        return response()->json($islamic_study->load('thumbnail', 'content', 'category'));
    }
}
