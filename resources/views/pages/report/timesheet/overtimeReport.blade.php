@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Timesheet | Overtime Report </small></h1>
    <div class="panel panel" id="overtimeReportJs">
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6" style="display: flex; justify-content: flex-end">
                    <a id="filter" class="btn btn-default btn-icon btn-lg">
                        <i class="fa fa-filter"></i>
                    </a>
                </div>
            </div>
            <br>
            <div class="form-control" id="filterform" style="display:none">
                <form action="/searchOvertimeReport" method="POST">
                    <div class="row p-2">
                        <h4>Filter</h4>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Employer Name</label>
                            <select class="form-select" id="employeenamesearch" name="employeeName" data-default-value="">
                                <option class="form-label" value="" >Please Select</option>
                                <?php $employees = getEmployee() ?>
                                @foreach ($employees as $employee)
                                <option value="{{$employee->user_id}}">{{$employee->employeeName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Year</label>
                            <select class="form-select" id="yearsearch" name="year" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $years = year() ?>
                                @foreach ($years as $year => $key)
                                <option value="{{$key}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Month</label>
                            <select class="form-select" id="monthsearch" name="month" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $months = month() ?>
                                @foreach ($months as $month => $key)
                                <option value="{{$month}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Designation</label>
                            <select class="form-select" id="designationsearch" name="designation" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $designations = getDesignation() ?>
                                @foreach ($designations as $designation)
                                <option value="{{$designation->designationName}}">{{$designation->designationName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Department</label>
                            <select class="form-select" id="departmentsearch" name="department" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $departments = getDepartment() ?>
                                @foreach ($departments as $department)
                                <option value="{{$department->departmentName}}">{{$department->departmentName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="emergency-firstname" class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-primary form-control"> <i class="fas fa-magnifying-glass"></i> Search</button>
                        </div>
                        <div class="col-sm-1">
                            <label for="emergency-firstname" class="form-label">&nbsp;</label>
                            <a href="#" class="btn btn-primary form-control"> <i class="fas fa-repeat"></i> Reset</a>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="form-control">
                <div class="panel-body">
                    <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th class="text-nowrap">No</th>
                                <th class="text-nowrap">Employee Name</th>
                                <th class="text-nowrap">Designation</th>
                                <th class="text-nowrap">Department</th>
                                <th class="text-nowrap">Date</th>
                                {{-- <th class="text-nowrap">Total Overtime Hours</th> --}}
                                <th class="text-nowrap">Total Overtime Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @if ($overtimes)
                                @foreach ($overtimes as $item)
                                    <?php
                                        $total_hour = explode(':', $item->total_hour);
                                        $remaining_hour = ($total_hour[0] > 9) ? $total_hour[0] - 9 : 0;
                                        $remaining_time = $remaining_hour . ':' . $total_hour[1] . ':' . $total_hour[2];
                                    ?>
                                    @if ($remaining_hour > 0)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->employeeName }}</td>
                                            <td>{{ $item->designationName }}</td>
                                            <td>{{ $item->departmentName }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ date_format(date_create($remaining_time), 'H:i:s') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="row p-2">
            <div class="col align-self-start">
                <a href="/setting" class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div> --}}
    </div>
    
</div>

        @endsection
