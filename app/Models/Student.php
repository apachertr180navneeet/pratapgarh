<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        'sr_no', 'course_name', 'application_no', 'application_date',
        'student_name', 'category_name', 'mbc_candidate', 'disable',
        'minority', 'minority_cast', 'ews', 'dob', 'gender', 'mobile',
        'father_name', 'mother_name', 'current_address', 'current_state',
        'current_district', 'current_tehsil', 'current_pincode',
        'permanent_address', 'permanent_state', 'permanent_district',
        'permanent_pincode', 'percentage', 'merit_no', 'seatcategory',
        'feefor', 'total_fees', 'token_no', 'token_date', 'seaction',
        'scholor_no', 'compulsary_subject', 'final_subject',
        'subject_combination_1', 'subject_combination_2',
        'subject_combination_3', 'subject_combination_4',
        'subject_combination_5', 'subject_combination_6',
        'subject_combination_7', 'bpl',
        'willingness_to_join_professional_course',
        '12th_percentage', 'ydc', 'ncc', 'nss', 'rover_rengering',
        'human_right_cell', 'women_cell', 'email', 'roll_no',
        'pass_year', 'total_marks', 'obtain_marks', 'board', 'class'
    ];
}
