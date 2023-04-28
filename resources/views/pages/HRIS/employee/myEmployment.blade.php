<div class="tab-pane fade" id="v-pills-employment" role="tabpanel" aria-labelledby="v-pills-employment-tab">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Employee Information 1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="row p-2">
                    <div class="col-sm-3">
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input"  name="" value="" type="checkbox" role="switch" id="" checked>
                            <label class="form-check-label" for="set-main">Set as Main Company</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6" id="editHRISJs">
                        <div class="card">
                            <div class="card-header bg-white bg-gray-100">
                                <h4 class="fw-bold">
                                    Employment Information
                                </h4>
                                <p class="fw-light">
                                    Update your employment information
                                </p>
                            </div>
                            <form id="addEmpForm">
                                <div class="card-body">
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Role*</label>
                                        <select class="form-select" name="role" id="role">
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            <?php $roles = getAllRole(); ?>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $user->role_id == $role->id ? 'selected="selected"' : '' }}
                                                    label="{{ $role->roleName }}">{{ $role->roleName }}</option>
                                                    
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{ $employment->id }}">
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Company*</label>
                                        <select class="form-select" name="company" id="companyForEmployment">
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            <?php $companys = getCompany(); ?>
                                            @foreach ($companys as $company)
                                                <option value="{{ $company->id }}" <?php echo $employment->company == $company->id ? 'selected="selected"' : ''; ?>
                                                    label="{{ $company->companyName }}">{{ $company->companyName }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{ $employment->id }}">
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Department*</label>
                                        <select class="form-select" name="departmentId" id="departmentShow">
                                            <?php $Departments = getDepartment(); ?>
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($Departments as $Department)
                                                <option value="{{ $Department->id ?? null }}" <?php echo $employment->department == $Department->id ? 'selected="selected"' : ''; ?>
                                                    label="{{ $Department->departmentName }}">{{ $Department->departmentName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Unit</label>
                                        <select class="form-select" name="unitId" id="unitShow">
                                            <?php $Units = getUnit(); ?>
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($Units as $Unit)
                                                <option value="{{ $Unit->id }}" <?php echo $employment->unit == $Unit->id ? 'selected="selected"' : ''; ?>
                                                    label="{{ $Unit->unitName }}">{{ $Unit->unitName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Branch*</label>
                                        <select class="form-select" name="branchId" id="branchShow">
                                            <?php $Branchs = getBranch(); ?>
                                            <option value="" label="PLEASE CHOOSE" selected></option>
                                            @foreach ($Branchs as $Branch)
                                                <option value="{{ $Branch->id }}" <?php echo $employment->branch == $Branch->id ? 'selected="selected"' : ''; ?>
                                                    label="{{ $Branch->branchName }}">{{ $Branch->branchName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Joined Date*</label>
                                        <input type="text" name="joinedDate" value="{{ $employment->joinedDate ?? '' }}"
                                            id="datepicker-joindate" class="form-control" placeholder="YYYY-MM-DD"
                                            aria-describedby="address-2">
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Job Grade*</label>
                                        <select class="form-select" name="jobGrade"  id="jobGrade">
                                            <?php $JobGrades = getJobGrade(); ?>
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($JobGrades as $JobGrade)
                                                <option value="{{ $JobGrade->id }}" <?php echo $employment->jobGrade == $JobGrade->id ? 'selected="selected"' : ''; ?>
                                                    label="{{ $JobGrade->jobGradeName }}">{{ $JobGrade->jobGradeName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Designation*</label>
                                        <select class="form-select" name="designation" id="designation">
                                            <?php $Designations = getDesignation(); ?>
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($Designations as $Designation)
                                                <option value="{{ $Designation->id }}" <?php echo $employment->designation == $Designation->id ? 'selected="selected"' : ''; ?>
                                                    label="{{ $Designation->designationName }}">{{ $Designation->designationName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Employment Type*</label>
                                        <select class="form-select" name="employmentType" id="employmentType">
                                            <?php $EmploymentTypes = getEmploymentType(); ?>
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($EmploymentTypes as $EmploymentType)
                                                <option value="{{ $EmploymentType->id }}" label="{{ $EmploymentType->type }}"
                                                    {{ $employment->employmentType == $EmploymentType->id ? "selected='selected'" : '' }}>
                                                    {{ $EmploymentType->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="supervisor">
                                                User Role
                                            </label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input partCheck2" id="supervisor" name="supervisor"
                                                    {{ $employment->supervisor == 'on' ? 'checked' : '' }} type="checkbox"
                                                    name="supervisor" id="supervisor">
                                                <label class="form-label" for="supervisor">
                                                    Supervisor
                                                </label>
                                                <div class="form-text">
                                                    If enabled, report-to will enabled the username
                                                </div>
                                            </div>
                                        </div>
                                        @if ($employment->supervisor == 'on')
                                            <div class="col-sm-6" id="reportto">
                                            @else
                                                <div class="col-sm-6" style="display: none;" id="reportto">
                                        @endif
                                        <label for="employee-id" class="form-label">Report To</label>
                                        <select class="form-select" name="report_to" id="reporttoo">
                                            <?php $employees = getEmployee(); ?>
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" label="{{ $employee->employeeName }}"
                                                    {{ $employment->report_to == $employee->id ? "selected='selected'" : '' }}>
                                                </option>


                                                <!-- <input type="text" id="passportmyprofile" name="passport" value="{{ $profile->passport ?? '' }}" class="form-control" aria-describedby="passport" > -->
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="employee-id" class="form-label">Charge Out Rate</label>
                                        <input type="number" id="" name="COR"
                                            value="{{ $employment->COR ?? '' }}" class="form-control"
                                            aria-describedby="employee-id">
                                    </div>
                                </div>
                                <hr>
                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label for="employee-id" class="form-label">Employee ID</label>
                                        <input type="text" id="employee-id" name="employeeId"
                                            value="{{ $employment->employeeId ?? '' }}" class="form-control"
                                            aria-describedby="employee-id" readonly>
                                        <input type="hidden" value="{{ $employment->user_id ?? '' }}" name="user_id">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="employee-name" class="form-label">Employee Name</label>
                                        <input type="text" id="employee-name" name="employeeName" class="form-control"
                                            value="{{ $employment->employeeName ?? '' }}" aria-describedby="employee-name"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label for="employee-email" class="form-label">Employee Email</label>
                                        <input type="text" id="employee-email" name="employeeEmail" class="form-control"
                                            value="{{ $employment->workingEmail ?? '' }}" aria-describedby="employee-email"
                                            readonly>
                                    </div>
                                </div>
                                <hr>
                                <p class="mt-3 mb-3 fw-bold">Confirm Changes</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="effective-from" class="form-label">Effective From*</label>
                                        <input type="text" id="effective-from" name="EffectiveFrom" class="form-control"
                                            value="{{ $employment->effectiveFrom ?? '' }}" placeholder="YYYY-MM-DD"
                                            aria-describedby="effective-from">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="firstname" class="form-label">Event*</label>
                                        <select class="form-select" name="Event">
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            <?php $events = getEvent(); ?>
                                            @foreach ($events as $key => $event)
                                                <option value="{{ $key }}"
                                                <?= $employment->event == $key ? 'selected="selected"' : '' ?>>
                                                {{ $event }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary float-end" id="updateEmp">
                                Update
                            </button>
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header bg-gray-100">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-bold">
                                            Job History
                                        </h4>
                                        <p class="fw-light">
                                            Update your history information
                                        </p>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-white float-end" data-bs-toggle="dropdown">
                                            Filter content
                                            <i class="fa fa-filter text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" class="dropdown-item">Company</a>
                                            <a href="#" class="dropdown-item">Department</a>
                                            <a href="#" class="dropdown-item">Unit</a>
                                            <a href="#" class="dropdown-item">Branch</a>
                                            <a href="#" class="dropdown-item">Job Grade</a>
                                            <a href="#" class="dropdown-item">Designation</a>
                                            <a href="#" class="dropdown-item">Employment Type</a>
                                            <a href="#" class="dropdown-item">Supervisor</a>
                                            <a href="#" class="dropdown-item">Clear Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <ul class="timeline-with-icons">
                                        @if ($jobHistorys)
                                            @foreach ($jobHistorys as $jobHistory)
                                                <li class="timeline-item mb-5 ">
                                                    <span class="timeline-icon">
                                                        <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                                    </span>

                                                    <div class="card p-3 bg-white">
                                                        <p class="fw-bold">{{ $jobHistory->employmentDetail ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->role ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->company ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->department ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->unit ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->branch ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->jobGrade ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->designation ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->employmentType ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->COR ?? '' }}</p>
                                                        <p class="fw-bold">{{ $jobHistory->event ?? '' }}</p>



                                                        <p class="text-muted">
                                                            Effective Date: {{ $jobHistory->effectiveDate ?? '' }}
                                                        </p>

                                                        <p class="text-muted">
                                                            Event: {{ $jobHistory->event ?? '' }}
                                                        </p>

                                                        <p class="text-muted">
                                                            Updated By: {{ $jobHistory->updatedBy ?? '' }}
                                                        </p>

                                                        
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    Employee Information 2
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-white">
                    <div class="row p-2">
                        <div class="col-sm-3">
                            
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input"  name="" value="" type="checkbox" role="switch" id="" checked>
                                <label class="form-check-label" for="set-main">Set as Main Company</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6" id="editHRISJs">
                            <div class="card">
                                <div class="card-header bg-white bg-gray-100">
                                    <h4 class="fw-bold">
                                        Employment Information
                                    </h4>
                                    <p class="fw-light">
                                        Update your employment information
                                    </p>
                                </div>
                                <form id="addEmpForm2">
                                    <div class="card-body">
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Role*</label>
                                            <select class="form-select" name="role">
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                
                                            </select>
                                            <input type="hidden" name="id" value="">
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Company*</label>
                                            <select class="form-select" name="company" id="companyForEmployment">
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                
                                            </select>
                                            <input type="hidden" name="id" value="">
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Department*</label>
                                            <select class="form-select" name="departmentId" id="departmentShow">
                                                
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                
                                            </select>
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Unit*</label>
                                            <select class="form-select" name="" id="">
                                               
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                
                                            </select>
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Branch*</label>
                                            <select class="form-select" name="branchId" id="branchShow">         
                                                <option value="" label="PLEASE CHOOSE"></option>
                                            </select>
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Joined Date*</label>
                                            <input type="text" name="" value=""
                                                id="datepicker-joindate" class="form-control" placeholder="YYYY-MM-DD"
                                                aria-describedby="address-2">
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Job Grade*</label>
                                            <select class="form-select" name="jobGrade">
                                                <option value="" label="PLEASE CHOOSE"></option>
                                            </select>
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Designation*</label>
                                            <select class="form-select" name="designation">
                                                <option value="" label="PLEASE CHOOSE"></option>
                                            </select>
                                        </div>
                                        <div class="row p-2">
                                            <label for="firstname" class="form-label">Employment Type*</label>
                                            <select class="form-select" name="employmentType">
                                                
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                
                                            </select>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="supervisor">
                                                    User Role
                                                </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input partCheck2" id="supervisor" name="supervisor"
                                                        {{ $employment->supervisor == 'on' ? 'checked' : '' }} type="checkbox"
                                                        name="supervisor" id="supervisor">
                                                    <label class="form-label" for="supervisor">
                                                        Supervisor
                                                    </label>
                                                    <div class="form-text">
                                                        If enabled, report-to will enabled the username
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($employment->supervisor == 'on')
                                                <div class="col-sm-6" id="reportto">
                                                @else
                                                    <div class="col-sm-6" style="display: none;" id="reportto">
                                            @endif
                                            <label for="employee-id" class="form-label">Report To</label>
                                            <select class="form-select" name="report_to" id="reporttoo">
                                                
                                                <option value="" label="PLEASE CHOOSE"></option>
                                               
                                            </select>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="employee-id" class="form-label">Charge Out Rate</label>
                                            <input type="number" id="" name="COR"
                                                value="" class="form-control"
                                                aria-describedby="employee-id">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row p-2">
                                        <div class="col-sm-6">
                                            <label for="employee-id" class="form-label">Employee ID</label>
                                            <input type="text" id="employee-id" name="employeeId"
                                                value="" class="form-control"
                                                aria-describedby="employee-id" readonly>
                                            <input type="hidden" value="" name="user_id">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="employee-name" class="form-label">Employee Name</label>
                                            <input type="text" id="employee-name" name="employeeName" class="form-control"
                                                value="" aria-describedby="employee-name"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-sm-6">
                                            <label for="employee-email" class="form-label">Employee Email</label>
                                            <input type="text" id="employee-email" name="employeeEmail" class="form-control"
                                                value="" aria-describedby="employee-email"
                                                readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="mt-3 mb-3 fw-bold">Confirm Changes</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="effective-from" class="form-label">Effective From*</label>
                                            <input type="text" id="effective-from" name="EffectiveFrom" class="form-control"
                                                value="" placeholder="YYYY-MM-DD"
                                                aria-describedby="effective-from">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="firstname" class="form-label">Event*</label>
                                            <select class="form-select" name="Event">
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                
                                                
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary float-end" id="updateEmp2">
                                    Update
                                </button>
                            </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header bg-gray-100">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="fw-bold">
                                                Job History
                                            </h4>
                                            <p class="fw-light">
                                                Update your history information
                                            </p>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-white float-end" data-bs-toggle="dropdown">
                                                Filter content
                                                <i class="fa fa-filter text-dark"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">Company</a>
                                                <a href="#" class="dropdown-item">Department</a>
                                                <a href="#" class="dropdown-item">Unit</a>
                                                <a href="#" class="dropdown-item">Branch</a>
                                                <a href="#" class="dropdown-item">Job Grade</a>
                                                <a href="#" class="dropdown-item">Designation</a>
                                                <a href="#" class="dropdown-item">Employment Type</a>
                                                <a href="#" class="dropdown-item">Supervisor</a>
                                                <a href="#" class="dropdown-item">Clear Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <ul class="timeline-with-icons">
                                            @if ($jobHistorys)
                                                @foreach ($jobHistorys as $jobHistory)
                                                    <li class="timeline-item mb-5 ">
                                                        <span class="timeline-icon">
                                                            <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                                        </span>

                                                        <div class="card p-3 bg-white">
                                                            <p class="fw-bold">{{ $jobHistory->employmentDetail ?? '' }}</p>
                                                            <p class="text-muted mb-2 fw-bold">{{ $jobHistory->effectiveDate ?? '' }}</p>
                                                            <p class="text-muted">
                                                                Effective Date: {{ $jobHistory->effectiveDate ?? '' }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

