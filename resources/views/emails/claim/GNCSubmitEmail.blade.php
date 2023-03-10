<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h1><strong>{{ $title }}</strong></h1>
    {{-- {{ dd($data['data']) }} --}}
    <br>
    <br>
    <p>To : {{ $supervisor ?? '-' }}</p>
    <p>I hereby submit my general claim for your kind review.</p>
    <p>The details are :-</p>
    <br>
    <br>
    <p><strong>Claim ID </strong> : {{ $data['data']->id ?? '-' }}</p>
    <p><strong>Name </strong> : {{ $employeeName ?? '-' }} </p>
    <p><strong>Claim for the month </strong> : {{ $data['data']->month ?? '-' }} </p>
    <p><strong>Applied Date & Time </strong> : {{ $data['data']->created_at ?? '-' }} </p>
    <p><strong>Total Claim </strong> : {{ $data['data']->total_amount ?? '0' }} </p>

    <p>Please click the link button for further action </p>
    <a href="{{ env('APP_URL') . '/claimApprovalView/2' }}"><button>Activate</button></a>
    <br>
    <br>
    <p>
        Best regards,<br>
        {{-- {{ dd(getEmployeeDetail(Auth::user()->id)) }} --}}
        {{ getEmployeeDetail(Auth::user()->id)->employeeName ?? '-' }} <br>
        {{ getEmployeeDetail(Auth::user()->id)->designation->designationName ?? '-' }} <br>
        {{ getEmployeeDetail(Auth::user()->id)->department->departmentName ?? '-' }} <br>
    </p>
</body>

</html>
