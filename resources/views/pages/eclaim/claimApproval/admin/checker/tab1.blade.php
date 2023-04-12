<div class="tab-pane fade active show" id="default-tab-1">
    {{-- claim approval --}}
    <table id="activetable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>

                <th data-orderable="false">Action</th>
                <th class="text-nowrap">Applied Date</th>
                <th class="text-nowrap">Employee Name</th>
                <th class="text-nowrap">Month</th>
                <th class="text-nowrap">Claim ID</th>
                <th class="text-nowrap">Claim Type</th>
                <th class="text-nowrap">Total Amount</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Status Date</th>
            </tr>
        </thead>
        <tbody>
            {{-- check if config approval status enable or disable for role before approver  --}}
            @php
                $roles = ['SUPERVISOR - RECOMMENDER', 'HOD / CEO - APPROVER'];
                
                $condByPass = ' $claim->id != ""';
                foreach ($roles as $role) {
                    $configData = getApprovalConfigClaim($role);
                
                    if ($configData->status) {
                        if ($role == 'SUPERVISOR - RECOMMENDER') {
                            $condByPass = ' $claim->supervisor == "recommend"';
                        }
                
                        if ($role == 'HOD / CEO - APPROVER') {
                            $condByPass = ' $claim->hod == "recommend"';
                        }
                    }
                }
            @endphp
            {{-- {{ dd($config->status) }} --}}
            @foreach ($claims as $claim)
                @if (isset($config->status))
                    @if ($claim->a1 == '' && $claim->claim_type == 'MTC' && eval("return $condByPass;"))
                        <tr>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    <a href="/adminCheckerDetail/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                        MTC</a>
                                    <div class="dropdown-divider"></div>
                                    <!-- <a href="javascript:;" id="approveButton1" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="rejectButton1" data-id="{{ $claim->id }}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalreject"><i class="fa fa-ban"
                                        aria-hidden="true"></i>
                                    Reject</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="amendButton1" data-id="{{ $claim->id }}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalamend"><i class="fa fa-reply"
                                        aria-hidden="true"></i>
                                    Amend</a>
                                <div class="dropdown-divider"></div> -->
                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                </div>
                            </td>
                            <td>{{ date('Y-m-d', strtotime($claim->created_at)) ?? '-' }}</td>
                            <td>{{ $claim->userProfile->fullName ?? '-' }}</td>
                            <td>{{ $claim->month ?? '-' }}</td>
                            <td>{{ $claim->id ?? '-' }}</td>
                            <td>{{ $claim->claim_type ?? '-' }}</td>
                            <td>{{ $claim->total_amount ?? '-' }}</td>
                            <td>{{ $claim->status ?? '-' }}</td>
                            <td>{{ $claim->updated_at ?? '-' }}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
</div
