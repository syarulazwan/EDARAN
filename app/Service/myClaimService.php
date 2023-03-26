<?php

namespace App\Service;

use App\Http\Controllers\Eclaim\generalClaimController;
use App\Mail\Mail as MailMail;
use App\Models\CashAdvanceDetail;
use App\Models\EclaimGeneralSetting;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use App\Models\ModeOfTransport;
use App\Models\PersonalClaim;
use App\Models\TravelClaim;
use App\Models\EntitleGroup;
use App\Models\TransportMillage;
use App\Models\Employee;
use App\Models\AppealMtc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class myClaimService
{
    public function getClaimsData($user_id = '')
    {
        $user_id = Auth::user()->id;

        $data = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['user_id', $user_id]])->get();

        return $data;
    }
    public function createGeneralClaim($r, $status = '')
    {
        $input = $r->input();

        if ($_FILES['file_upload']['name']) {
            $filenames = array();
            foreach ($_FILES['file_upload']['tmp_name'] as $key => $tmp_name) {
                $filename = manyFile($_FILES['file_upload']['name'][$key], $tmp_name);
                $filenames[] = $filename['filename'];
            }
        }
        $fileString = implode(',', $filenames);
        

        $generalClaimCount = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['claim_type', 'GNC']])->count();
        
        
        if (!$generalClaimCount) {
            $generalClaimCount = 0;
        }

        // add to general claim
        $generalClaim['user_id'] = Auth::user()->id;
        $generalClaim['tenant_id'] = Auth::user()->tenant_id;
        $generalClaim['claim_id'] = 'GNC' . $generalClaimCount + 1;
        $generalClaim['claim_type'] = $input['claim_type'] ?? 'GNC';
        $generalClaim['status'] = $status;
        $generalClaim['year'] = $input['year'];
        $generalClaim['month'] = $input['month'];
        $generalClaim['total_amount'] = ($input['amount']) ?? '';

        GeneralClaim::create($generalClaim);

        $findId = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)
                                ->orderBy('id', 'DESC')
                                ->first();
        
        

        $generalClaimData = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();
        
        $generalDetail = [];
        $generalDetail['tenant_id'] = Auth::user()->tenant_id;
        $generalDetail['user_id'] = Auth::user()->id;
        $generalDetail['general_id'] = $generalClaimData->id;
        $generalDetail['general_claim_id'] = $generalClaimData->claim_id;
        $generalDetail['claim_category'] = $input['claim_category'];
        $generalDetail['applied_date'] = $input['applied_date'];
        $generalDetail['claim_category_detail'] = $input['claim_category_detail'];
        $generalDetail['amount'] = $input['amount'];
        $generalDetail['desc'] = $input['desc'];
        $generalDetail['file_upload'] = $fileString ?? '';

        GeneralClaimDetail::create($generalDetail);

        // // add to general claim detail
        // foreach ($input['applied_date'] as $key => $value) {
        //     if ($filenames) {
        //         $file_upload = $filenames[$key];
        //     } else {
        //         $file_upload = '';
        //     }

        //     $generalDetail[] = [
        //         'tenant_id' => Auth::user()->tenant_id,
        //         'user_id' => Auth::user()->id,
        //         'general_id' => $generalClaimData->id,
        //         'general_claim_id' => 'GNC' . $generalClaimCount + 1,
        //         'applied_date' => $input['applied_date'][$key],
        //         'claim_category' => $input['claim_category'],
        //         'claim_category_detail' => $input['claim_category_detail'][$key],
        //         'amount' => $input['amount'][$key],
        //         'desc' => $input['desc'][$key],
        //         'file_upload' => $file_upload,
        //         'created_at' => date("Y-m-d H:i:s"),
        //         'updated_at' => date("Y-m-d H:i:s"),
        //     ];
        // }

        // GeneralClaimDetail::insert($generalDetail);

        // email notification
        // $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        // if ($setting->notify_user) {
        //     $ms = new MailService;
        //     $ms->emailToSupervisorClaimGNC($generalClaimData);
        // }

        $data['id'] = $findId->id;
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }
    public function viewMtcClaim($id = '')
    
    {
        $claim[0] = ['tenant_id', Auth::user()->tenant_id];
        $claim[1] = ['id', $id];

        // $travel[0] = ['tenant_id', Auth::user()->tenant_id];
        // $travel[1] = ['general_id', $id];
        $travel = [
            ['travel_claim.tenant_id', '=', Auth::user()->tenant_id],
            ['travel_claim.general_id', '=', $id],
        ];

        $personal = [
            ['personal_claim.tenant_id', '=', Auth::user()->tenant_id],
            ['personal_claim.general_id', '=', $id],
        ];
       


        $general = [
            ['general_claim_details.tenant_id', '=', Auth::user()->tenant_id],
            ['general_claim_details.general_id', '=', $id],
        ];

        // $general[0] = ['tenant_id', Auth::user()->tenant_id];
        // $general[1] = ['general_id', $id];

        $data['claim'] = GeneralClaim::where($claim)->first();


        $data['travel'] = TravelClaim::select(
            'travel_claim.*',
            'travel_claim.type_transport AS travel_claim_type_transport',
        )
            ->where($travel)
            ->get();

        

        $data['personal'] = PersonalClaim::select(
            'personal_claim.*',
            'claim_category.claim_catagory as claim_catagory_name',

        )
            ->leftJoin('claim_category', 'claim_category.id', '=', 'personal_claim.claim_category')
            ->where($personal)
            ->get();


        //pr($data['personal']);

        $data['general'] = GeneralClaimDetail::select(
            'general_claim_details.*',
            'general_claim_details.desc as gnc_desc',
            'general_claim.year',
            'general_claim.month',
            'claim_category.claim_catagory as claim_catagory_name',

        )
            ->leftJoin('claim_category', 'claim_category.id', '=', 'general_claim_details.claim_category')
            ->leftJoin('general_claim', 'general_claim_details.general_id', '=', 'general_claim.id')
            ->where('general_claim_details.tenant_id', '=', Auth::user()->tenant_id)
            ->where('general_claim_details.general_id', '=', $id)
            ->get();

        return $data;
    }
    public function getGeneralDetailData()
    {
        $data = GeneralClaimDetail::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function getGeneralClaimDataById($id = '')
    {
        $data = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }
    public function getClaimCategoryNameById($id = '')
    {
        $data = ClaimCategory::where([['id', $id]])->first();

        if (!$data) {
            $data = [];
        }
        
        // pr($data);

        return $data->claim_catagory;
    }
    

    public function updateGeneralClaim($r, $id = '')
    {
        $input = $r->input();
        // pr($input);
        if ($_FILES['file_upload']['name']) { 
            $filenames = array();
            foreach ($_FILES['file_upload']['tmp_name'] as $key => $tmp_name) {
                $filename = manyFile($_FILES['file_upload']['name'][$key], $tmp_name);
                $filenames[] = $filename['filename'];
            }
        }
        $fileString = implode(',', $filenames);
 
        $generalClaimData = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        $generalDetail = [];
        $generalDetail['tenant_id'] = Auth::user()->tenant_id;
        $generalDetail['user_id'] = Auth::user()->id;
        $generalDetail['general_id'] = $id;
        $generalDetail['general_claim_id'] = $generalClaimData->claim_id;
        $generalDetail['claim_category'] = $input['claim_category'];
        $generalDetail['claim_category_detail'] = $input['claim_category_detail'];
        $generalDetail['amount'] = $input['amount'];
        $generalDetail['desc'] = $input['desc'];
        $generalDetail['file_upload'] = $fileString ?? '';

        GeneralClaimDetail::create($generalDetail);

        $generalDetailData = GeneralClaimDetail::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $id]])->get();

        foreach ($generalDetailData as $generalClaimDetail) {
            $total[] = $generalClaimDetail['amount'];
        }

        $totalAmount = array_sum($total);

        $generalClaim = [];
        $generalClaim['year'] = $input['year'];
        $generalClaim['month'] = $input['month'];
        $generalClaim['total_amount'] = $totalAmount;
        GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($generalClaim);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }
    public function deleteGNCDetail($id)
    {
        $GNCDetail = GeneralClaimDetail::find($id);
        $GNCId = $GNCDetail->general_id;
       

        if (!$GNCDetail) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Detail not found';
        } else {
            // DB::query("DELETE FROM general_claim_detail WHERE id = $id");
            
            $GNCDetail->delete($id);

            $generalDetailData = GeneralClaimDetail::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $GNCId]])->get();

            foreach ($generalDetailData as $generalClaimDetail) {
                $total[] = $generalClaimDetail['amount'];
            }
            
            $totalAmount = array_sum($total);

            $generalClaim = [];
            $generalClaim['total_amount'] = $totalAmount;
            GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $GNCId]])->update($generalClaim);
        

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete';
        }

        return $data;
    }
    
    public function deletePersonalDetail($id)
    {
        $PersonalDetail = PersonalClaim::find($id);
        $GNCId = $PersonalDetail->general_id;

        if (!$PersonalDetail) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Detail not found';
        } else {
            // DB::query("DELETE FROM general_claim_detail WHERE id = $id");
            $PersonalDetail->delete($id);
            
            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $GNCId]])->get();
            $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $GNCId]])->get();

            foreach ($personalClaims as $claim) {
                $total[] = $claim->amount;
            }

            foreach ($travelClaims as $claims) {
                $totals[] = $claims->amount;
            }

            $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());

            $totalAmount = [
                'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
            ];


            GeneralClaim::where('id', $GNCId)->update($totalAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete';
        }

        return $data;
    }
    public function deleteTravelDetail($id)
    {
        $TravelDetail = TravelClaim::find($id);
        $GNCId = $TravelDetail->general_id;

        if (!$TravelDetail) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Detail not found';
        } else {
            // DB::query("DELETE FROM general_claim_detail WHERE id = $id");
            $TravelDetail->delete($id);
            
            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $GNCId]])->get();
            $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $GNCId]])->get();

            foreach ($personalClaims as $claim) {
                $total[] = $claim->amount;
            }

            foreach ($travelClaims as $claims) {
                $totals[] = $claims->amount;
            }

            $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());

            $totalAmount = [
                'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
            ];


            GeneralClaim::where('id', $GNCId)->update($totalAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete';
        }

        return $data;
    }
    public function updateStatusGeneralClaims($id)
    {
        $update = [
            'status' => 'active',
            'supervisor' => 'recommend'
        ];

        $checkDisabled = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)
            ->first();
            
        if (($checkDisabled->disable_user) == 1) {
            $data['msg'] = 'Unable to submit, claim is under maintenance';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        GeneralClaim::where('id', $id)->update($update);

        $generalClaimData = GeneralClaim::where('id', $id)
        ->where('tenant_id', Auth::user()->tenant_id)
        ->orderBy('created_at', 'DESC')
        ->first();   
        
        // pr($generalClaimData);

        $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        if ($setting->notify_user) {
            $ms = new MailService;
            $ms->emailToSupervisorClaimGNC($generalClaimData);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Submit';

        return $data;
    }

    public function createCashAdvance($r, $status = '')
    {
        $input = $r->input();

        $cashAdvance['type'] = $input['type'] ?? '';
        $cashAdvance['tenant_id'] = Auth::user()->tenant_id ?? '';
        $cashAdvance['user_id'] = Auth::user()->id ?? ''; 
        $cashAdvance['project_id'] = $input['project_id1'] ?? $input['project_id2'] ?? $input['project_id3'] ?? $input['project_id4'] ?? '';
        $cashAdvance['project_location_id'] = $input['project_location_id'] ?? $input['project_location_id2'] ?? $input['project_location_id3'] ?? $input['project_location_id4'] ?? '';
        $cashAdvance['purpose'] = $input['purpose'] ?? $input['purpose2'] ?? $input['purpose3'] ?? $input['purpose4'] ?? '';
        $cashAdvance['travel_date'] = $input['travel_date'] ?? $input['travel_date2'] ?? $input['travel_date3'] ?? '';
        $cashAdvance['destination'] = $input['destination'] ?? '';
        $cashAdvance['date_require_cash'] = $input['date_require_cash'] ?? '';
        $cashAdvance['status'] = $status ?? '';
        $cashAdvance['amount'] = $input['amount'] ?? '';

        if ($_FILES['file_upload']['name']) {
            $filename = upload($r->file('file_upload'));
            $cashAdvance['file_upload'] = $filename['filename'];
        }

        CashAdvanceDetail::create($cashAdvance);
        $cashAdvanceData = CashAdvanceDetail::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();

        $modeOfTransport['tenant_id'] = Auth::user()->tenant_id;
        $modeOfTransport['user_id'] = Auth::user()->id;
        $modeOfTransport['cash_advance_id'] = $cashAdvanceData->id;
        $modeOfTransport['tranport_type'] = $input['transport_type'];
        $modeOfTransport['subs_allowance_total'] = $input['subs_allowance_total'];
        $modeOfTransport['subs_allowance_day'] = $input['subs_allowance_day'];
        $modeOfTransport['accommadation_total'] = $input['accommadation_total'];
        $modeOfTransport['accommadation_night'] = $input['accommadation_night'];
        $modeOfTransport['entertainment'] = $input['entertainment'];
        $modeOfTransport['toll'] = $input['toll'];
        $modeOfTransport['fuel'] = $input['fuel'];
        $modeOfTransport['total'] = $input['total'];
        $modeOfTransport['max_total'] = $input['max_total'];
        ModeOfTransport::create($modeOfTransport);

        // email notification
        $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        if ($setting->notify_user) {
            $ms = new MailService;
            $ms->submitCAEmail($cashAdvanceData);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function getCashClaimsData()
    {
        $data = CashAdvanceDetail::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function getCashAdvanceById($id = '')
    {
        $data = CashAdvanceDetail::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }

    public function updateStatusCashClaim($id = '', $status = '')
    {
        $cashAdvance = [];
        $cashAdvance['status'] = $status;
        CashAdvanceDetail::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($cashAdvance);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function updateCashAdvance($r, $status = '')
    {
        $input = $r->input();
        $cash = $input['cash'];

        if ($status) {
            $cash['status'] = $status;
        }
        if ($_FILES) {
            if ($_FILES['file_upload']['name']) {
                $filename = upload($r->file('file_upload'));
                $cash['file_upload'] = $filename['filename'];
            }
        }

        CashAdvanceDetail::where([['tenant_id', Auth::user()->tenant_id], ['id', $cash['id']]])->update($cash);

        if (isset($input['mot'])) {
            $mot = $input['mot'];
            ModeOfTransport::where([['tenant_id', Auth::user()->tenant_id], ['id', $mot['id']]])->update($mot);
        }


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function createPersonalClaim($r)
    {
        $input = $r->input();
        
        $id = $input['general_id'];

        $monthlyClaimCount = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['claim_type', 'MTC']])->count();

        if (!$monthlyClaimCount) {
            $monthlyClaimCount = 0;
        }

        if (!$id) {
            // add to general claim
            $generalClaim['user_id'] = Auth::user()->id;
            $generalClaim['tenant_id'] = Auth::user()->tenant_id;
            $generalClaim['claim_id'] = 'MTC' . $monthlyClaimCount + 1;
            $generalClaim['claim_type'] = $input['claim_type'] ?? 'MTC';
            $generalClaim['status'] = 'draft';
            $generalClaim['month'] = $input['month'] ?? '-';
            $generalClaim['year'] = $input['year'] ?? '-';
            // $generalClaim['total_amount'] = array_sum($input['amount']) ?? '';

            GeneralClaim::create($generalClaim);
            $generalClaimData = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();
        } else {
            $generalClaimData = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->orderBy('created_at', 'DESC')->first();
        }
        unset($input['month'], $input['year']);

        if ($_FILES['file_upload']['name']) { 
            $filenames = array();
            foreach ($_FILES['file_upload']['tmp_name'] as $key => $tmp_name) {
                $filename = uploadFile($_FILES['file_upload']['name'][$key], $tmp_name, 'personal', 'PersonalFile');
                $filenames[] = $filename['filename'];
            }
            $fileString = implode(',', $filenames);
        }

        $input['user_id'] = Auth::user()->id;
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['general_id'] = $generalClaimData->id;
        $input['file_upload'] = $fileString ?? '';

        PersonalClaim::create($input);

        $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $generalClaimData->id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $generalClaimData->id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());

        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];


        GeneralClaim::where('id', $generalClaimData->id)->update($totalAmount);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['id'] = $generalClaimData->id;
        $data['msg'] = 'Success';

        return $data;
    }

    public function createTravelClaim($r)
    {
        $input = $r->input();
        //pr($input);
        $id = $input['general_id'];

        $monthlyClaimCount = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['claim_type', 'MTC']])->count();

        if (!$monthlyClaimCount) {
            $monthlyClaimCount = 0;
        }

        if (!$id) {
            // add to general claim
            $generalClaim['user_id'] = Auth::user()->id;
            $generalClaim['tenant_id'] = Auth::user()->tenant_id;
            $generalClaim['claim_id'] = 'MTC' . $monthlyClaimCount + 1;
            $generalClaim['claim_type'] = $input['claim_type'] ?? 'MTC';
            $generalClaim['status'] = 'draft';
            $generalClaim['month'] = $input['month'] ?? '-';
            $generalClaim['year'] = $input['year'] ?? '-';

            // $generalClaim['total_amount'] = array_sum($input['amount']) ?? '';

            GeneralClaim::create($generalClaim);
            $generalClaimData = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();
        } else {
            $generalClaimData = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->orderBy('created_at', 'DESC')->first();
        }
        unset($input['month'], $input['year']);


        if ($_FILES['file_upload']['name']) { 
            $filenames = array();
            foreach ($_FILES['file_upload']['tmp_name'] as $key => $tmp_name) {
                $filename = uploadFile($_FILES['file_upload']['name'][$key], $tmp_name, 'travel', 'TravelFile');
                $filenames[] = $filename['filename'];
            }
            $fileString = implode(',', $filenames);
        }
        
        

        $input1['user_id'] = Auth::user()->id;
        $input1['tenant_id'] = Auth::user()->tenant_id;
        $input1['general_id'] = $generalClaimData->id;
        $input1['travel_date'] = $input['travel_date'] ?? '';
        
        $input1['start_time'] = $input['start_time'] ?? '';
        $input1['end_time'] = $input['end_time'] ?? '';
        $input1['total_hour'] = $input['total_hour'] ?? '';
        $input1['desc'] = $input['desc'] ?? '';
        $input1['reason'] = $input['reason'] ?? '';
        $input1['type_transport'] = $input['type_transport'] ?? '';
        $input1['location_start'] = $input['location_start'] ?? '';
        $input1['location_end'] = $input['location_end'] ?? '';
        $input1['address_start'] = $input['address_start'] ?? '';
        $input1['log_id'] = $input['log_id'] ?? '';
        $input1['millage'] = $input['millage'] ?? '';
        $input1['petrol'] = $input['petrol'] ?? '';
        $input1['toll'] = $input['toll'] ?? '';
        $input1['parking'] = $input['parking'] ?? '';
        $input1['location_address'] = $input['location_address'] ?? '';
        $input1['amount'] = $input['toll'] + $input['millage'] + $input['petrol'] + $input['parking'];
        $input1['type_claim'] = 'travel';
        $input1['file_upload'] = $fileString ?? '';
        $input1['project_id'] = $input['project_id2'] ?? $input['project_id'] ?? '';
        
        TravelClaim::create($input1);

        $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $generalClaimData->id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $generalClaimData->id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());

        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        GeneralClaim::where('id', $generalClaimData->id)->update($totalAmount);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['id'] = $generalClaimData->id;
        $data['msg'] = 'Success';

        return $data;
    }

    public function createSubsClaim($r)
    {
        $input = $r->input();

        $id = $input['general_id'];
        unset($input['claimtable_length']);

        $monthlyClaimCount = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['claim_type', 'MTC']])->count();

        if (!$monthlyClaimCount) {
            $monthlyClaimCount = 0;
        }

        if (!$id) {
            // add to general claim
            $generalClaim['user_id'] = Auth::user()->id;
            $generalClaim['tenant_id'] = Auth::user()->tenant_id;
            $generalClaim['claim_id'] = 'MTC' . $monthlyClaimCount + 1;
            $generalClaim['claim_type'] = $input['claim_type'] ?? 'MTC';
            $generalClaim['status'] = 'draft';
            $generalClaim['month'] = $input['month'] ?? '-';
            $generalClaim['year'] = $input['year'] ?? '-';
            // $generalClaim['total_amount'] = array_sum($input['amount']) ?? '';

            GeneralClaim::create($generalClaim);
            $generalClaimData = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();
        } else {
            $generalClaimData = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->orderBy('created_at', 'DESC')->first();
        }
        unset($input['month'], $input['year']);


        if (isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name']) { 
            $filenames = array();
            foreach ($_FILES['file_upload']['tmp_name'] as $key => $tmp_name) {
                $filename = uploadFile($_FILES['file_upload']['name'][$key], $tmp_name, 'sub', 'SubFile');
                $filenames[] = $filename['filename'];
            }
            $fileString = implode(',', $filenames);
        }
        

        $input['user_id'] = Auth::user()->id;
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['general_id'] = $generalClaimData->id;
        $input['amount'] = $input['total'];
        $input['type_claim'] = 'subs';
        $input['file_upload'] = $fileString ?? '';

        TravelClaim::create($input);

        $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $generalClaimData->id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $generalClaimData->id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());

        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        GeneralClaim::where('id', $generalClaimData->id)->update($totalAmount);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['id'] = $generalClaimData->id;
        $data['msg'] = 'Success';

        return $data;
    }

    public function createCaClaim($r)
    {
        $input = $r->input();

        $id = $input['general_id'];
        unset($input['claimtable_length']);

        $monthlyClaimCount = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['claim_type', 'MTC']])->count();

        if (!$monthlyClaimCount) {
            $monthlyClaimCount = 0;
        }

        if (!$id) {
            // add to general claim
            $generalClaim['user_id'] = Auth::user()->id;
            $generalClaim['tenant_id'] = Auth::user()->tenant_id;
            $generalClaim['claim_id'] = 'MTC' . $monthlyClaimCount + 1;
            $generalClaim['claim_type'] = $input['claim_type'] ?? 'MTC';
            $generalClaim['status'] = 'draft';
            $generalClaim['month'] = $input['month'] ?? '-';
            $generalClaim['year'] = $input['year'] ?? '-';
            // $generalClaim['total_amount'] = array_sum($input['amount']) ?? '';

            GeneralClaim::create($generalClaim);
            $generalClaimData = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();
        } else {
            $generalClaimData = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->orderBy('created_at', 'DESC')->first();
        }
        unset($input['month'], $input['year']);


        if ($_FILES['file_upload']['name']) {
            $filename = upload($r->file('file_upload'));
            $input['file_upload'] = $filename['filename'];
        }

        $cashAdvances = CashAdvanceDetail::whereIn('id', $input['cashAdvanceId'])->where([['tenant_id', Auth::user()->tenant_id], ['user_id', Auth::user()->id]])->get();
        unset($input['cashAdvanceId']);
        foreach ($cashAdvances as $cashAdvance) {
            $input['user_id'] = Auth::user()->id;
            $input['tenant_id'] = Auth::user()->tenant_id;
            $input['general_id'] = $generalClaimData->id;
            $input['amount'] = $input['total'];
            $input['type_claim'] = 'subs';
            $input['total'] = $cashAdvance['amount'] ?? '0';
            $input['amount'] = $cashAdvance['amount'] ?? '0';
            $input['travel_date'] = $cashAdvance['travel_date'] ?? '-';
            $input['project_id'] = $cashAdvance['project_id'] ?? '-';
            $input['file_upload'] = $cashAdvance['file_upload'] ?? '-';

            TravelClaim::create($input);
        }



        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $generalClaimData->id]])->get();

        foreach ($travelClaims as $claim) {
            $total[] = $claim->amount;
        }

        $totalAmount = [
            'total_amount' => $generalClaimData->amount ?? 0 + array_sum($total),
        ];

        GeneralClaim::where('id', $generalClaimData->id)->update($totalAmount);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['id'] = $generalClaimData->id;
        $data['msg'] = 'Success';

        return $data;
    }

    public function getCashAdvance()
    {
        $data = CashAdvanceDetail::where([['tenant_id', Auth::user()->tenant_id], ['user_id', Auth::user()->id]])->get();

        return $data;
    }

    public function getTravelClaimByGeneralId($id = '')
    {
        $data = TravelClaim::where('general_id', $id)->get();

        return $data;
    }
    public function getFoodByJobGrade($id = '')
    {
        
        $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
        $entitle = EntitleGroup::where('job_grade', $jobGrade)
                                ->get();

        //pr($entitle);

        
        return $entitle;
    }

    public function getEntitlementByJobGradeCar($id = '')
    {

        $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
        $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
        $car = TransportMillage::where('entitle_id', $entitle)
            ->where('type', 'car')
            ->get();

        //pr($car);


        return $car;
    }

    public function getEntitlementAreaByJobGrade($id = '')
    {
        $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
        $entitle = EntitleGroup::where('job_grade', $jobGrade)->get();

        //pr($entitle);

        return $entitle;
    }

    public function getEntitlementByJobGradeMotor($id = '')
    {

        $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
        $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
        $motor = TransportMillage::where('entitle_id', $entitle)
            ->where('type', 'motor')
            ->get();

        //pr($car);


        return $motor;
    }

    public function getPersonalClaimByGeneralId($id = '')
    {
        $data = PersonalClaim::where('general_id', $id)->get();

        return $data;
    }

    public function getGeneralClaimById($id = '')
    {
        $data = GeneralClaim::where('id', $id)->first();

        return $data;
    }

    public function updateStatusMonthlyClaim($id = '', $status = '')
    {

        $claim['status'] = $status;

        $checkDisabled = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if (($checkDisabled->disable_user) == 1) {
            $data['msg'] = 'Unable to submit, claim is under maintenance';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }
        
        GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($claim);

        $generalClaimData = GeneralClaim::find($id);

        // get supervisor detail to send email
        $ms = new MailService;
        $ms->emailToSupervisorClaimGNC($generalClaimData);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }
    public function createAppealMtc($r)
    {
        $input = $r->input();
        
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['user_id'] = Auth::user()->id;
        $input['status'] = 'Pending';
        
        if ($_FILES['uploadFile']['name']) {
            $payslip = uploadAppeal($r->file('uploadFile'));
            $input['uploadFile'] = $payslip['filename'];

            if (!$input['uploadFile']) {
                unset($input['uploadFile']);
            }
        }
        $existing_appeal = AppealMtc::where('user_id', $input['user_id'])
        ->where('year', $input['year'])
        ->where('month', $input['month'])
        ->first();
        if ($existing_appeal) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'You already submit this appeal for this month';
            return $data;
        }

        AppealMtc::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add Vehicle';

        return $data;
    }
    
    public function getAppealData()
    {
        $data = AppealMtc::where([
            ['tenant_id', Auth::user()->tenant_id],
            ['status', '=', 'pending']
        ])->get();
        

        return $data;
    }
    public function getHistoryAppealData()
    {
        $data = AppealMtc::where([
            ['tenant_id', Auth::user()->tenant_id],
            ['status', '!=', 'pending']
        ])->get();
        

        return $data;
    }
    public function approveAppealMtc($id = '')
    {

        $claim['status'] = "approved";

        AppealMtc::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($claim);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }
    public function rejectAppealMtc($id = '')
    {

        $claim['status'] = "rejected";

        AppealMtc::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($claim);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }
    public function cancelGNC($id)
    {

        $claim['status'] = "draft";
        $claim['supervisor'] = "";
        
        GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($claim);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

}