<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if($id)
        {
            $experience = Experience::find($id);

            if($experience)
                return ResponseFormatter::success(
                    $experience,
                    'Work Experience successfully'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data Not Found',
                    404
                );
        }

        $experience = Experience::all();

        if($experience)

        return ResponseFormatter::success(
            $experience,
            'Work Experience successfully'
        );
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'start_date' => ['required'],
                'end_date' => ['required'],
                'job_title' => ['required'],
                'company' => ['required'],
                'job_description' => ['required'],
            ]);

            $newdata = Experience::create([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'job_title' => $request->job_title,
                'company' => $request->company,
                'company_logo' => $request->company_logo,
                'job_description' => $request->job_description,
            ]);

            $experience = Experience::where('id', $newdata->id)->first();

            return ResponseFormatter::success([
                'experience' => $experience
            ],'Data Work Experience');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $experience = Experience::find($request->id);
        $experience->update($data);

        return ResponseFormatter::success($experience,'Work Experience Updated');
    }

    public function destroy($id)
    {
        Experience::destroy($id);
        return ResponseFormatter::success('Work Experience Deleted');
    }

}
