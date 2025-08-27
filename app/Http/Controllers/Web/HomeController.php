<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Mail,Hash,File,Auth,DB,Helper,Exception,Session,Redirect,Validator;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\NotificationUser;


class HomeController extends Controller
{
    public function index()
    {
        return view('web.home.index');
    }


    // public function searchStudent(Request $request)
    // {
    //     $students = null;

    //     $srNumber = trim((string) $request->input('sr_number', ''));
    //     $phone = trim((string) $request->input('phone', ''));

    //     if ($srNumber !== '' || $phone !== '') {
    //         $query = Student::query();

    //         if ($srNumber !== '' && $phone !== '') {
    //             $query->where(function ($q) use ($srNumber, $phone) {
    //                 $q->where('sr_number', $srNumber)
    //                   ->orWhere('phone', $phone);
    //             });
    //         } elseif ($srNumber !== '') {
    //             $query->where('sr_number', $srNumber);
    //         } elseif ($phone !== '') {
    //             $query->where('phone', $phone);
    //         }

    //         $students = $query->orderBy('id', 'desc')->paginate(10)->appends($request->only(['sr_number', 'phone']));
    //     }

    //     return view('web.home.index', compact('students'));
    // }


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
