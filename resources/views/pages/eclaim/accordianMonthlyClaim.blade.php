<style>personal
    /* Set the size and position of the autocomplete input field */
    #autocomplete {
      height: 30px;
      width: 100%;
      margin-top: 10px;
    }
    #autocomplete2 {
      height: 30px;
      width: 100%;
      margin-top: 10px;
    }
    
</style>

<div class="">
    <div class="accordion" id="accordionExample">
        
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button bg-white-500 text-black px-3 py-10px pointer-cursor collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <label class="form-label">Travelling</label>
                </button>
            </h2>
            <form id="travelForm">
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body bg-gray-100 text-black">
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Travel Date*</label>
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" name="general_id" value="{{ Request::segment(4) }}">
                                        <input type="hidden" value="{{ isset($month_id) ? monthMTC($month_id) : $month }}" name="month" id="monthInput">
                                        <input type="hidden" value="{{ $year }}" name="year">
                                        <input class="form-control" id="datepickertc"  name="travel_date">
                                    </div>
                                    
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Start Time*</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="timestart" name="start_time" style=" background: #ffffff;" class=" form-control" value="" placeholder="choose time">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">End Time*</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="timeend" name="end_time" class=" form-control" style=" background: #ffffff;" placeholder="choose time">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Total Hours</label>
                                    </div>
                                    <div class="col-md-3">
                                    <input readonly type="text" name="total_hour" id="totalduration" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="" name="desc" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="" style="display: none">
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Start date</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="daystart" class=" form-control" value="">
                                </div>
                                <div class="col-md-2" style="display: none">
                                    <label class="form-label">End date</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="dayend" class=" form-control">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Travel Date</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="general_id" value="{{ Request::segment(4) }}">
                                <input type="hidden" value="{{ isset($month_id) ? monthMTC($month_id) : $month }}" name="month" id="monthInput">
                                <input type="hidden" value="{{ $year }}" name="year">
                                <input class="form-control" id="datepickertc"  name="travel_date">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Start Time</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="timestart" name="start_time" style=" background: #ffffff;" class=" form-control" value="" placeholder="choose time">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">End Time</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="timeend" name="end_time" class=" form-control" style=" background: #ffffff;" placeholder="choose time">
                            </div>
                        </div>
                        
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Total Hours</label>
                            </div>
                            <div class="col-md-8">
                                <input readonly type="text" name="total_hour" id="totalduration" class="form-control">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" id="" name="desc" rows="3"></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Reason using Web</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="reason">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Type of Transport</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select" id="type_transport" name="type_transport">
                                        <option class="form-label" value="" selected>
                                            PLEASE CHOOSE</option>
                                        <option class="form-label" value="Personal Car"> Personal
                                            Car</option>
                                        <option class="form-label" value="Personal Motocycle">Personal
                                            Motocycle</option>
                                        <option class="form-label" value="Public Transport"> Public
                                            Transport</option>
                                        <option class="form-label" value="Company Car">Company Car
                                        </option>
                                        <option class="form-label" value="Carpool"> Carpool
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Start Location</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-select" id="ls" name="location_start">
                                            <option class="form-label" value="" selected>
                                            PLEASE CHOOSE</option>
                                            <option class="form-label">Home
                                            </option>
                                            <option class="form-label">Office
                                            </option>
                                            <option class="form-label">My Project
                                            </option>
                                            <option class="form-label">Others
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Destination</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-select" id="dest" name="location_end">
                                            <option class="form-label" value="">PLEASE CHOOSE</option>
                                            <option class="form-label">Home
                                            </option>
                                            <option class="form-label">Office
                                            </option>
                                            <option class="form-label">My Project
                                            </option>
                                            <option class="form-label">Others
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0" id="project" style="display: none">
                                    <div class="col-md-3">
                                        <label class="form-label">Project</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-select" id="" name="project_id">
                                            
                                            <?php $projects = myProjectOnly(); ?>
                                            <option class="form-label" value="">
                                                Please Select</option>
                                            @foreach ($projects as $project)
                                                <option class="form-label" value="{{ $project->id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row p-0" id="projectdest" style="display: none">
                                    <div class="col-md-3">
                                        <label class="form-label">Project</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-select" id="" name="project_id2">
                                            <?php $projects = myProjectOnly(); ?>
                                            <option class="form-label" value="">Select Project</option>
                                            @foreach ($projects as $project)
                                                <option class="form-label" value="{{ $project->id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Start Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="address_start" id="autocomplete" placeholder="Enter a Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Destination Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="location_address" id="autocomplete2" placeholder="Enter a Location">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2" id="logname" style="display: none">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Log Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-select" id="" name="log_id">
                                            <?php $typeOfLogs = typeOfLog(); ?>
                                            <option class="form-label" value="" selected>
                                                Please Select</option>
                                            @foreach ($typeOfLogs as $item)
                                                <option class="form-label" value="{{ $item->id }}">{{ $item->type_of_log }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row p-2" style="display: none">
                            <div class="col-md-4">
                                <label class="form-label">Office</label>
                            </div>
                            <div class="col-md-3">
                                <input id="office" type="text" value="{{ getBranchFullAddress($user_id) ?? '-' }}"  class="form-control" name="">
                            </div>
                        </div>
                        <div class="row p-2" style="display: none">
                            <div class="col-md-4">
                                <label class="form-label">home</label>
                            </div>
                            <div class="col-md-3">
                                <input id="permanentAddress" type="text" value="{{ $address }}"  class="form-control" name="">
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Total Distance</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input id="result" type="text" class="form-control" readonly name="total_km">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="button" id="calculateButton" class="btn btn-primary" value="Calculate">
                                    </div>
                                    <div class="col-md-2" id="confirmBtnDiv" style="display: none">
                                        <input type="button" id="confirmBtn" class="btn btn-primary" value="Confirm?">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Petrol/Fares</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="petrol" name="petrol" step="0.01">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Toll</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="toll" name="toll">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Parking</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="parking" name="parking">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row p-2">
                            <div class="col-md-6">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <label class="form-label">Supporting Document</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="file" class="form-control-file" name="file_upload[]" id="supportdocument" multiple>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row p-2" style="display: none">
                            <div class="col-md-4">
                                <label class="form-label">Distance</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="" name="" id="first_km" data-firstkmcar="{{ $firstkmcar }}" data-firstkmmotor="{{ $firstkmmotor }}">                            </div>
                            <div class="col-md-2">
                                <label class="form-label">entitlement</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="" name="" id="first_price" data-firstpricecar="{{ $firstpricecar }}" data-firstpricemotor="{{ $firstpricemotor }}">
                            </div>
                        </div>
                        <div class="row p-2" style="display: none">
                            <div class="col-md-4">
                                <label class="form-label">Distance</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="" name="" id="second_km" data-secondkmcar="{{ $secondkmcar }}" data-secondkmmotor="{{ $secondkmmotor }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">entitlement</label>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" value="" name="" id="second_price" data-secondpricecar="{{ $secondpricecar }}" data-secondpricemotor="{{ $secondpricemotor }}">
                            </div>
                        </div>
                        <div class="row p-2" style="display: none">
                            <div class="col-md-4">
                                <label class="form-label">Distance</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="" name="" id="third_km" data-thirdkmcar="{{ $thirdkmcar }}" data-thirdkmmotor="{{ $thirdkmmotor }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">entitlement</label>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" value="" name="" id="third_price" data-thirdpricecar="{{ $thirdpricecar }}" data-thirdpricemotor="{{ $thirdpricemotor }}">
                            </div>
                        </div>
                        
                        <div class="row p-2">
                            <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                                <button type="submit" id="travelSaveButton" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="accordion-item">
            
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button bg-white-500 text-black px-3 py-10px pointer-cursor collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        <label class="form-label">Subsistence Allowance & Accommodation</label>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body bg-gray-100 text-black">
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Claim For</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" id="ca" name="claim_for">
                                    <option class="form-label" value="" selected>
                                        PLEASE CHOOSE</option>
                                    <option class="form-label" value="1">With Cash
                                        Advance</option>
                                    <option class="form-label" value="2">Without Cash
                                        Advance</option>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <!-- <label class="form-label">Supporting Document</label> -->
                            </div>
                            <div class="col-md-6">
                                <!-- <input type="file" class="form-control-file" name="file_upload[]" id="supportdocument" multiple> -->
                                <input type="hidden" name="general_id" value="{{ Request::segment(4) }}">
                                <input type="hidden" value="{{ isset($month_id) ? monthMTC($month_id) : $month }}" name="month" id="monthInputSub">                                
                            </div>
                        </div>
                        <div class="WC" style="display:none">
                        <form id="subsFormca">
                                <input type="hidden" name="claim_for" value='1'>
                                <input type="hidden" name="general_id" value="{{ Request::segment(4) }}">
                                <input type="hidden" value="{{ isset($month_id) ? monthMTC($month_id) : $month }}" name="month" id="monthInputSub">     
                                <input type="hidden" value="{{ $year }}" name="year">                          
                            <div class="row p-2">
                                <table id="claimtable" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th>-</th>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Form ID</th>
                                            <th class="text-nowrap">Type of Cash Advance
                                            </th>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($cashAdvances as $cashAdvance)
                                            <tr>
                                                <td><input class="form-check-input" type="radio" value="{{ $cashAdvance->id }}" name="cashAdvanceId" /></td>
                                                <td>{{ $no++ }}</td>
                                                <td>Form ID {{ $cashAdvance->id }}</td>
                                                <td> {{ getCashAdvanceType($cashAdvance->type) }}</td>
                                                <td> {{ $cashAdvance->travel_date }}</td>
                                                <td> {{ $cashAdvance->final_amount ?? $cashAdvance->amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="WOCca" >
                                <div class="row p-2">
                                    <div class="row p-2">
                                        <label class="form-label">Travel date and time</label>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row p-2">
                                                        <div class="col-md-3">
                                                            <label class="form-label">Start Date</label>
                                                        </div>
                                                        <div class="col">
                                                            <select class="form-control" name="start_date" id="date1ca">
                                                                <option value="">Select Date</option>
                                                                @foreach($travelDate as $date)
                                                                    <option value="{{ $date }}">{{ $date }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row p-2">
                                                        <div class="col-md-3">
                                                            <label class="form-label">Start Time</label>
                                                        </div>
                                                        <div class="col">
                                                        <select class="form-select" id="time1ca" name="start_time">
                                                                <option class="form-label" value="" selected>Please
                                                                    Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row p-2">
                                                        <div class="col-md-3">
                                                            <label class="form-label">End Date</label>
                                                        </div>
                                                        <div class="col">
                                                            <select class="form-control" name="end_date" id="date2ca">
                                                                <option value="">Select Date</option>
                                                                @foreach($travelDate as $date)
                                                                    <option value="{{ $date }}">{{ $date }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row p-2">
                                                        <div class="col-md-3">
                                                            <label class="form-label">End Time</label>
                                                        </div>
                                                        <div class="col">
                                                            <select class="form-select" id="time2ca" name="end_time">
                                                                <option class="form-label" value="" selected>Please
                                                                    Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Travel Duration</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="result1ca" name="travel_duration" readonly>
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Project</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-select" name="project_id">
                                                        <option class="form-label" value="" selected>
                                                            PLEASE CHOOSE</option>
                                                        <?php $projects = myProjectOnly(); ?>
                                                        @foreach ($projects as $project)
                                                            <option class="form-label" value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4" style="display: none">
                                                    <label class="form-label">laundry</label>
                                                </div>
                                                <div class="col-md-8" style="display: none">
                                                    <input type="text" class="form-control" id="laundryDayca" name="" value=7 readonly>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Description</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="desc" id="" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <label class="form-label">Subsistence Allowance</label>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Breakfast</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input  type="text" class="form-control" readonly value="{{ $food[0]['breakfast'] }}" id="BFca">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">X</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" readonly name="breakfast" value="0" id="DBFca">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" readonly id="totalbfca">
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Lunch</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input  type="text" class="form-control" readonly value="{{ $food[0]['lunch'] }}" id="LHca">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">X</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="lunch" readonly class="form-control" value="0" id="DLHca">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" readonly id="totallhca">
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Dinner</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input  type="text" class="form-control" readonly value="{{ $food[0]['dinner'] }}" id="DNca">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">X</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="dinner" readonly class="form-control" value="0" id="DDNca">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" readonly id="totaldnca">
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        
                                                    </div>
                                                    <div class="col-md-1">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Total (A)</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input readonly type="text" name="total_subs" class="form-control" value="0" id="TSca">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-control">
                                                    <div class="row p-2">
                                                        <label class="form-label">Accommodation</label>
                                                    </div>
                                                    <div class="row p-2">
                                                        <div class="col-md-3" id="hotelcca">
                                                            <input class="form-check-input" type="checkbox" value="{{ $food[0]['local_hotel_value'] }}" id="htvca" />
                                                            <label class="form-label">Hotel</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input  type="text" readonly name="hotel_value"class="form-control" id="hotelcvca">
                                                        </div>
                                                        <div class="col-md-2" style="display: none">
                                                            <input  type="text" class="form-control"  id="hotelcv1ca" value="0">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="form-label">X</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="hotel" class="form-control" id="hnca" disabled value="0">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="form-label">=</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="hotel" class="form-control" id="hnca" disabled value="0">
                                                        </div>
                                                    </div>
                                                    <div class="row p-2">
                                                        <div class="col-md-3" id="lodgingcca">
                                                            <input class="form-check-input" type="checkbox" value="{{ $food[0]['lodging_allowance_value'] }}" id="ldgvca" />
                                                            <label class="form-label">Lodging</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input  type="text" readonly class="form-control" id="lodgingcvca">
                                                        </div>
                                                        <div class="col-md-2" style="display: none">
                                                            <input readonly type="text" class="form-control" id="lodgingcv1ca" value="0">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="form-label">X</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="lodging" class="form-control" value="0" id="lnca" disabled>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="form-label">=</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="hotel" class="form-control" id="hnca" disabled value="0">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row p-2">
                                                        <div class="col-md-3">
                                                            <!-- <input type="file" class="form-control-file" name="file_upload[]" id="supportdocumentca" multiple> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label">Total (B)</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="form-label">=</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input readonly type="text" name="total_acc" class="form-control" value="0" id="TAVca">
                                                        </div>
                                                    </div>
                                                    <div class="row p-2">
                                                        
                                                        <div class="col-md-8">
                                                            <label class="form-label">Total Subsistence Allowance & Accommodation (A+B)</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="form-label">=</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input readonly type="text" name="total" class="form-control" value="" id="total2ca">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2" id="laundrydivca" style="display: none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <label class="form-label">Laundry Allowance</label>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Amount</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" name="laundry_amount" id=""class="form-control" placeholder="0.00">
                                                    </div>
                                                    </div>
                                                    <div class="row p-2">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Description</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" name="laundry_desc" id="" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row p-2">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Supporting Document</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="file" class="form-control-file" name="file_laundry[]" id="" multiple>
                                                        </div> 
                                                    </div> -->
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="caButton" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        <div class="WOC" style="display:none">
                        <form id="subsForm">
                            <div class="row p-2">
                                <div class="row p-2">
                                    <label class="form-label">Travel date and time</label>
                                    <input type="hidden" name="claim_for" value='2'>
                                    <input type="hidden" name="general_id" value="{{ Request::segment(4) }}">
                                    <input type="hidden" value="{{ isset($month_id) ? monthMTC($month_id) : $month }}" name="month" id="monthInputSub">  
                                    <input type="hidden" value="{{ $year }}" name="year"> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row p-2">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Start Date</label>
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-control" name="start_date" id="date1">
                                                            <option value="">Select Date</option>
                                                            @foreach($travelDate as $date)
                                                                <option value="{{ $date }}">{{ $date }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Start Time</label>
                                                    </div>
                                                    <div class="col">
                                                    <select class="form-select" id="time1" name="start_time">
                                                            <option class="form-label" value="" selected>Please
                                                                Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row p-2">
                                                    <div class="col-md-3">
                                                        <label class="form-label">End Date</label>
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-control" name="end_date" id="date2">
                                                            <option value="">Select Date</option>
                                                            @foreach($travelDate as $date)
                                                                <option value="{{ $date }}">{{ $date }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-3">
                                                        <label class="form-label">End Time</label>
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-select" id="time2" name="end_time">
                                                            <option class="form-label" value="" selected>Please
                                                                Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row p-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Travel Duration</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="result1" name="travel_duration" readonly>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Project</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="project_id">
                                                    <option class="form-label" value="" selected>
                                                        PLEASE CHOOSE</option>
                                                    <?php $projects = myProjectOnly(); ?>
                                                    @foreach ($projects as $project)
                                                        <option class="form-label" value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4" style="display: none">
                                                <label class="form-label">laundry</label>
                                            </div>
                                            <div class="col-md-8" style="display: none">
                                                <input type="text" class="form-control" id="laundryDay" name="" value=7 readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="row p-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Description</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="desc" id="" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-control">
                                            <div class="row p-2">
                                                <label class="form-label">Subsistence Allowance</label>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-2">
                                                    <label class="form-label">Breakfast</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input  type="text" class="form-control" readonly value="{{ $food[0]['breakfast'] }}" id="BF">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">X</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" readonly name="breakfast" value="0" id="DBF">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" readonly id="totalbf">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-2">
                                                    <label class="form-label">Lunch</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input  type="text" class="form-control" readonly value="{{ $food[0]['lunch'] }}" id="LH">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">X</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="lunch" readonly class="form-control" value="0" id="DLH">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" readonly id="totallh">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-2">
                                                    <label class="form-label">Dinner</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input  type="text" class="form-control" readonly value="{{ $food[0]['dinner'] }}" id="DN">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">X</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="dinner" readonly class="form-control" value="0" id="DDN">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" readonly id="totaldn">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-2">
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    
                                                </div>
                                                <div class="col-md-1">
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Total (A)</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input readonly type="text" name="total_subs" class="form-control" value="0" id="TS">
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-control">
                                                <div class="row p-2">
                                                    <label class="form-label">Accommodation</label>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-3" id="hotelc">
                                                        <input class="form-check-input" type="checkbox" value="{{ $food[0]['local_hotel_value'] }}" id="htv" />
                                                        <label class="form-label">Hotel</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input  type="number" readonly name="hotel_value"class="form-control" id="hotelcv">
                                                    </div>
                                                    <div class="col-md-2" style="display: none">
                                                        <input  type="number" class="form-control"  id="hotelcv1" value="0">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">X</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="hotel" class="form-control" id="hn" readonly value="0">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="hotel" class="form-control" id="hnTotal" readonly value="0">
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-3" id="lodgingc">
                                                        <input class="form-check-input" type="checkbox" value="{{ $food[0]['lodging_allowance_value'] }}" id="ldgv" />
                                                        <label class="form-label">Lodging</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input  type="number" readonly class="form-control" id="lodgingcv">
                                                    </div>
                                                    <div class="col-md-2" style="display: none">
                                                        <input readonly type="number" class="form-control" id="lodgingcv1" value="0">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">X</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="lodging" class="form-control" value="0" id="ln" readonly>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="hotel" class="form-control" id="lnTotal" readonly value="0">
                                                    </div>
                                                </div>
                                                
                                                <div class="row p-2">
                                                    <div class="col-md-3">
                                                        <!-- <input type="file" class="form-control-file" name="file_upload[]" id="supportdocument" multiple> -->
                                                    </div>
                                                    <div class="col-md-1">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Total (B)</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input readonly type="text" name="total_acc" class="form-control" value="0" id="TAV">
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    
                                                    <div class="col-md-8">
                                                        <label class="form-label">Total Subsistence Allowance & Accommodation (A+B)</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="form-label">=</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input readonly type="text" name="total" class="form-control" value="" id="total2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2" style="display: none" id="laundrydiv">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <label class="form-label">Laundry Allowance</label>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Amount</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" name="laundry_amount" id=""class="form-control" placeholder="0.00">
                                                    </div>
                                                    </div>
                                                    <div class="row p-2">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Description</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" name="laundry_desc" id="" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row p-2">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Supporting Document</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="file" class="form-control-file" name="file_laundry[]" id="" multiple>
                                                        </div> 
                                                    </div> -->
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                                <button type="submit" id="subsSaveButton" class="btn btn-primary">Save</button>
                            </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button bg-white-500 text-black px-3 py-10px pointer-cursor " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <label class="form-label">Others Claim</label>
                </button>
            </h2>
            <form id="personalForm">
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body bg-gray-100 text-black">
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Applied Date</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="general_id" value="{{ Request::segment(4) }}">
                                <input type="hidden" value="{{ isset($month_id) ? monthMTC($month_id) : $month }}" name="month">

                                <input type="text" style="pointer-events: none;" class="form-control" name="applied_date" readonly id="datepickerpc">
                                <input type="hidden" value="{{ $year }}" name="year">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Claim Category</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" id="claimcategory" name="claim_category">
                                    <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                    {{ $categorys = getClaimCategoryMtc() }}
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->claim_catagory }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- akan tarik data dari  labelling name dlam setting add claim --}}
                        <div class="row p-2" id="labelCategory" style="display: none">
                            <div class="col-md-4">
                                <label class="form-label" id="label"></label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" id="contentLabel" name="claim_category_detail">
                                    <option class="form-label" value="" selected>Please
                                        Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Amount</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" name="amount" id="amount"class="form-control" placeholder="0.00">
                            </div>
                        </div> 
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" name="claim_desc" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Supporting Document</label>
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="file_upload[]" id="supportdocument" multiple>
                            </div> 
                        </div>
                        <div class="row p-2">
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-secondary" id="resetButtonOthers">Reset</button>
                                <button type="submit" class="btn btn-primary" id="personalSaveButton">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhySfXJwwoMVqbaiioEs38eOi8UkN7_ow&libraries=places"></script>

<script>
    var startAddressInput = document.getElementById('autocomplete');
    var destinationAddressInput = document.getElementById('autocomplete2');
    var calculateButton = document.getElementById('calculateButton');

    function initAutocomplete() {
        var autocomplete = new google.maps.places.Autocomplete(startAddressInput);
        autocomplete.setFields(['address_components', 'geometry', 'formatted_address']);
        initAutocomplete2();
    }

    function initAutocomplete2() {
        var autocomplete2 = new google.maps.places.Autocomplete(destinationAddressInput);
        autocomplete2.setFields(['address_components', 'geometry', 'formatted_address']);
    }

    document.addEventListener("DOMContentLoaded", function() {
        initAutocomplete();
        calculateButton.addEventListener("click", calculateDistance);
    });

    
    function calculateDistance() {
        var startAddress = startAddressInput.value;
        var destinationAddress = destinationAddressInput.value;

        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix({
            origins: [startAddress],
            destinations: [destinationAddress],
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.METRIC,
        }, function(response, status) {
            if (status !== 'OK') {
                alert('Error: ' + status);
            } else {
                var distance = response.rows[0].elements[0].distance.value;
                var distanceInKm = distance / 1000;
                var distanceFormatted = distanceInKm.toFixed(2);
                document.getElementById('result').value = distanceFormatted;


                
            }
        });
    }
</script>
