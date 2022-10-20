<div class="tab-pane fade" id="default-tab-4">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add New Companion
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form id="addCompanionForm">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Information</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="mainCompanion" value="{{ $companion->mainCompanion ?? '' }}" type="checkbox" role="switch" id="set-main" checked>
                                    <label class="form-check-label" for="set-main">Set as Main Companion</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstnamemc" name="firstName" value="{{ $companion->firstName ?? '' }}" class="form-control" aria-describedby="firstname" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastnamemc" name="lastName" value="{{ $companion->lastName ?? '' }}" class="form-control" aria-describedby="lastname" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" id="fullnamemc" name="fullName" readonly value="{{ $companion->fullName ?? '' }}" class="form-control" aria-describedby="fullname" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                     <div class="col-sm-12">
                                        <label for="passport-number" class="form-label">Identification Number*</label>
                                        <input type="text" name="idNo" value="{{ $companion->idNo ?? '' }}" id="idnumber2" class="form-control" aria-describedby="passport-number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-check form-switch">
                                            <label for="citizen" class="form-label">Non-Citizen ?</label>
                                            <input class="form-check-input partCheck2" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="nonCitizen" value="{{ $companion->nonCitizen ?? '' }}" type="checkbox" role="switch" id="citizen2">
                                        </div>
                                    </div> 
                                <div class="col-sm-6">
                                        <label for="passport" class="form-label">Passport Number</label>
                                        <input type="text" id="passportmc" name="passport" value="{{ $companion->passport ?? '' }}" class="form-control" aria-describedby="passport" readonly>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-sm-3">
                                        <label for="expirydate" class="form-label">Expiry Date</label>
                                        <input type="text" id="expirydatemc" name="expiryDate" value="{{ $companion->expiryDate ?? '' }}" class="form-control" aria-describedby="expirydate" style= "pointer-events: none;" readonly>
                                    </div>
                            <div class="col-sm-3">
                                <label for="issuing-country" class="form-label">Issuing Country</label>
                                <select class="form-select" name="issuingCountry" value="{{ $companion->issuingCountry ?? '' }}" style="text-transform:uppercase">
                                    <option value="MY" label="Malaysia" selected ></option>
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}"  >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}"  >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="contact-number" class="form-label">Contact Number</label>
                                <input type="text" id="contact-number" name="contactNo" value="{{ $companion->contactNo ?? '' }}" class="form-control" aria-describedby="contact-number">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="text" id="dobmc" name="DOB" value="{{ $companion->DOB ?? '' }}" class="form-control" aria-describedby="dob" readonly  style= "pointer-events: none;">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" id="age" name="age" value="{{ $companion->age ?? '' }}" class="form-control" aria-describedby="age">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="dom" class="form-label">Date of Marriage</label>
                                <input type="text" id="dommc" name="DOM" value="{{ $companion->DOM ?? '' }}" class="form-control" aria-describedby="dom">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="marriage-cert" class="form-label">Marriage Certificate</label>
                                        <input type="file" name="marrigeCert" id="marrige-cert" class="form-control" aria-describedby="dob">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="marriage-status" class="form-label">Marriage Status</label>
                                        <select class="form-select" name="marrigeStatus" style="text-transform:uppercase">
                                            <?php $maritialStatus = getMaritalStatus() ?>
                                            <option value="0" label="Please Choose"  ></option>
                                            @foreach ($maritialStatus as $key => $status)
                                            <option value="{{$key}}" >{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text" id="address1" name="address1" value="{{ $companion->address1 ?? '' }}" class="form-control" aria-describedby="address1" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address2" name="address2" value="{{ $companion->address2 ?? '' }}" class="form-control" aria-describedby="address2" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">City*</label>
                                <input type="text" id="firstname" name="city" value="{{ $companion->city ?? '' }}" class="form-control" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode*</label>
                                <input type="number" id="lastname" name="postcode" value="{{ $companion->postcode ?? '' }}" class="form-control" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="state" value="{{ $companion->state ?? '' }}" style="text-transform:uppercase">
                                    <?php $state = state() ?>
                                    <option value="" label="Please Choose"  ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}" >{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" name="country" value="{{ $companion->country ?? '' }}" style="text-transform:uppercase">
                                    <option value="MY" label="Malaysia" selected ></option>
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}"  >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}"  >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Employment Details</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch align-right">
                                    <input class="form-check-input partCheck3" type="checkbox" role="switch" id="set-main">
                                    <label class="form-check-label" for="set-main">Working ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="company-name" class="form-label">Company Name</label>
                                <input type="text" id="companyNamemc" readonly name="companyName" value="{{ $companion->companyName ?? '' }}" class="form-control" aria-describedby="company-name" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="date-joined-company" class="form-label">Date Joined Company</label>
                                <input type="text" readonly  id="dateJoinedmc" name="dateJoined" value="{{ $companion->dateJoined ?? '' }}" class="form-control" aria-describedby="date-joined-company" disabled>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Income Tax Number*</label>
                                <input type="text" readonly id="income-tax-number" name="incomeTax" value="{{ $companion->incomeTax ?? '' }}" class="form-control" aria-describedby="income-tax-number">
                            </div>
                            <div class="col-sm-6">
                                <label for="extension-number" class="form-label">Payslip</label>
                                <input type="file" readonly id="payslipmc" name="payslip" value="{{ $companion->payslip ?? '' }}" class="form-control" aria-describedby="extension-number">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Office Number</label>
                                <input type="text" readonly id="officeNomc" name="officeNo" value="{{ $companion->officeNo ?? '' }}" class="form-control" aria-describedby="income-tax-number">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text"readonly id="address1mc" name="address1E" value="{{ $companion->address1E ?? '' }}" class="form-control" aria-describedby="address1" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" readonly id="address2mc" name="address2E" value="{{ $companion->address2E ?? '' }}" class="form-control" aria-describedby="address2" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">City*</label>
                                <input type="text" readonly id="cityEmc" name="cityE" value="{{ $companion->cityE ?? '' }}" class="form-control" aria-describedby="firstname" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode*</label>
                                <input type="number" readonly id="postcodeEmc" name="postcodeE" value="{{ $companion->postcodeE ?? '' }}" class="form-control" aria-describedby="lastname" maxlength="5" readonly>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" id="stateEmc" name="stateE" readonly value="{{ $companion->stateE ?? '' }}" style="text-transform:uppercase">
                                    <?php $state = state() ?>
                                    <option value="" label="Please Choose"  ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}" >{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="countryEmc" name="countryE" readonly value="{{ $companion->countryE ?? '' }}" style="text-transform:uppercase">
                                    <option value="MY" label="Malaysia" selected ></option>
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}"  >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}"  >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    
                    <p class="text-end mb-0 mt-3">
                        
                        <button href="javascript:;" id="addCompanion" class="btn btn-primary">Save</button>
                    </p>
                    </form>
                </div>
            </div>
        </div>
        @if ($companions)
        @foreach ($companions as $companion)
        <span style="display: none">{{$no = $idRun++}}</span>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{$companion->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$companion->id}}" aria-expanded="false" aria-controls="collapse{{$companion->id}}">
                    {{$companion->fullName ?? ''}}
                </button>
            </h2>
            <div id="collapse{{$companion->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$companion->id}}" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-white">
                    <form id="updateCompanionForm{{$no}}">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Information</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="mainCompanion" value="{{ $companion->mainCompanion ?? '' }}" type="checkbox" role="switch" id="set-main" checked>
                                    <label class="form-check-label" for="set-main">Set as Main Companion</label>
                                    <input type="hidden" name="id" value="{{$companion->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstname" name="firstName" value="{{ $companion->firstName ?? '' }}" class="form-control" aria-describedby="firstname">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastname" name="lastName" value="{{ $companion->lastName ?? '' }}" class="form-control" aria-describedby="lastname">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" id="fullname" name="fullName" value="{{ $companion->fullName ?? '' }}" class="form-control" aria-describedby="fullname">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check form-switch">
                                            <label for="citizen" class="form-label">Non-Citizen ?</label>
                                            <input class="form-check-input" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="nonCitizen" value="{{ $companion->nonCitizen ?? '' }}" type="checkbox" role="switch" id="citizen" checked>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="passport-number" class="form-label">Identification Number*</label>
                                        <input type="text"name="idNo" value="{{ $companion->idNo ?? '' }}" id="passport-number" class="form-control" aria-describedby="passport-number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="passport" class="form-label">Passport Number</label>
                                        <input type="text" id="passport" name="passport" value="{{ $companion->passport ?? '' }}" class="form-control" aria-describedby="passport">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="expirydate" class="form-label">Expiry Date</label>
                                        <input type="date" id="expirydate" name="expiryDate" value="{{ date_format(date_create($companion->expiryDate), 'Y-m-d') }}" class="form-control" aria-describedby="expirydate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="issuing-country" class="form-label">Issuing Country</label>
                                <select class="form-select" name="issuingCountry" value="{{ $companion->issuingCountry ?? '' }}">
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $companion->issuingCountry) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $companion->issuingCountry) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="contact-number" class="form-label">Contact Number</label>
                                <input type="text" id="contact-number" name="contactNo" value="{{ $companion->contactNo ?? '' }}" class="form-control" aria-describedby="contact-number">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" id="dob" name="DOB" value="{{ date_format(date_create($companion->DOB), 'Y-m-d') }}" class="form-control" aria-describedby="dob">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" id="age" name="age" value="{{ $companion->age ?? '' }}" class="form-control" aria-describedby="age">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="dom" class="form-label">Date of Marriage</label>
                                <input type="date" id="dom" name="DOM" value="{{ date_format(date_create($companion->DOM), 'Y-m-d') }}" class="form-control" aria-describedby="dom">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="marriage-cert" class="form-label">Marriage Certificate</label>
                                        <input type="file" name="marrigeCert" id="marriage-cert" class="form-control" aria-describedby="dob">
                                        @if ($companion->marrigeCert)
                                        Click <a href="/storage/app/file/{{$companion->marrigeCert}}" target="_blank">here</a> to see marriage cert.
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="marriage-status" class="form-label">Marriage Status</label>
                                        <select class="form-select" name="marrigeStatus" >
                                            <?php $maritialStatus = getMaritalStatus() ?>
                                            <option value="0" label="Please Choose"  ></option>
                                            @foreach ($maritialStatus as $key => $status)
                                            <option value="{{$key}}" <?php echo ($key == $companion->marrigeStatus) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text" id="address1" name="address1" value="{{ $companion->address1 ?? '' }}" class="form-control" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address2" name="address2" value="{{ $companion->address2 ?? '' }}" class="form-control" aria-describedby="address2">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">City*</label>
                                <input type="text" id="firstname" name="city" value="{{ $companion->city ?? '' }}" class="form-control" aria-describedby="firstname">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode*</label>
                                <input type="text" id="lastname" name="postcode" value="{{ $companion->postcode ?? '' }}" class="form-control" aria-describedby="lastname">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="state" value="{{ $companion->state ?? '' }}">
                                    <?php $state = state() ?>
                                    <option value="0" label="Please Choose"  ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}"  <?php echo ($key == $companion->state) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" name="country" value="{{ $companion->country ?? '' }}">
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $companion->country) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $companion->country) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Employment Details</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch align-right">
                                    <input class="form-check-input" type="checkbox" role="switch" id="set-main" checked>
                                    <label class="form-check-label" for="set-main">Working ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="company-name" class="form-label">Company Name</label>
                                <input type="text" id="phone-number" name="companyName" value="{{ $companion->companyName ?? '' }}" class="form-control" aria-describedby="company-name">
                            </div>
                            <div class="col-sm-6">
                                <label for="date-joined-company" class="form-label">Date Joined Company</label>
                                <input type="text" id="date-joined-company" name="dateJoined" value="{{ date_format(date_create($companion->dateJoined), 'Y-m-d') }}" class="form-control" aria-describedby="date-joined-company">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Income Tax Number*</label>
                                <input type="text" id="income-tax-number" name="incomeTax" value="{{ $companion->incomeTax ?? '' }}" class="form-control" aria-describedby="income-tax-number">
                            </div>
                            <div class="col-sm-6">
                                <label for="extension-number" class="form-label">Payslip</label>
                                <input type="file" id="extension-number" name="payslip" value="{{ $companion->payslip ?? '' }}" class="form-control" aria-describedby="extension-number">
                                @if ($companion->payslip)
                                Click <a href="/storage/app/file/{{$companion->payslip}}" target="_blank">here</a> to see marriage cert.
                                @endif
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Office Number</label>
                                <input type="text" id="income-tax-number" name="officeNo" value="{{ $companion->officeNo ?? '' }}" class="form-control" aria-describedby="income-tax-number">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text" id="address1" name="address1E" value="{{ $companion->address1E ?? '' }}" class="form-control" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address2" name="address2E" value="{{ $companion->address2E ?? '' }}" class="form-control" aria-describedby="address2">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">City*</label>
                                <input type="text" id="firstname" name="cityE" value="{{ $companion->cityE ?? '' }}" class="form-control" aria-describedby="firstname">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode*</label>
                                <input type="text" id="lastname" name="postcodeE" value="{{ $companion->postcodeE ?? '' }}" class="form-control" aria-describedby="lastname">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="stateE" value="{{ $companion->stateE ?? '' }}">
                                    <?php $state = state() ?>
                                    <option value="0" label="Please Choose"  ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}"  <?php echo ($key == $companion->stateE) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" name="countryE" value="{{ $companion->countryE ?? '' }}">
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $companion->countryE) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $companion->countryE) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    
                    <p class="text-end mb-0 mt-3">
                    <a href="javascript:;" id="updateCompanion{{$no}}" class="btn btn-primary">Save</a>
                    </p>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>


