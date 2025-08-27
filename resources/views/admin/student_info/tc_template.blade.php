<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Character Certificate</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }
        .container {
            width: 90%;
            margin: auto;
            border: 2px solid black;
            padding: 25px;
        }
        .header {
            text-align: center;
            font-weight: bold;
        }
        .college-name {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .certificate-title {
            font-size: 16px;
            margin-top: 5px;
            text-decoration: underline;
        }
        .content {
            margin-top: 30px;
            font-size: 15px;
        }
        .footer {
            margin-top: 60px;
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Header --}}
        <div class="header">
            <div class="college-name">Government Post Graduate College, Pratapgarh (Raj.)</div>
            <div class="certificate-title">Character Certificate</div>
        </div>

        {{-- Certificate Content --}}
        <div class="content">
            <p>
                Certificate No.: ___________ &nbsp;&nbsp; Date: {{ date('d-m-Y') }}
            </p>
            <p>
                This is to certify that <b>{{ $student->student_name }}</b>, 
                son/daughter of <b>{{ $student->father_name }}</b>, 
                has been a bonafide student of this college from session 
                <b>{{ $student->session ?? '____' }}</b> to 
                <b>{{ $student->pass_year ?? '____' }}</b>.
            </p>
            <p>
                During this period, his/her conduct and character has been found to be satisfactory/good/excellent.
            </p>
        </div>

        {{-- Footer --}}
        <div class="footer">
            Principal <br>
            Government Post Graduate College <br>
            Pratapgarh (Raj.)
        </div>
    </div>
</body>
</html>
