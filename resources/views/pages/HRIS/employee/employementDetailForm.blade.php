<div class="tab-pane fade" id="default-tab-3">
    <h3 class="mt-10px"></i> Employment Details</h3>	<br>
    <form id="employmentForm">
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Company*</label>
            <div class="col-md-5">
                <select class="form-select" name="company" required>
                <?php $companys = getCompany(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($companys)

                @foreach ($companys as $company)
                    <option value="{{$company->id }}">{{$company->companyName}}</option>
                    {{-- <option value="1" label="MIDC Technology Sdn Bhd">MIDC Technology Sdn Bhd</option>
                    <option value="2" label="Edaran Trade Network Sdn Bhd">Edaran Trade Network Sdn Bhd</option>
                    <option value="3" label="Edaran Communications Sdn Bhd">Edaran Communications Sdn Bhd</option>
                    <option value="4" label="Edaran IT Services Sdn Bhd">Edaran IT Services Sdn Bhd</option>
                    <option value="5" label="Sidic Technology Sdn Bhd">Sidic Technology Sdn Bhd</option>
                    <option value="6" label="Edaran Lifestyle Trading Services Sdn Bhd">Edaran Lifestyle Trading Services Sdn Bhd</option>
                    <option value="7" label="Elitemac Resources Sdn Bhd">Elitemac Resources Sdn Bhd</option>
                    <option value="8" label="Edaran Lifestyle Sdn Bhd">Edaran Lifestyle Sdn Bhd</option>
                    <option value="9" label="Edaran Lifestyle Maintenance Sdn Bhd">Edaran Lifestyle Maintenance Sdn Bhd</option>
                    <option value="10" label="Shinba-Edaran Sdn Bhd">Shinba-Edaran Sdn Bhd</option> --}}
                    @endforeach
                    @endif

                </select>

            </div>

            <label class="form-label col-form-label col-md-1">Department*</label>
            <div class="col-md-5">
                <select class="form-select" name="department" required>
                    <?php $departments = getDepartment(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($departments)

                @foreach ($departments as $department)
                    <option value="{{$department->id }}">{{$department->departmentName}}</option>
                    {{-- <option label="Please Choose" selected="selected"> </option>
                    <option value="1" label="MIDC Technology Sdn Bhd">Business Development</option>
                    <option value="2" label="System Integration">System Integration</option>
                    <option value="3" label="Group Corporate Planning">Group Corporate Planning </option>
                    <option value="4" label="Group Human Resources Developement">Group Human Resources Developement </option>
                    <option value="5" label="Major Accounts">Major Accounts </option>
                    <option value="6" label="Recurring Revenue">Recurring Revenue </option>
                    <option value="7" label="Group Procurement & Credit Control & Group Administration">Group Procurement & Credit Control & Group Administration</option>
                    <option value="8" label="Group Financial Accounting">Group Financial Accounting</option>
                    <option value="9" label="Group Legal & Secretarial">Group Legal & Secretarial</option>
                    <option value="10" label="Group Internal Audit">Group Internal Audit</option> --}}
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Unit*</label>
            <div class="col-md-5">
                <select class="form-select" name="unit" required>
                    <?php $units = getUnit(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($units)

                @foreach ($units as $unit)
                    <option value="{{$unit->id }}">{{$unit->unitName}}</option>
                    {{-- <option label="Please Choose" selected="selected"> </option>
                    <option value="1" label="Application Unit">Application Unit</option>
                    <option value="2" label="Group Internal Audit">Group Internal Audit</option>
                    <option value="2" label="Infrastructure Unit">Infrastructure Unit</option> --}}
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Branch*</label>
            <div class="col-md-5">
                <select class="form-select" name="branch" required>
                    <?php $branchs = getBranch(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($branchs)

                @foreach ($branchs as $branch)
                    <option value="{{$branch->id }}">{{$branch->branchName}}</option>
                    {{-- <option label="Please Choose" selected="selected"> </option>
                    <option value="1" label="Office">Office</option>
                    <option value="2" label="Putrajaya">Putrajaya</option>
                    <option value="2" label="Kuala Lumpur">Kuala Lumpur</option> --}}
                    @endforeach
                    @endif

                </select>

            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Job Grade*</label>
            <div class="col-md-5">
                <select class="form-select" name="jobGrade" required>
                    <?php $jobGrades = getJobGrade(); ?>
                    <option label="Please Choose" selected="selected"> </option>
                    @if ($jobGrades)

                    @foreach ($jobGrades as $jobGrade)
                        <option value="{{$jobGrade->id }}">{{$jobGrade->jobGradeName}}</option>
                    {{-- <option label="Please Choose" selected="selected"> </option>
                    <option value="1" label="Director">Director</option>
                    <option value="2" label="Senior">Senior</option>
                    <option value="2" label="Manager Unit">Manager</option> --}}
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Designation*</label>
            <div class="col-md-5">
                <select class="form-select" name="designation" required>
                    <?php $designations = getDesignation(); ?>
                    <option label="Please Choose" selected="selected"> </option>
                    @if ($designations)

                    @foreach ($designations as $designation)
                        <option value="{{$designation->id }}">{{$designation->designationName}}</option>
                    {{-- <option label="Please Choose" selected="selected"> </option>
                    <option value="1" label="Customer Care">Customer Care</option>
                    <option value="2" label="PutraAdministratorjaya">Administrator</option>
                    <option value="2" label="Account manager">Account manager</option> --}}
                    @endforeach
                    @endif

                </select>

            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Employment Type*</label>
            <div class="col-md-5">
                <select class="form-select" name="employmentType" required>
                    <?php $employmentTypes = getEmploymentType(); ?>
                    <option label="Please Choose" selected="selected"> </option>
                    @if ($employmentTypes)

                    @foreach ($employmentTypes as $employmentType)
                        <option value="{{$employmentType->id }}">{{$employmentType->employmentTypeName}}</option>
                    {{-- <option label="Please Choose" selected="selected"> </option>
                    <option value="1" label="Director">Director</option>
                    <option value="2" label="Senior">Senior</option>
                    <option value="2" label="Manager Unit">Manager</option> --}}
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Report To*</label>
            <div class="col-md-5">
                <select class="form-select" name="supervisor" required>
                    <option label="Please Choose" selected="selected"> </option>
                    <option value="1" label="Customer Care">Customer Care</option>
                    <option value="2" label="Administrator">Administrator</option>
                    <option value="2" label="Account manager">Account manager</option>

                </select>

            </div>
        </div>

        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Working Email*</label>
            <div class="col-md-5">
                <input type="email" name="workingEmail" class="form-control mb-10px" placeholder="Email" required />

            </div>

            <label class="form-label col-form-label col-md-1">Joined Date*</label>
            <div class="col-md-5">
                <input type="text" name="joinedDate" class="form-control" id="datepicker-joindate" required />
                <input type="hidden" name="user_id" id="user_id1" class="form-control mb-10px"" />
                <input type="hidden" name="employeeId" id="employeeId" class="form-control mb-10px"" />
                <input type="hidden" name="employeeName" id="employeeName" class="form-control mb-10px"" />
                <input type="hidden" name="employeeEmail" id="employeeEmail" class="form-control mb-10px"" />
            </div>

        </div>

    </form>
    <p class="text-end mb-0">
        <a href="javascript:;" class="btn btn-white me-5px">Previous</a>
        {{-- <a href="javascript:;" class="btn btn-primary">Save</a> --}}
        <buttin id="submitEmployment" class="btn btn-primary">Save</buttin>
    </p>
</div>