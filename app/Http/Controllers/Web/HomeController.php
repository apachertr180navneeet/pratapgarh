<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentApplication;
use Mail,Hash,File,Auth,DB,Helper,Exception,Session,Redirect,Validator;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        return view('web.home.index');
    }

    public function submitStudent(Request $request)
    {
        //dd($request->document_type);
        // ✅ Ensure folder exists
        if (!Storage::disk('public')->exists('student_docs')) {
            Storage::disk('public')->makeDirectory('student_docs');
        }

        // ✅ Store files
        $aadharPath   = $request->file('aadhar_card')->store('student_docs', 'public');
        $marksheetPath = $request->file('marksheet')->store('student_docs', 'public');

        $aadharUrl   = asset('storage/' . $aadharPath);
        $marksheetUrl = asset('storage/' . $marksheetPath);

        // ✅ Generate unique application_request_id
        $applicationRequestId = strtoupper('APP-' . uniqid() . '-' . rand(1000, 9999));
        // OR use: $applicationRequestId = Str::uuid();

        // ✅ Save in DB
        StudentApplication::create([
            'application_request_id' => $applicationRequestId,
            'application_no'         => $request->application_no,
            'mobile'                 => $request->mobile,
            'father_name'            => $request->father_name,
            'mother_name'            => $request->mother_name,
            'dob'                    => $request->dob,
            'document_type'          => $request->document_type,
            'aadhar_card'            => $aadharUrl,
            'marksheet'              => $marksheetUrl,
        ]);

        return redirect()->back()->with('success', 'Student application submitted successfully.');
    }


    public function searchStudent(Request $request)
    {
        $students = null;

        $application_no = trim((string) $request->input('application_no', ''));
        $mobile = trim((string) $request->input('mobile', ''));
        $father_name = trim((string) $request->input('father_name', ''));
        $dob = trim((string) $request->input('dob', ''));

        if ($application_no !== '' || $mobile !== '') {
            $query = Student::query();

            if ($application_no !== '' && $mobile !== '' && $father_name !== '' && $dob !== '') {
                $query->where(function ($q) use ($application_no, $mobile, $father_name, $dob) {
                    $q->where('application_no', $application_no)
                      ->Where('mobile', $mobile)
                      ->Where('father_name', $father_name);
                });
            } elseif ($application_no !== '') {
                $query->where('application_no', $application_no);
            } elseif ($mobile !== '') {
                $query->where('mobile', $mobile);
            }

            $students = $query->orderBy('id', 'desc')->paginate(10)->appends($request->only(['application_no', 'mobile']));
        }

        return view('web.home.index', compact('students'));
    }

    public function show($id)
    {
        // Get the specific student by ID
        $student = Student::findOrFail($id);

        // Pass both single record and list to the view
        return view('web.home.show', compact('student'));
    }
}
