@extends('layouts.dashboardTenant')

@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header" id="leaveApprJs" >E-Leave <small>| Leave Approval | Supervisor</small></h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row">
                        <div class="col">
                            <h3>Leave Approval</h3>
                        </div>
                        <div class="col">
                            <div class="panel-heading">
                                <div class="col-md-12" style="display: flex; justify-content: flex-end" >
                                    <button class="btn btn-default btn-icon btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" >
                                        <i class="fa fa-filter"></i>
                                    </button>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="form-control collapse hidden">
                        <h5>Filter</h5><br>
                        <table>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row p-1">
                                        <label for="date">Date</label>
                                        <input type="text" class="form-control" id="datepicker-date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row p-1">
                                        <label for="text">Employee Name</label>
                                        <select class="form-select" id="" >
                                            <option class="form-label" value="" selected>All</option>
                                        </select>
                                    </div>
                                    <!-- <div class="row">
                                        <input type="text" class="form-control" placeholder="Employee Name">
                                    </div> -->
                                </div>
                                <div class="col-md-3">
                                    <div class="row p-1">
                                        <label for="text">Type of Leave</label>
                                        <select class="form-select" id="" >
                                            <option class="form-label" value="" selected>All</option>
                                        </select>
                                    </div>
                                    <!-- <div class="row">
                                        <input type="text" class="form-control" placeholder="Type of Leave">
                                    </div> -->
                                </div>
                                <div class="col-md-3">
                                <br>
                                    <!-- <div class="row"> -->
                                        <button type="search" class="btn btn-info">Search</button> &ensp;
                                        <button type="reset" class="btn btn-info">Reset</button>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </table>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Applied Date</th>
                                <th>Employee Name</th>
                                <th>Type of Leave</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Days Applied</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <?php $id = 0 ?>
                                    @if ($leaveApprView)
                                    @foreach ($leaveApprView as $l)
                                <?php $id++ ?>
                                <td >
                                    <div class="btn-group">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <a class="dropdown-item" href="/myTimesheet">View Calendar</a>
                                            <div class="dropdown-divider" style=""></div>
                                            <!-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn">View Calendar</a> -->
                                            <a href="javascript:;" id="editButton2" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#approveModal-tab-1" class="btn">Approve Leave</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" id="editButton3" data-id="{{ $l->id }}"  data-bs-toggle="modal" data-bs-target="#rejectModal-tab-1" class="btn">Reject Leave</a>
                                            {{-- <div class="dropdown-divider"></div>
                                            <a href="javascript:;" id="approveButton" data-id="{{ $l->id }}"  class="btn">Cancel Leave</a> --}}
                                        </ul>
                                    </div>
                                </td>
                                <td>{{$l->applied_date}}</td>
                                <td>{{$l->fullName}}</td>
                                <td>{{$l->type}}</td>
                                <td>{{$l->start_date}}</td>
                                <td>{{$l->end_date}}</td>
                                <td>{{$l->total_day_applied}}</td>
                                <td>@for ($i = 1; $i <= 4; $i++)
                                        <?php
                                            switch ($i) {
                                                case 1:
                                                    $status = 'Pending for approve';
                                                    break;
                                                case 2:
                                                    $status = 'Pending for approve';
                                                    break;
                                                case 3:
                                                    $status = 'Rejected';
                                                    break;
                                                case 4:
                                                    $status = 'Approved';
                                                    break;
                                                default:
                                                    $status = 'Unknown';
                                            }
                                        ?>
                                        @if ($l->up_rec_status == $i)
                                            @php
                                                echo $status;
                                                break;
                                            @endphp
                                        @endif
                                    @endfor
                                </td>
                            </tr> 
                            @endforeach
                            @endif
                        </tbody>        
                    </table>
                    <!-- TRIAL OF APPROVEMODAL-tab-1 -->
                    <div class="modal fade" id="approveModal-tab-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apply Leave</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateForm">
                                        <div class="row row-cols-lg-auto g-3 mb-3">
                                            <div class="col-12" style="width:50%">
                                                <label>Applied Date</label><br>
                                                <input type="text" readonly class="form-control-plaintext" id="applieddate" value="">
                                                <input type="hidden" readonly class="form-control-plaintext" id="iddata" >
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Type of Leave*</label><br>
                                                <input type="text" readonly class="form-control-plaintext" id="type1">
                                            </div> 
                                            <div class="col-12" style="width:50%">
                                                <label>Number of Day(s) Applied</label><br>
                                                <input type="text" readonly class="form-control-plaintext" id="dayapplied">
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Total Days Applied*</label><br>
                                                <input type="text" readonly class="form-control-plaintext" id="totaldayapplied">
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Leave Date</label><br>
                                                <input type="text" readonly class="form-control-plaintext" id="leavedate">
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Reason*</label><br>
                                                <input type="text" readonly class="form-control-plaintext" id="reason1">
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Leave Session</label><br>
                                                <div></div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value="1" type="radio" name="flexRadioDefault1" id="radioyes">
                                                    <label class="form-check-label" for="radioyes">
                                                        Morning
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value="2" type="radio" name="flexRadioDefault2" id="radiono">
                                                    <label class="form-check-label" for="radiono">
                                                        Evening
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Supporting Document*</label><br>
                                                <a href="#" class="link-primary">example.pdf</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <label for="text" style="color:blue">Recommended By:</label><br>
                                                </div>
                                                <div class="row p-2">
                                                </div>
                                                <div class="row p-2">
                                                    <label for="text">Status:</label><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="updateButton">Approve</button>
                                            {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Approve</button> --}}
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF APPROVEMODAL-tab-1 -->
                    <!-- TRIAL REJECTMODAL -tab-1-->
                    <div class="modal fade" id="rejectModal-tab-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updatereject">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Employee Name:</label>
                                                <input type="text" readonly class="form-control-plaintext" id="datafullname2" value="">
                                                <input type="hidden" readonly class="form-control-plaintext" id="iddata3" >		
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Submitted Date:</label>
                                                <input type="text" readonly class="form-control-plaintext" id="applieddate2" value="">
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Type of Leave:</label>
                                                <input type="text" readonly class="form-control-plaintext" id="type3" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">No of Day(s) Applied:</label>
                                                <input type="text" readonly class="form-control-plaintext" id="dayapplied2" value="">
                                            </div>
                                           
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Duration:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="form-label row-md-6"> </label>			
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Start Date:</label>
                                                <input type="text" readonly class="form-control-plaintext" id="startdate2" value="">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">End Date:</label>
                                                <input type="text" readonly class="form-control-plaintext" id="enddate2" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Total Days Applied:</label>
                                                <input type="text" readonly class="form-control-plaintext" id="totaldayapplied2" value="">
                                            </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label row-md-6">Reason:</label>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="text" class="form-control row p-5" value="" name="reasonreject">
                                            </div>
                                        </div>
                            
                                        <br>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="updateButtonreject">Reject</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF REJECTMODAL-tab-1 -->
                </div>
            </div>
            <!-- </div> -->
            <!-- END tab-pane 1 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END #app -->
@endsection