<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transfer Certificate</title>
  <style>
    body { font-family: "Times New Roman", serif; font-size: 14px; }
    .container { border: 2px solid #000; padding: 20px; margin: 20px; }
    .header { text-align: center; margin-bottom: 15px; }
    .header .college-name { font-weight: bold; font-size: 18px; }
    .header .title { font-size: 16px; font-weight: bold; border: 2px solid #000; display: inline-block; padding: 4px 12px; }
    .dotted { border-bottom: 1px dotted #000; display: inline-block; min-width: 200px; }
    table { width: 100%; margin-top: 10px; }
    td { padding: 5px; vertical-align: top; }
    .lecture-table { width: 100%; border: 1px solid #000; border-collapse: collapse; margin-top: 15px; }
    .lecture-table th, .lecture-table td { border: 1px solid #000; padding: 6px; text-align: center; }
    .footer { margin-top: 50px; text-align: right; font-weight: bold; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="college-name">Government Post Graduate College, Pratapgarh (Raj.)</div>
      <div class="title">TRANSFER CERTIFICATE</div>
    </div>

    <div>
      <strong>Serial No.:</strong> {{ $certificate_type }}/{{ $certificate_number }}/{{ date('Y') }}
      &nbsp;&nbsp; 
      <strong>Date:</strong> {{ date('d-m-Y') }}
      <span style="float:right;"><strong>Enrollment No.:</strong> {{ $enrollment_number }}</span>
    </div>

    <table>
      <tr><td>Name</td><td>: {{ $student->student_name }}</td></tr>
      <tr><td>Father's Name</td><td>: {{ $student->father_name }}</td></tr>
      <tr><td>Mother's Name</td><td>: {{ $student->mother_name }}</td></tr>
      <tr><td>Gender</td><td>: {{ ucfirst($student->gender) }}</td></tr>
      <tr><td>Date of Birth</td><td>: {{ $student->dob }}</td></tr>
      <tr><td>Category</td><td>: {{ $student->category_name }}</td></tr>
      <tr><td>Permanent Address</td><td>: {{ $student->permanent_address }}</td></tr>
      <tr><td>Reason for Leaving College</td><td>: ________________________</td></tr>
      <tr><td>Last Exam Passed</td><td>: ________________________</td></tr>
      <tr>
        <td>Subjects</td>
        <td>
          1. {{ $student->subject_combination_1 }}  
          2. {{ $student->subject_combination_2 }}  
          3. {{ $student->subject_combination_3 }}  
          4. {{ $student->subject_combination_4 }}  
          5. {{ $student->subject_combination_5 }}
        </td>
      </tr>
      <tr><td>Character</td><td>: Good</td></tr>
      <tr><td>All dues paid</td><td>: Yes / No</td></tr>
    </table>

    <h4 style="margin-top: 20px;">Lecture / Attendance</h4>
    <table class="lecture-table">
      <tr><th>Subject</th><th>Lectures Delivered</th><th>Lectures Attended</th><th>Remarks</th></tr>
      @for ($i = 1; $i <= 5; $i++)
        <tr>
          <td>{{ $i }}</td><td></td><td></td><td></td>
        </tr>
      @endfor
    </table>

    <div class="footer">
      Principal <br>
      Government Post Graduate College, Pratapgarh (Raj.)
    </div>
  </div>
</body>
</html>
