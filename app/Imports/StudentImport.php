<?php

namespace App\Imports;


use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * Each Excel row will map to DB columns.
     */
    public function model(array $row)
    {
        // Helper function to format dates into dd/mm/yyyy
        $formatDate = function ($date) {
            if (empty($date)) {
                return null;
            }

            try {
                return Carbon::parse($date)->format('d/m/Y');
            } catch (\Exception $e) {
                return $date; // if invalid, keep original
            }
        };

        return new Student([
            'sr_no'                                => $row['sr_no'],
            'course_name'                          => $row['course_name'],
            'application_no'                       => $row['application_no'],
            'application_date'                     => $formatDate($row['application_date']),
            'student_name'                         => $row['student_name'],
            'category_name'                        => $row['category_name'],
            'mbc_candidate'                        => $row['mbc_candidate'],
            'disable'                              => $row['disable'],
            'minority'                             => $row['minority'],
            'minority_cast'                        => $row['minority_cast'],
            'ews'                                  => $row['ews'],
            'dob'                                  => $formatDate($row['dob']),
            'gender'                               => $row['gender'],
            'mobile'                               => $row['mobile'],
            'father_name'                          => $row['father_name'],
            'mother_name'                          => $row['mother_name'],
            'current_address'                      => $row['current_address'],
            'current_state'                        => $row['current_state'],
            'current_district'                     => $row['current_district'],
            'current_tehsil'                       => $row['current_tehsil'],
            'current_pincode'                      => $row['current_pincode'],
            'permanent_address'                    => $row['permanent_address'],
            'permanent_state'                      => $row['permanent_state'],
            'permanent_district'                   => $row['permanent_district'],
            'permanent_pincode'                    => $row['permanent_pincode'],
            'percentage'                           => $row['percentage'],
            'merit_no'                             => $row['merit_no'],
            'seatcategory'                         => $row['seatcategory'],
            'feefor'                               => $row['feefor'],
            'total_fees'                           => $row['total_fees'],
            'token_no'                             => $row['token_no'],
            'token_date'                           => $formatDate($row['token_date']),
            'seaction'                             => $row['seaction'],
            'scholor_no'                           => $row['scholor_no'],
            'compulsary_subject'                   => $row['compulsary_subject'],
            'final_subject'                        => $row['final_subject'],
            'subject_combination_1'                => $row['subject_combination_1'],
            'subject_combination_2'                => $row['subject_combination_2'],
            'subject_combination_3'                => $row['subject_combination_3'],
            'subject_combination_4'                => $row['subject_combination_4'],
            'subject_combination_5'                => $row['subject_combination_5'],
            'subject_combination_6'                => $row['subject_combination_6'],
            'subject_combination_7'                => $row['subject_combination_7'],
            'bpl'                                  => $row['bpl'],
            'willingness_to_join_professional_course' => $row['willingness_to_join_professional_course'],
            '12th_percentage'                      => $row['12th_percentage'],
            'ydc'                                  => $row['ydc'],
            'ncc'                                  => $row['ncc'],
            'nss'                                  => $row['nss'],
            'rover_rengering'                      => $row['rover_rengering'],
            'human_right_cell'                     => $row['human_right_cell'],
            'women_cell'                           => $row['women_cell'],
            'email'                                => $row['email'],
            'roll_no'                              => $row['roll_no'],
            'pass_year'                            => $row['pass_year'],
            'total_marks'                          => $row['total_marks'],
            'obtain_marks'                         => $row['obtain_marks'],
            'board'                                => $row['board'],
            'class'                                => $row['class'],
        ]);
    }
}
