<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    use HasFactory;

    protected $table = "student_application";

    protected $fillable = [
        'application_request_id',
        'application_no',
        'mobile',
        'father_name',
        'mother_name',
        'dob',
        'aadhar_card',
        'marksheet',
    ];
}
