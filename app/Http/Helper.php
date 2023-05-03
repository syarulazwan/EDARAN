<?php

use App\Models\ActivityLogs;
use App\Models\ApprovelRoleGeneral;
use App\Models\Branch;
use App\Models\ClaimCategory;
use App\Models\ClaimCategoryContent;
use App\Models\ClaimDateSetting;
use App\Models\AppealMtc;
use App\Models\ApprovalConfig;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Designation;
use App\Models\DomainList;
use App\Models\Employee;
use App\Models\EmploymentType;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use App\Models\JobGrade;
use App\Models\Project;
use App\Models\ProjectLocation;
use App\Models\ProjectMember;
use App\Models\Role;
use App\Models\TimesheetEvent;
use App\Models\TypeOfLogs;
use App\Models\Unit;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\UserRole;
use App\Models\TransportMillage;
use App\Models\EclaimGeneral;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

if (!function_exists('pr')) {
    function pr($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
    }
}

if (!function_exists('getCountryRegisterDomain')) {
    function getCountryRegisterDomain()
    {
        $data = ["Malaysia", 'Brunei', "Singapore"];
        return $data;
    }
}

// if (!function_exists('upload')) {
//     function upload($uploadedFile, $type = '')
//     {
//         // $filename = time() . $uploadedFile->getClientOriginalName();

//         // Storage::disk('local')->putFileAs(
//         //     'public/',
//         //     $uploadedFile,
//         //     $filename
//         // );
//         $filename = $uploadedFile->getClientOriginalName();
//         //$filename = time() . $uploadedFile->getClientOriginalName();

//         Storage::disk('local')->put(
//             'public/' . $filename,
//             file_get_contents($uploadedFile)
//         );

//         $data['filename'] = $filename;

//         return $data;
//     }
// }

// if (!function_exists('upload')) {
//     function upload($uploadedFile, $type = '')
//     {
//         $filename = $uploadedFile->getClientOriginalName();

//         Storage::disk('local')->put(
//             'public/' . $filename,
//             file_get_contents($uploadedFile)
//         );

//         $data['filename'] = $filename;

//         return $data;
//     }
// }
function manyFile($filename, $uploadedFile)
{
    $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
    $maxSize = 5120; // 5MB

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($extension, $allowedTypes)) {
        throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
    }

    if (filesize($uploadedFile) > $maxSize * 1024) {
        throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
    }

    $newFilename = uniqid() . '.' . $extension;
    Storage::disk('local')->put(
        'public/' . $newFilename,
        file_get_contents($uploadedFile)
    );

    $data['filename'] = $newFilename;

    return $data;
}
// function PersonalFile($filename, $uploadedFile)
// {
//     $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
//     $maxSize = 5120; // 5MB

//     $extension = pathinfo($filename, PATHINFO_EXTENSION);

//     if (!in_array($extension, $allowedTypes)) {
//         throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
//     }

//     if (filesize($uploadedFile) > $maxSize * 1024) {
//         throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
//     }

//     $newFilename = uniqid() . '.' . $extension;
//     Storage::disk('local')->put(
//         'public/PersonalFile/' . $newFilename,
//         file_get_contents($uploadedFile)
//     );

//     $data['filename'] = $newFilename;

//     return $data;
// }
// function TravelFile($filename, $uploadedFile)
// {
//     $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
//     $maxSize = 5120; // 5MB

//     $extension = pathinfo($filename, PATHINFO_EXTENSION);

//     if (!in_array($extension, $allowedTypes)) {
//         throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
//     }

//     if (filesize($uploadedFile) > $maxSize * 1024) {
//         throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
//     }

//     $newFilename = uniqid() . '.' . $extension;
//     Storage::disk('local')->put(
//         'public/TravelFile/' . $newFilename,
//         file_get_contents($uploadedFile)
//     );

//     $data['filename'] = $newFilename;

//     return $data;
// }
// function SubFile($filename, $uploadedFile)
// {
//     $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
//     $maxSize = 5120; // 5MB

//     $extension = pathinfo($filename, PATHINFO_EXTENSION);

//     if (!in_array($extension, $allowedTypes)) {
//         throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
//     }

//     if (filesize($uploadedFile) > $maxSize * 1024) {
//         throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
//     }

//     $newFilename = uniqid() . '.' . $extension;
//     Storage::disk('local')->put(
//         'public/SubFile/' . $newFilename,
//         file_get_contents($uploadedFile)
//     );

//     $data['filename'] = $newFilename;

//     return $data;
// }
function uploadFile($filename, $uploadedFile, $fileType, $destinationDir)
{
    $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
    $maxSize = 5120; // 5MB

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($extension, $allowedTypes)) {
        throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
    }

    if (filesize($uploadedFile) > $maxSize * 1024) {
        throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
    }

    $newFilename = uniqid() . '.' . $extension;
    Storage::disk('local')->put(
        'public/' . $destinationDir . '/' . $newFilename,
        file_get_contents($uploadedFile)
    );

    $data['filename'] = $newFilename;

    return $data;
}

if (!function_exists('upload')) {
    function upload($uploadedFile, $type = '')
    {
        $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
        $maxSize = 5120; // 5MB

        $filename = $uploadedFile->getClientOriginalName();
        $extension = $uploadedFile->getClientOriginalExtension();

        if (!in_array($extension, $allowedTypes)) {
            throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
        }

        if ($uploadedFile->getSize() > $maxSize * 1024) {
            throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
        }

        Storage::disk('local')->put(
            'public/' . $filename,
            file_get_contents($uploadedFile)
        );

        $data['filename'] = $filename;

        return $data;
    }
}

if (!function_exists('uploadAppeal')) {
    function uploadAppeal($uploadedFile, $type = '')
    {
        $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
        $maxSize = 5120; // 5MB

        $filename = $uploadedFile->getClientOriginalName();
        $extension = $uploadedFile->getClientOriginalExtension();

        if (!in_array($extension, $allowedTypes)) {
            throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
        }

        if ($uploadedFile->getSize() > $maxSize * 1024) {
            throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
        }

        Storage::disk('local')->put(
            'public/Appeal/' . $filename,
            file_get_contents($uploadedFile)
        );

        $data['filename'] = $filename;

        return $data;
    }
}
if (!function_exists('uploadPic')) {
    function uploadPic($uploadedFile, $type = '')
    {
        $allowedTypes = ['pdf', 'jpeg', 'jpg', 'png'];
        $maxSize = 5120; // 5MB

        $filename = $uploadedFile->getClientOriginalName();
        $extension = $uploadedFile->getClientOriginalExtension();

        if (!in_array($extension, $allowedTypes)) {
            throw new Exception("Invalid file type. Only PDF, JPEG, PNG, and JPG files are allowed.");
        }

        if ($uploadedFile->getSize() > $maxSize * 1024) {
            throw new Exception("File size exceeds the maximum allowed limit of 5 MB.");
        }

        Storage::disk('local')->put(
            'public/profilePic/' . $filename,
            file_get_contents($uploadedFile)
        );

        $data['filename'] = $filename;

        return $data;
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date = '')
    {
        $data = date_format(date_create($date), 'Y-m-d');

        return $data;
    }
}

if (!function_exists('dateFormatInput')) {
    function dateFormatInput($date = '')
    {
        $data = date_format(date_create($date), 'Y-m-d h:m:s');

        return $data;
    }
}

if (!function_exists('responseH')) {
    function responseH($user)
    {
        $token  = $user->createToken(str()->random(40))->plainTextToken;

        return response()->json([
            // 'user'=>$user,
            'token' => 'Bearer ' . $token,
            // 'token_type' => 'Bearer'
        ]);
    }
}

if (!function_exists('getMaritalStatus')) {
    function getMaritalStatus($id = '')
    {
        $data = [

            '1' => 'SINGLE',
            '2' => 'MARRIED',
            '3' => 'DIVORCED',
            '4' => 'WIDOWED',
            '5' => 'SEPARATED',
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('gender')) {
    function gender()
    {
        $data = [
            '1' => 'MALE',
            '2' => 'FEMALE',
        ];

        return $data;
    }
}

if (!function_exists('reminder')) {
    function reminder()
    {
        $data = [
            '1' => '5 Minute Before',
            '2' => '10 Minute Before',
            '3' => '15 Minute Before',
            '4' => '20 Minute Before',
            '5' => '30 Minute Before',
            '6' => '1 Hour Before',
        ];

        return $data;
    }
}



if (!function_exists('educationLevel')) {
    function educationLevel($id = '')
    {
        $data = [

            '1' => 'NONE',
            '2' => 'YEAR 1',
            '3' => 'YEAR 2',
            '4' => 'YEAR 3',
            '5' => 'YEAR 4',
            '6' => 'YEAR 5',
            '7' => 'YEAR 6',
            '8' => 'FORM 1',
            '9' => 'FORM 2',
            '10' => 'FORM 3',
            '11' => 'FORM 4',
            '12' => 'FORM 5',
            '13' => 'STPM',
            '14' => 'STAM',
            '15' => 'MATRICULATION',
            '16' => 'FOUNDATION',
            '17' => 'DIPLOMA',
            '18' => "BACHELOR'S DEGREE",
            '19' => "MASTER'S DEGREE",
            '20' => "DOCTORATE'S DEGREE",
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('educationType')) {
    function educationType($id = '')
    {
        $data = [

            '1' => 'PRE-SCHOOL',
            '2' => 'PRIMARY SCHOOL',
            '3' => 'LOWER SECONDARY SCHOOL',
            '4' => 'UPPER SECONDARY SCHOOL',
            '5' => 'PRE-UNIVERSITY',
            '6' => 'MATRICULATION/FOUNDATION',
            '7' => 'CERTIFICATE',
            '8' => 'HIGHER EDUCATION',
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('relationship')) {
    function relationship($id = '')
    {
        $data = [

            '1' => 'GRANDFATHER',
            '2' => 'GRANDMOTHER',
            '3' => 'GRANDFATHER-IN-LAW',
            '4' => 'GRANDMOTHER-IN-LAW',
            '5' => 'FATHER',
            '6' => 'MOTHER',
            '7' => 'FATHER-IN-LAW',
            '8' => 'MOTHER-IN-LAW',
            '9' => 'BROTHER',
            '10' => 'SISTER',
            '11' => 'BROTHER-IN-LAW',
            '12' => 'SISTER-IN-LAW',
            '13' => 'GUARDIAN',
            '14' => 'STEP-FATHER',
            '15' => 'STEP-MOTHER',
            '16' => 'SPOUSE',
            '17' => 'GUARDIAN',

        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('city')) {
    function city()
    {
        $data = [
            '1' => 'city1',
            '2' => 'city2',
        ];

        return $data;
    }
}

if (!function_exists('state1')) {
    function state1()
    {
        $data = [
            '1' => 'state1',
            '2' => 'state2',
        ];

        return $data;
    }
}

if (!function_exists('americas')) {
    function americas()
    {
        $data = [
            'pI' => "ANGUILLA",
            'AG' => "ANTIGUA AND BARBUDA",
            'AR' => "ARGENTINA",
            'AW' => "ARUBA",
            'BS' => "BAHAMAS",
            'BB' => "BARBADOS",
            'BZ' => "BELIZE",
            'BM' => "BERMUDA",
            'BO' => "BOLIVIA",
            'BR' => "BRAZIL",
            'VG' => "BRITISH VIRGIN ISLANDS",
            'CA' => "CANADA",
            'KY' => "CAYMAN ISLANDS",
            'CL' => "CHILE",
            'CO' => "COLOMBIA",
            'CR' => "COSTA RICA",
            'CU' => "CUBA",
            'DM' => "DOMINICA",
            'DO' => "DOMINICAN REPUBLIC",
            'EC' => "ECUADOR",
            'SV' => "EL SALVADOR",
            'FK' => "FALKLAND ISLANDS",
            'GF' => "FRENCH GUIANA",
            'GL' => "GREENLAND",
            'GD' => "GRENADA",
            'GP' => "GUADELOUPE",
            'GT' => "GUATEMALA",
            'GY' => "GUYANA",
            'HT' => "HAITI",
            'HN' => "HONDURAS",
            'JM' => "JAMAICA",
            'MQ' => "MARTINIQUE",
            'MX' => "MEXICO",
            'MS' => "MONTSERRAT",
            'AN' => "NETHERLANDS ANTILLES",
            'NI' => "NICARAGUA",
            'PA' => "PANAMA",
            'PY' => "PARAGUAY",
            'PE' => "PERU",
            'PR' => "PUERTO RICO",
            'BL' => "SAINT BARTHÉLEMY",
            'KN' => "SAINT KITTS AND NEVIS",
            'LC' => "SAINT LUCIA",
            'MF' => "SAINT MARTIN",
            'PM' => "SAINT PIERRE AND MIQUELON",
            'VC' => "SAINT VINCENT AND THE GRENADINES",
            'SR' => "SURINAME",
            'TT' => "TRINIDAD AND TOBAGO",
            'TC' => "TURKS AND CAICOS ISLANDS",
            'VI' => "U.S. VIRGIN ISLANDS",
            'US' => "UNITED STATES",
            'UY' => "URUGUAY",
            'VE' => "VENEZUELA"
        ];

        return $data;
    }
}

if (!function_exists('asias')) {
    function asias()
    {
        $data = [
            'AF' => "AFGHANISTAN",
            'AM' => "ARMENIA",
            'AZ' => "AZERBAIJAN",
            'BH' => "BAHRAIN",
            'BD' => "BANGLADESH",
            'BT' => "BHUTAN",
            'BN' => "BRUNEI",
            'KH' => "CAMBODIA",
            'CN' => "CHINA",
            'GE' => "GEORGIA",
            'HK' => "HONG KONG SAR CHINA",
            'IN' => "INDIA",
            'ID' => "INDONESIA",
            'IR' => "IRAN",
            'IQ' => "IRAQ",
            'IL' => "ISRAEL",
            'JP' => "JAPAN",
            'JO' => "JORDAN",
            'KZ' => "KAZAKHSTAN",
            'KW' => "KUWAIT",
            'KG' => "KYRGYZSTAN",
            'LA' => "LAOS",
            'LB' => "LEBANON",
            'MO' => "MACAU SAR CHINA",
            'MY' => "MALAYSIA",
            'MV' => "MALDIVES",
            'MN' => "MONGOLIA",
            'MM' => "MYANMAR [BURMA]",
            'NP' => "NEPAL",
            'NZ' => "NEUTRAL ZONE",
            'KP' => "NORTH KOREA",
            'OM' => "OMAN",
            'PK' => "PAKISTAN",
            'PS' => "PALESTINIAN TERRITORIES",
            'YE' => "PEOPLE'S DEMOCRATIC REPUBLIC OF YEMEN",
            'PH' => "PHILIPPINES",
            'QA' => "QATAR",
            'SA' => "SAUDI ARABIA",
            'SG' => "SINGAPORE",
            'KR' => "SOUTH KOREA",
            'LK' => "SRI LANKA",
            'SY' => "SYRIA",
            'TW' => "TAIWAN",
            'TJ' => "TAJIKISTAN",
            'TH' => "THAILAND",
            'TL' => "TIMOR-LESTE",
            'TR' => "TURKEY",
            'TM' => "TURKMENISTAN",
            'AE' => "UNITED ARAB EMIRATES",
            'UZ' => "UZBEKISTAN",
            'VN' => "VIETNAM",
            'YE' => "YEMEN"
        ];

        return $data;
    }
}



if (!function_exists('getCompany')) {
    function getCompany()
    {
        $data = Company::where('tenant_id', Auth::user()->tenant_id)->get();

        if (blank($data)) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getDepartment')) {
    function getDepartment($id = '')
    {
        if ($id) {
            $data = Department::find($id);
        } else {
            $data = Department::where('tenant_id', Auth::user()->tenant_id)->get();
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getUnit')) {
    function getUnit($id = '')
    {
        if ($id) {
            $data = Unit::find($id);
        } else {
            $data = Unit::where('tenant_id', Auth::user()->tenant_id)->get();
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getBranch')) {
    function getBranch($id = '', $companyId = '')
    {

        if ($id) {
            $data = Branch::find($id);
        } else {
            $data = Branch::where(['tenant_id' => Auth::user()->tenant_id, 'companyId' => $companyId])->get();
        }

        if (!$data) {
            $data = '';
        }

        return $data;
    }
}

if (!function_exists('getJobGrade')) {
    function getJobGrade()
    {
        $data = JobGrade::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getJobGradeById')) {
    function getJobGradeById($id = '')
    {
        $data = JobGrade::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getDesignation')) {
    function getDesignation($id = '')
    {
        if ($id) {
            $data = Designation::find($id);
        } else {
            $data = Designation::where('tenant_id', Auth::user()->tenant_id)->get();
        }
        if (!$data) {
            $data = '';
        }

        return $data;
    }
}

if (!function_exists('getEmploymentType')) {
    function getEmploymentType()
    {
        $data = EmploymentType::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getCustomer')) {
    function getCustomer()
    {
        $data = Customer::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }
}

if (!function_exists('getArea')) {
    function getArea()
    {
        $data = EclaimGeneral::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }
}

if (!function_exists('getState')) {
    function getState()
    {
        $data = [
            'JOHOR' => 'JOHOR',
            'KEDAH' => 'KEDAH',
            'KELANTAN' => 'KELANTAN',
            'NEGERI SEMBILAN' => 'NEGERI SEMBILAN',
            'PAHANG' => 'PAHANG',
            'PENANG' => 'PENANG',
            'PERAK' => 'PERAK',
            'PERLIS' => 'PERLIS',
            'SABAH' => 'SABAH',
            'SARAWAK' => 'SARAWAK',
            'SELANGOR' => 'SELANGOR',
            'TERENGGANU' => 'TERENGGANU',
            'KUALA LUMPUR' => 'KUALA LUMPUR',
            'LABUAN' => 'LABUAN',
            'PUTRAJAYA' => 'PUTRAJAYA',
            'OTHERS' => 'OTHERS',
        ];

        return $data;
    }
}

if (!function_exists('getStatusProject')) {
    function getStatusProject()
    {
        $data = [
            'ONGOING' => 'ONGOING',
            'WARRANTY' => 'WARRANTY',
            'CLOSED' => 'CLOSED',
        ];

        return $data;
    }
}
if (!function_exists('myProjectOnly')) {
    function myProjectOnly()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        // pr(Auth::user()->id);
        $projectMember = ProjectMember::select('project_id')->where('employee_id', '=', $employee->id)->groupBy('project_id')->get();

        foreach ($projectMember as $project) {
            $projectId[] = $project->project_id;
        }

        $data = DB::table('project_member as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')
            ->select('a.id as member_id', 'a.status as request_status', 'a.location', 'a.id as memberId', 'b.*', 'c.customer_name')
            ->where([['a.employee_id', '=', $employee->id], ['a.status', 'approve']])
            ->get();
        // pr($data);
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getContractType')) {
    function getContractType()
    {
        $data = [
            'EXT' => 'EXT',
            'ORI' => 'ORI',
            'VO' => 'VO',
        ];

        return $data;
    }
}

if (!function_exists('getFinancialYear')) {
    function getFinancialYear()
    {
        $data = [];

        $data = Project::where([['tenant_id', Auth::user()->tenant_id]])->select('financial_year')->groupBy('financial_year')->orderBy('DESC')->get();


        return $data;
    }
}

if (!function_exists('getFinancialYearForm')) {
    function getFinancialYearForm()
    {
        $current_year = date("Y");
        $next_year = date("Y", strtotime("+1 year"));

        $data = [
            $current_year => $current_year,
            $next_year => $next_year,
        ];

        $data = array_reverse($data);

        return $data;
    }
}

if (!function_exists('getFinancialYearFormold')) {
    function getFinancialYearFormold()
    {
        $start_year = 2010;
        $current_year = date("Y");
        $next_year = date("Y", strtotime("+1 year"));
        $year_difference = $current_year - $start_year + 2;

        $data = [];
        for ($i = 0; $i < $year_difference; $i++) {
            $year = date("Y", strtotime("+" . $i . " year", strtotime($start_year . "-01-01")));
            $data[$year] = $year;
        }

        $data = array_reverse($data);

        return $data;
    }
}

if (!function_exists('getEvent')) {
    function getEvent()
    {
        $data = [
            '1' => 'JOINED',
            '2' => 'RE-JOINED',
            '3' => 'PROMOTION',
            '4' => 'TRANSFER',
            '5' => 'RELOCATION',
            '6' => 'CHANGE OF WORKBASE',
            '7' => 'SECONDMENT',
            '8' => 'ERROR CORRECTION',
            '9' => 'OTHERS',
        ];

        return $data;
    }
}

if (!function_exists('getVehicle')) {
    function getVehicle()
    {
        $data = [
            '1' => 'CAR',
            '2' => 'MOTORCYCLE',
        ];

        return $data;
    }
}


if (!function_exists('religion')) {
    function religion()
    {
        $data = [
            'ISLAM' => 'ISLAM',
            'BUDDHIST' => 'BUDDHIST',
            'CHRISTIAN' => 'CHRISTIAN',
            'HINDU' => 'HINDU',
            'OTHERS' => 'OTHERS',
        ];

        return $data;
    }
}

if (!function_exists('race')) {
    function race()
    {
        $data = [
            'MALAY' => 'MALAY',
            'CHINESE' => 'CHINESE',
            'INDIAN' => 'INDIAN',
            'OTHERS' => 'OTHERS',
        ];

        return $data;
    }
}

if (!function_exists('state')) {
    function state()
    {
        $data = [
            'JOHOR' => 'JOHOR',
            'KEDAH' => 'KEDAH',
            'KELANTAN' => 'KELANTAN',
            'NEGERI SEMBILAN' => 'NEGERI SEMBILAN',
            'PAHANG' => 'PAHANG',
            'PENANG' => 'PENANG',
            'PERAK' => 'PERAK',
            'PERLIS' => 'PERLIS',
            'SABAH' => 'SABAH',
            'SARAWAK' => 'SARAWAK',
            'SELANGOR' => 'SELANGOR',
            'TERENGGANU' => 'TERENGGANU',
            'KUALA LUMPUR' => 'KUALA LUMPUR',
            'LABUAN' => 'LABUAN',
            'PUTRAJAYA' => 'PUTRAJAYA',
            'OTHERS' => 'OTHERS',
        ];

        return $data;
    }
}

if (!function_exists('customer')) {
    function customer()
    {
        $data = Customer::where([['tenant_id', Auth::user()->tenant_id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
if (!function_exists('customeractive')) {
    function customeractive()
    {
        $data = Customer::where([['tenant_id', Auth::user()->tenant_id], ['status', '=', 1]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('projectLocation')) {
    function projectLocation($projectid = '')
    {
        $query = ProjectLocation::where('tenant_id', Auth::user()->tenant_id);

        if ($projectid) {
            $query->where('project_id', $projectid);
        }

        $data = $query->get();

        if (!$data) {
            $data = [];
        }

        // $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        // $cond[2] = ['project_id', $projectid];

        // $data = ProjectLocation::where($cond)->get();

        // if (!$data) {
        //     $data = [];
        // }
        return $data;
    }
}

if (!function_exists('activityName')) {
    function activityName($departmentId = '')
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        // $cond[1] = ['tenant_id', ];
        $cond[2] = ['department', $departmentId];
        // $cond[3] = ['logs_id', $logsid];

        $cond[3] = ['project_id', null];
        $data = ActivityLogs::where($cond)->get();
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getBranchFullAddress')) {
    function getBranchFullAddress($user_id = '')
    {
        $cond[1] = ['user_id', $user_id];
        $data = DB::table('employment as a')
            ->leftJoin('branch as b', 'a.branch', '=', 'b.id')
            ->select('b.fulladdress', 'a.employeeName')
            ->where($cond)
            ->first();
        return $data->fulladdress;
    }
}
if (!function_exists('getEmployee')) {
    function getEmployee()
    {
        $data = Employee::where([['tenant_id', Auth::user()->tenant_id], ['employeeid', '!=', null]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

// if (!function_exists('getEmployee')) {
//     function getEmployee()
//     {
//         $tenant_id = Auth::user()->tenant_id;

//         $data = Employee::where([
//             ['tenant_id', $tenant_id],
//             ['employeeid', '!=', null]
//         ])->get();

//         $participants = TimesheetEvent::pluck('participant')->flatten()->unique();

//         $data = $data->reject(function ($employee) use ($participants) {
//             foreach ($participants as $participant) {
//                 $participant_array = explode(',', $participant);
//                 if (in_array($employee->user_id, $participant_array)) {
//                     return true;
//                 }
//             }
//             return false;
//         });

//         return $data;
//     }
// }





if (!function_exists('getEmployeeNotInProject')) {
    function getEmployeeNotInProject($id = '')
    {
        $data = DB::table('employment')
            ->select('*')
            ->whereNotIn('id', function ($query) use ($id) {
                $query->select('employee_id')
                    ->from('project_member')
                    ->where('project_id', '=', $id);
            })
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getEmployeeexcept')) {
    function getEmployeeexcept()
    {

        $data = DB::table('employment')
            ->join(DB::raw('(SELECT recommender FROM approval_role_general ORDER BY id DESC LIMIT 1) AS ar'), 'employment.jobGrade', '=', 'ar.recommender')
            ->select('employment.*', 'ar.recommender')
            ->where([['tenant_id', Auth::user()->tenant_id]])
            ->get();


        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
if (!function_exists('getEmployeerecommender')) {
    function getEmployeerecommender()
    {

        $data = DB::table('employment as e')
            ->join('jobGrade as j', 'e.jobGrade', '=', 'j.id')
            ->where('j.id', '<=', function ($query) {
                $query->select('recommender')
                    ->from('approval_role_general')
                    ->orderBy('id', 'desc')
                    ->limit(1);
            })
            ->select('e.*', 'j.jobgradename as job_grade_name')
            ->get();



        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
if (!function_exists('getEmployeeapprover')) {
    function getEmployeeapprover()
    {

        $data = DB::table('employment as e')
            ->join('jobGrade as j', 'e.jobGrade', '=', 'j.id')
            ->where('j.id', '<=', function ($query) {
                $query->select('approver')
                    ->from('approval_role_general')
                    ->orderBy('id', 'desc')
                    ->limit(1);
            })
            ->select('e.*', 'j.jobgradename as job_grade_name')
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
if (!function_exists('accManager')) {
    function accManager()
    {
        $data = DB::table('project as a')
            ->leftJoin('employment as b', 'a.acc_manager', '=', 'b.id')
            ->select('b.id', 'b.employeeName as name')
            ->groupBy('acc_manager')
            // ->whereNotIn('a.id', $projectId)
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();


        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('prjManager')) {
    function prjManager()
    {
        $data = DB::table('project as a')
            ->leftJoin('employment as b', 'a.project_manager', '=', 'b.id')
            ->select('b.id', 'b.employeeName as name')
            ->groupBy('project_manager')
            // ->whereNotIn('a.id', $projectId)
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('project')) {
    function project($user_id = '')
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        if ($user_id) {
            $cond[2] = ['user_id', '=', $user_id];
        }
        $data = Project::where($cond)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('projectactive')) {
    function projectactive($user_id = '')
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        if ($user_id) {
            $cond[2] = ['user_id', '=', $user_id];
        }
        $data = Project::where($cond)
            ->where('status', '!=', 'closed')
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('project_member')) {
    function project_member($user_id = '')
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];

        if ($user_id) {
            $cond[2] = ['a.user_id', '=', $user_id];
        }

        $data = DB::table('employment as a')
            ->leftJoin('project_member as b', 'a.id', '=', 'b.employee_id')
            ->leftJoin('project as c', 'b.project_id', '=', 'c.id')
            ->select('c.id', 'c.project_name', 'c.project_code')
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('project_memberaddl')) {
    function project_memberaddl($user_id = '')
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];

        if ($user_id) {
            $cond[2] = ['a.user_id', '=', $user_id];
            $cond[3] = ['b.status', '=', 'approve'];
            $cond[4] = ['c.status', '!=', 'closed'];
        }

        $data = DB::table('employment as a')
            ->leftJoin('project_member as b', 'a.id', '=', 'b.employee_id')
            ->leftJoin('project as c', 'b.project_id', '=', 'c.id')
            ->select('c.id', 'c.project_name', 'c.project_code')
            ->where($cond)
            ->groupBy('c.project_name', 'c.project_code') // Add this line to group by the 'id' column of the 'project' table
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}



if (!function_exists('activityName')) {
    function activityName($departmentId = '')
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        // $cond[1] = ['tenant_id', ];
        $cond[2] = ['department', $departmentId];
        // $cond[3] = ['logs_id', $logsid];

        $cond[3] = ['project_id', null];
        $data = ActivityLogs::where($cond)->get();
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('activityName1')) {
    function activityName1($departmentId = '')
    {
        $data = ActivityLogs::where('tenant_id', Auth::user()->tenant_id)
            ->whereNotNull('project_id')
            ->where('department', $departmentId)
            ->get();
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}



// if (!function_exists('activityName1')) {
//     function activityName1()
//     {
//         $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
//         // $cond[2] = ['department', $departmentId];

//         $data = DB::table('activity_logs as a')
//         ->leftJoin('type_of_logs as b', 'a.logs_id', '=', 'b.id')
//         // ->leftJoin('project as c', 'b.project_id', '=', 'c.id')
//         ->select('a.*','b.*')
//         ->where($cond)
//         ->get();

//         if (!$data) {
//             $data = [];
//         }

//         return $data;
//     }

// }

if (!function_exists('project_member')) {
    function project_member($user_id = '')
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];

        if ($user_id) {
            $cond[2] = ['a.user_id', '=', $user_id];
        }

        $data = DB::table('employment as a')
            ->leftJoin('project_member as b', 'a.id', '=', 'b.employee_id')
            ->leftJoin('project as c', 'b.project_id', '=', 'c.id')
            ->select('c.id', 'c.project_name', 'c.project_code')
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getEventTimesheet')) {
    function getEventTimesheet()
    {
        $data = TimesheetEvent::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }
}

if (!function_exists('month')) {
    function month($id = '')
    {
        $data = [
            '01' => 'JANUARY',
            '02' => 'FEBRUARY',
            '03' => 'MARCH',
            '04' => 'APRIL',
            '05' => 'MAY',
            '06' => 'JUNE',
            '07' => 'JULY',
            '08' => 'AUGUST',
            '09' => 'SEPTEMBER',
            '10' => 'OCTOBER',
            '11' => 'NOVEMBER',
            '12' => 'DECEMBER',
        ];

        if ($id) {
            return $data[$id];
        }

        return $data;
    }
}
if (!function_exists('monthMTC')) {
    function monthMTC($id = '')
    {
        $data = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        if ($id) {
            return $data[$id];
        }

        return $data;
    }
}
if (!function_exists('year')) {
    function year()
    {
        $data = [

            '2023' => '2023',
            '2022' => '2022',
            '2020' => '2020',
            '2021' => '2021',
            '2019' => '2019',
            '2018' => '2018',

        ];

        return $data;
    }
}

if (!function_exists('getSupervisor')) {
    function getSupervisor($id = '')
    {
        $data = Employee::where('id', $id)->select('employeeName')->first();

        if (!$data) {
            $data = '';
        }
        return $data;
    }
}

if (!function_exists('getEmployeeName')) {
    function getEmployeeName($id = '')
    {
        $data = Employee::where('user_id', $id)->select('employeeName')->first()->employeeName;

        if (!$data) {
            $data = '';
        }
        return $data;
    }
}



if (!function_exists('getChequekNo')) {
    function getChequekNo($id = '')
    {
        if ($id) {
            $data = GeneralClaim::find($id);
        } else {
            $data = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->get();
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}





if (!function_exists('getEmployeeUsername')) {
    function getEmployeeUsername($id = '')
    {
        $data = Userprofile::where('user_id', $id)->select('username')->first()->username;

        if (!$data) {
            $data = '';
        }
        return $data;
    }
}

if (!function_exists('getEmployeeNameById')) {
    function getEmployeeNameById($id = '')
    {
        $data = Employee::where('id', $id)->select('employeeName')->first();

        if (!$data) {
            $data = '';
        }
        return $data;
    }
}

if (!function_exists('getWorkingEmail')) {
    function getWorkingEmail($user_id = '')
    {
        $data = Employee::where('user_id', $user_id)->select('workingEmail')->first();
        return $data->workingEmail;
    }
}

if (!function_exists('getDepartmentName')) {
    function getDepartmentName($user_id = '')
    {
        $cond[1] = ['user_id', $user_id];
        $data = DB::table('employment as a')
            ->leftJoin('department as b', 'a.department', '=', 'b.id')
            ->select('b.departmentName', 'a.employeeName')
            ->where($cond)
            ->first();
        return $data->departmentName;
    }
}
if (!function_exists('getDesignationName')) {
    function getDesignationName($user_id = '')
    {
        $cond[1] = ['user_id', $user_id];
        $data = DB::table('employment as a')
            ->leftJoin('designation as b', 'a.designation', '=', 'b.id')
            ->select('b.designationName', 'a.employeeName')
            ->where($cond)
            ->first();
        return $data->designationName;
    }
}
if (!function_exists('projectLocationById')) {
    function projectLocationById($id = '')
    {
        $data = ProjectLocation::where('id', $id)->first();

        if (!$data) {
            $data = '';
            return $data;
        }

        return $data->location_name;
    }
}

if (!function_exists('checkProjectMemberStatus')) {
    function checkProjectMemberStatus($projectId = '')
    {
        $data = ProjectMember::where('project_id', $projectId)->first();
        // dd($data);
        if (!$data) {
            $data = '';
            return $data;
        }

        return $data->location_name;
    }
}

if (!function_exists('getProjectLocation')) {
    function getProjectLocation($id = '')
    {
        $data = ProjectLocation::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        if (!$data) {
            $data = '';
        }

        return $data;
    }
}

if (!function_exists('getAllRole')) {
    function getAllRole()
    {
        $data = Role::where([['tenant_id', Auth::user()->tenant_id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getAllJobGrade')) {
    function getAllJobGrade()
    {
        $data = JobGrade::where([['tenant_id', Auth::user()->tenant_id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getUserProfileByUserId')) {
    function getUserProfileByUserId($id = '')
    {
        $data = UserProfile::where([['tenant_id', Auth::user()->tenant_id], ['user_id', $id]])->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getFirstCarMileagebyid')) {
    function getFirstCarMileagebyid($id = '')
    {
        $data = TransportMillage::where([
            ['tenant_id', Auth::user()->tenant_id],
            ['entitle_id', $id],
            // ['type', 'car'] // New condition for type
        ])->first();

        $price = $data->price ?? '';
        //pr($price);
        if (!$price) {
            $price = [];
        }

        return $price;
    }
}

if (!function_exists('getFirstMotorMileagebyid')) {
    function getFirstMotorMileagebyid($id = '')
    {
        $data = TransportMillage::where([
            ['tenant_id', Auth::user()->tenant_id],
            ['entitle_id', $id],
            // ['type', 'motor'] // New condition for type
        ])->first();

        $price = $data->price ?? '';
        //pr($price);
        if (!$price) {
            $price = [];
        }

        return $price;
    }
}


if (!function_exists('getUserByRole')) {
    function getUserByRole($id = '')
    {
        $data = Users::where([['tenant_id', Auth::user()->tenant_id], ['role_id', $id]])->with('userProfile')->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getUserByJobGrade')) {
    function getUserByJobGrade($id = '')
    {
        $data = Employee::where([['tenant_id', Auth::user()->tenant_id], ['jobGrade', $id]])->with('userProfile')->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getUserByUserRole')) {
    function getUserByUserRole($id = '')
    {
        $data = UserRole::where([['tenant_id', Auth::user()->tenant_id], ['role_id', $id]])->with('userProfile')->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getClaimCategory')) {
    function getClaimCategory($id = '')
    {
        $data = ClaimCategory::where('tenant_id', Auth::user()->tenant_id)
            ->where('status', '=', '1')
            ->where(function ($query) {
                $query->where('claim_type', '=', 'GC')
                    ->orWhere('claim_type', '=', 'MTC,GC');
            })
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getClaimCategoryMtc')) {
    function getClaimCategoryMtc($id = '')
    {
        $data = ClaimCategory::where('tenant_id', Auth::user()->tenant_id)
            ->where('status', '=', '1')
            ->where(function ($query) {
                $query->where('claim_type', '=', 'MTC')
                    ->orWhere('claim_type', '=', 'MTC,GC');
            })
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getClaimCategoryContentByClaimId')) {
    function getClaimCategoryContentByClaimId($id = '')
    {
        $data = ClaimCategoryContent::where([['category_id', $id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getClaimCategoryById')) {
    function getClaimCategoryById($id = '')
    {
        $data = ClaimCategory::where([['id', $id]])->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

// if (!function_exists('getClaimCategoryNameById')) {
//     function getClaimCategoryNameById($id = '')
//     {
//         $data = ClaimCategory::where([['id', $id]])->first();

//         if (!$data) {
//             $data = [];
//         }

//         // pr($data);

//         return $data->claim_catagory;
//     }
// }

if (!function_exists('getGNCDetailByGeneralId')) {
    function getGNCDetailByGeneralId($id = '')
    {
        $data =  GeneralClaimDetail::select('general_claim_details.*', 'claim_category.claim_catagory')
            ->leftJoin('claim_category', 'claim_category.id', '=', 'general_claim_details.claim_category')
            ->where('general_claim_details.general_id', $id)
            ->get();
        //pr($data);

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getClaimContentById')) {
    function getClaimContentById($id = '')
    {
        $data = GeneralClaimDetail::where('general_claim_details.id', $id)
            ->leftJoin('claim_category', 'general_claim_details.claim_category', '=', 'claim_category.id')
            ->select('general_claim_details.*', 'claim_category.claim_catagory as claim_category_name')
            ->with('claim_category_content')
            ->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getCashAdvanceType')) {
    function getCashAdvanceType($id = '')
    {
        $data = [
            '1' => 'PROJECT ( OUTSTATION )',
            '2' => 'PROJECT ( NON OUTSTATION )',
            '3' => 'OTHER ( OUTSTATION )',
            '4' => 'OTHER ( NON OUTSTATION )',
        ];

        if ($id) {
            return $data[$id];
        }

        return $data;
    }
}

if (!function_exists('getProjectById')) {
    function getProjectById($id = '')
    {
        $data = Project::where('id', $id)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getDepartmentById')) {
    function getDepartmentById($id = '')
    {
        $data = Department::where('id', $id)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getModeOfTransport')) {
    function getModeOfTransport($id = '')
    {
        $data = [
            '0' => '',
            '1' => 'Personal Car',
            '2' => 'Personal Motorcycle',
            '3' => 'Public Transport',
            '4' => 'Company Car',
            '5' => 'Carpool',
        ];

        if ($id) {
            return $data[$id];
        }

        return $data;
    }
}

if (!function_exists('typeOfLog')) {
    function typeOfLog()
    {
        $data = TypeOfLogs::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('claimDateSetting')) {
    function claimDateSetting()
    {
        $data = ClaimDateSetting::where('tenant_id', Auth::user()->tenant_id)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
if (!function_exists('checkAppeal')) {
    function checkAppeal($year = '', $month = '')
    {
        $cond[0] = ['tenant_id', Auth::user()->tenant_id];
        $cond[1] = ['user_id', Auth::user()->id];
        $cond[3] = ['year', $year];
        $cond[4] = ['month', $month];

        $data = AppealMtc::where($cond)->first();

        $status = null;
        $data_year = null;
        $data_month = null;

        if ($data) {
            $status = $data->status;
            $data_year = $data->year;
            $data_month = $data->month;
        }

        return [
            'status' => $status,
            'year' => $data_year,
            'month' => $data_month,
        ];
    }
}

if (!function_exists('getDaysInMonth')) {
    function getDaysInMonth()
    {

        for ($i = 1; $i < 32; $i++) {
            $data[] = $i;
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getNumberMonth')) {
    function getNumberMonth()
    {
        for ($i = 1; $i < 6; $i++) {
            $data[] = $i;
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getDisplayRow')) {
    function getDisplayRow()
    {
        for ($i = 1; $i < 6; $i++) {
            $data[] = $i;
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getResponseSuccessAjax')) {
    function getResponseSuccessAjax()
    {
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getResponseErrorAjax')) {
    function getResponseErrorAjax()
    {
        $data['status'] = config('app.response.error.status');
        $data['type'] = config('app.response.error.type');
        $data['title'] = config('app.response.error.title');

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getMyClaimMonth')) {
    function getMyClaimMonth()
    {
        $dataDate['year'][] = date('Y');
        $dataDate['month'][] = date('F');
        $dataDate['value'][] = date('m');
        for ($i = 1; $i < claimDateSetting()->table_row_display; $i++) {
            $dataDate['month'][] = date('F', strtotime("-$i month"));
            $dataDate['year'][] = date('Y', strtotime("-$i month"));
            $dataDate['value'][] = date('m', strtotime("-$i month"));
        }

        foreach ($dataDate['month'] as $key => $month) {
            $monthData[] = [
                'month' => $dataDate['month'][$key],
                'year' => $dataDate['year'][$key],
                'value' => $dataDate['value'][$key],
            ];
        }

        $data = $monthData;

        if (!$data) {
            $data = [];
        }

        //pr($data);
        return $data;
    }
}

if (!function_exists('checkingMonthlyClaim')) {
    function checkingMonthlyClaim($year = '', $month = '')
    {
        $cond[0] = ['tenant_id', Auth::user()->tenant_id];
        $cond[1] = ['user_id', Auth::user()->id];
        $cond[2] = ['claim_type', 'MTC'];
        $cond[3] = ['year', $year];
        $cond[4] = ['month', $month];

        $claim = GeneralClaim::where($cond)->first();

        if (!$claim) {
            $data['month'] = '-';
            $data['id'] = '-';
        } else {
            $data['month'] = $claim->month;
            $data['id'] = $claim->id;
            $data['status'] = $claim->status;
        }

        return $data;
    }
}

if (!function_exists('getRoleById')) {
    function getRoleById($id = '')
    {
        $data = Role::where('id', $id)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getViewForClaimApproval')) {
    function getViewForClaimApproval($type = '')
    {

        // $employee = Employee::where('user_id', Auth::user()->id)->first();

        // recommender = 2 approval = 1
        if ($type == '1') {
            $data = 'supervisorClaim';
        } elseif ($type == '2') {
            $data = 'hodClaim';
        }

        return $data;
    }
}

if (!function_exists('getEclaimApproval')) {
    function getEclaimApproval()
    {

        $data = ApprovelRoleGeneral::where('tenant_id', Auth::user()->tenant_id)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getFinanceChecker')) {
    function getFinanceChecker()
    {

        // find checker 
        $domainList = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'finance']])->orderBy('created_at', 'DESC')->first();
        $userId = Auth::user()->id;

        if ($domainList->checker1 == $userId) {
            $data = 'f1';
        } else if ($domainList->checker2 == $userId) {
            $data = 'f2';
        } else if ($domainList->checker3 == $userId) {
            $data = 'f3';
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getAdminChecker')) {
    function getAdminChecker()
    {
        // find checker 
        $domainList = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'admin']])->orderBy('created_at', 'DESC')->first();
        $userId = Auth::user()->id;

        if ($domainList->checker1 == $userId) {
            $data = 'a1';
        } else if ($domainList->checker2 == $userId) {
            $data = 'a2';
        } else if ($domainList->checker3 == $userId) {
            $data = 'a3';
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('addressType')) {
    function addressType($id = '')
    {
        $data = [

            '1' => 'PERMANENT',
            '2' => 'CORRESPONDENCE',
            '3' => 'BOTH',
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('getEmployeeDetail')) {
    function getEmployeeDetail($id = '')
    {
        $data = Employee::where([['tenant_id', Auth::user()->tenant_id], ['user_id', $id]])->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getPermissionByRoleId')) {
    function getPermissionByRoleId($id = '')
    {
        $data = PermissionRole::select('permission_code')->where([['tenant_id', Auth::user()->tenant_id], ['role_id', $id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getEmployeeNamebyDepartments')) {
    function getEmployeeNamebyDepartments($id = '')
    {
        $data = Employee::where([['department', $id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getApprovalConfigClaim')) {
    function getApprovalConfigClaim($role = '')
    {

        $data = ApprovalConfig::where('role', $role)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getUserWithSelectedUser')) {
    function getUserWithSelectedUser($employeeId = '')
    {

        // $data = Users::with('userProfile')->where([['tenant_id', Auth::user()->tenant_id], ['id', '!=', $userId]])->get();
        $data = Employee::where([['tenant_id', Auth::user()->tenant_id], ['id', '!=', $employeeId]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}