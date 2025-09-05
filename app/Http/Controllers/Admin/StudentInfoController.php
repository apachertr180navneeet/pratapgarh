<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentApplication;
use Mail,Hash,File,Auth,DB,Helper,Exception,Session,Redirect,Validator;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\NotificationUser;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentInfoController extends Controller
{
    //========================= User Member Funcations ========================//

    public function index() {
        // Get all students with 10 records per page
        $students = Student::orderBy('id', 'desc')->paginate(10);

        // Pass paginated data to view
        return view('admin.student_info.index', compact('students'));
    }

    public function show($id)
    {
        // Get the specific student by ID
        $student = Student::findOrFail($id);

        // Pass both single record and list to the view
        return view('admin.student_info.show', compact('student'));
    }



    public function search(Request $request)
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

        return view('admin.student_info.search', compact('students'));
    }


    public function import()
    {
        // Pass both single record and list to the view
        return view('admin.student_info.import');
    }


    public function importpost(Request $request)
    {
        // ✅ Step 1: Validate file
        $request->validate([
            'import_data' => 'required|mimes:xlsx,xls|max:5120', // 5MB limit
        ]);

        // ✅ Step 2: Load Excel file
        $file = $request->file('import_data')->getRealPath();
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        // ✅ Step 3: Loop rows (skip heading row 1)
        foreach ($rows as $index => $row) {
            if ($index == 1) continue;

            // ✅ Step 4: Insert into DB
            Student::create([
                'sr_no'                               => $row['A'],
                'course_name'                          => $row['B'],
                'application_no'                       => $row['C'],
                'application_date'                     => $row['D'],
                'student_name'                         => $row['E'],
                'category_name'                        => $row['F'],
                'mbc_candidate'                        => $row['G'],
                'disable'                              => $row['H'],
                'minority'                             => $row['I'],
                'minority_cast'                        => $row['J'],
                'ews'                                  => $row['K'],
                'dob'                                  => $row['L'],
                'gender'                               => $row['M'],
                'mobile'                               => $row['N'],
                'father_name'                          => $row['O'],
                'mother_name'                          => $row['P'],
                'current_address'                      => $row['Q'],
                'current_state'                        => $row['R'],
                'current_district'                     => $row['S'],
                'current_tehsil'                       => $row['T'],
                'current_pincode'                      => $row['U'],
                'permanent_address'                    => $row['V'],
                'permanent_state'                      => $row['W'],
                'permanent_district'                   => $row['X'],
                'permanent_pincode'                    => $row['Y'],
                'percentage'                           => $row['Z'],
                'merit_no'                             => $row['AA'],
                'seatcategory'                         => $row['AB'],
                'feefor'                               => $row['AC'],
                'total_fees'                           => $row['AD'],
                'token_no'                             => $row['AE'],
                'token_date'                           => $row['AF'],
                'seaction'                             => $row['AG'],
                'scholor_no'                           => $row['AH'],
                'compulsary_subject'                   => $row['AI'],
                'final_subject'                        => $row['AJ'],
                'subject_combination_1'                => $row['AK'],
                'subject_combination_2'                => $row['AL'],
                'subject_combination_3'                => $row['AM'],
                'subject_combination_4'                => $row['AN'],
                'subject_combination_5'                => $row['AO'],
                'subject_combination_6'                => $row['AP'],
                'subject_combination_7'                => $row['AQ'],
                'bpl'                                  => $row['AR'],
                'willingness_to_join_professional_course' => $row['AS'],
                '12th_percentage'                      => $row['AT'],
                'ydc'                                  => $row['AU'],
                'ncc'                                  => $row['AV'],
                'nss'                                  => $row['AW'],
                'rover_rengering'                      => $row['AX'],
                'human_right_cell'                     => $row['AY'],
                'women_cell'                           => $row['AZ'],
                'email'                                => $row['BA'],
                'roll_no'                              => $row['BB'],
                'pass_year'                            => $row['BC'],
                'total_marks'                          => $row['BD'],
                'obtain_marks'                         => $row['BE'],
                'board'                                => $row['BF'],
                'class'                                => $row['BG'],
            ]);
        }

        return back()->with('success', 'Students imported successfully!');
    }

    // public function generateCC(Request $request)
    // {
    //     $student = Student::findOrFail($request->student_id);
        
    //     // Generate 6 digit unique number
    //     $uniqueNumber = mt_rand(100000, 999999);
        
    //     // Pass student data and unique number to view
    //     $data = [
    //         'student' => $student,
    //         'certificate_number' => $uniqueNumber,
    //         'certificate_type' => 'CC'
    //     ];
        
    //     $pdf = Pdf::loadView('admin.student_info.cc_template', $data);
        
    //     // Download directly
    //     return $pdf->download('C_Certificate_'.$student->student_name.'_'.$uniqueNumber.'.pdf');
    // }


    public function generateCC(Request $request)
    {
        $student = Student::findOrFail($request->student_id);

        // Generate 6 digit unique number
        $uniqueNumber = mt_rand(100000, 999999);

        // Pass student data and unique number to view
        $data = [
            'student' => $student,
            'certificate_number' => $uniqueNumber,
            'certificate_type' => 'CC'
        ];

        $pdf = Pdf::loadView('admin.student_info.cc_template', $data);

        // Generate filename
        $filename = 'C_Certificate_'.$student->student_name.'_'.$uniqueNumber.'.pdf';

        // Create documents directory if it doesn't exist
        $path = public_path('uploads/documents');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        // Save PDF file
        $pdf->save($path.'/'.$filename);

        // Generate full URL for the saved file
        $fileUrl = url('uploads/documents/'.$filename);

        // ✅ Insert or Update student_application record
        StudentApplication::updateOrCreate(
            ['application_no' => $student->application_no], // Condition
            [
                'mobile'         => $student->mobile,
                'father_name'    => $student->father_name,
                'mother_name'    => $student->mother_name,
                'dob'            => $student->dob,
                'cc_cretifacate' => $fileUrl,   // Save CC certificate url
                'updated_at'     => now()
            ]
        );

        // Download file
        return $pdf->download($filename);
    }

    public function generateTC(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
        
        // Generate 6 digit unique number
        $uniqueNumber = mt_rand(100000, 999999);
        
        // Pass student data and unique number to view
        $data = [
            'student' => $student,
            'certificate_number' => $uniqueNumber,
            'certificate_type' => 'TC'
        ];
        
        $pdf = Pdf::loadView('admin.student_info.tc_template', $data);
        
        // Download directly
        return $pdf->download('Transfer_Certificate_'.$student->student_name.'_'.$uniqueNumber.'.pdf');
    }

   public function studentApplicationList()
    {
        $applications = DB::table('student_application as sa')
            ->leftJoin('students as s', function ($join) {
                $join->on(DB::raw('TRIM(LOWER(sa.mobile))'), '=', DB::raw('TRIM(LOWER(s.mobile))'))
                    ->on(DB::raw('TRIM(LOWER(sa.father_name))'), '=', DB::raw('TRIM(LOWER(s.father_name))'))
                    ->on(DB::raw('TRIM(LOWER(sa.mother_name))'), '=', DB::raw('TRIM(LOWER(s.mother_name))'))
                    ->on(DB::raw('TRIM(LOWER(sa.application_no))'), '=', DB::raw('TRIM(LOWER(s.application_no))'));
            })
            ->select(
                'sa.*',
                's.id as student_id',
                DB::raw('CASE WHEN s.id IS NOT NULL THEN 1 ELSE 0 END as link')
            )
            ->get();

        return view('admin.student_info.student_application_list', compact('applications'));
    }
    


}
