<div class="modal fade" id="add-children" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-children">Add Children Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addChildrenForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNameChild" name="firstName" value="" class="form-control" aria-describedby="firstname">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameChild" name="lastName" value=""  class="form-control" aria-describedby="lastname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullNameChild" readonly name="fullName" value=""  class="form-control" aria-describedby="fullname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck4" value="" type="checkbox" name="nonCitizen" {{($children->nonCitizen ?? '') ? 'checked' : ''}} id="citizen">
                                        <label class="form-check-label" for="citizen">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">Identification Number*</label>
                                    <input type="text" id="idNoaddChild" name="idNo" value="" class="form-control" aria-describedby="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="text" id="DOBChild" name="DOB" class="form-control" aria-describedby="dob" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" id="ageChild" name="age" class="form-control" aria-describedby="age" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input type="text" id="passportChild" name="passport" class="form-control" aria-describedby="passport">
                                </div>
                                <div class="col-sm-6">
                                    <label for="expirydate" class="form-label">Expiry Date</label>
                                    <input type="text" id="expiryDateChild" name="expiryDate" class="form-control" aria-describedby="expirydate" style="pointer-events: none;" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Issuing Country</label>
                            <select class="form-select" name="issuingCountry" id="">
                                <option value="MY" label="Malaysia" selected ></option>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}">{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="childgender">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Marital Status</label>
                            <select class="form-select" name="maritalStatus" id="">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($maritalStatus as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Education Information</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="education-type" class="form-label">Education Type</label>
                            <select class="form-select" name="educationType" id="">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($educationType as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-level" class="form-label">Education Level</label>
                            <select class="form-select" name="educationLevel" id="">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($educationLevel as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <label for="institution-name" class="form-label">Institution Name</label>
                            <input type="text" name="instituition" id="" class="form-control" aria-describedby="institution-name">
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">File upload</h4>
                    <div class="row p-2">
                        <div class="col">
                            <input type="file" class="form-control" name="supportDoc">
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button href="javascript:;" id="addChildren" class="btn btn-primary">Save</button>
               
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-children" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-children">Add Children Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editChildrenForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstName1" name="firstName" value="" class="form-control" aria-describedby="firstname">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="id" id="id1">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastName1" name="lastName" value=""  class="form-control" aria-describedby="lastname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullName1" name="fullName" value=""  class="form-control" aria-describedby="fullname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input" type="checkbox" id="nonCitizen1" name="nonCitizen" >
                                        <label class="form-check-label" for="citizen">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">Identification Number*</label>
                                    <input type="text" id="idNo1" name="idNo" value="" class="form-control" aria-describedby="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" id="DOB1" name="DOB" class="form-control" aria-describedby="dob">
                                </div>
                                <div class="col-sm-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" id="age1" name="age" class="form-control" aria-describedby="age">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input type="text" id="passports1" name="passport" class="form-control" aria-describedby="passport">
                                </div>
                                <div class="col-sm-6">
                                    <label for="expirydate" class="form-label">Expiry Date</label>
                                    <input type="date" id="expiryDate1" name="expiryDate" class="form-control" aria-describedby="expirydate">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Issuing Country</label>
                            <select class="form-select" name="issuingCountry" id="issuingCountry1">
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}">{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>

                            </select>
                        </div>
                    </div>
                    <div class="row p-2"> 
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender1">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Marital Status</label>
                            <select class="form-select" name="maritalStatus" id="maritalStatus1">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($maritalStatus as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Education Information</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="education-type" class="form-label">Education Type*</label>
                            <select class="form-select" name="educationType" id="educationType1">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($educationType as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-level" class="form-label">Education Level*</label>
                            <select class="form-select" name="educationLevel" id="educationLevel1">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($educationLevel as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <label for="institution-name" class="form-label">Institution Name</label>
                            <input type="text" name="instituition" id="instituition1" class="form-control" aria-describedby="institution-name">
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">File upload</h4>
                    <div class="row p-2">
                        <div class="col">
                            <input type="file" class="form-control" name="supportDoc">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary formSave" id="editChildren">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view-children" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-children">Add Children Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editChildren">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstName" name="firstName" value="" class="form-control" aria-describedby="firstname" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastName" name="lastName" value=""  class="form-control" aria-describedby="lastname" readonly>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullName" name="fullName" value=""  class="form-control" aria-describedby="fullname" readonly>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input" type="checkbox" id="nonCitizen" name="nonCitizen"  disabled>
                                        <label class="form-check-label" for="citizen">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">Identification Number*</label>
                                    <input type="text" id="idNo" name="idNo" value="" class="form-control" aria-describedby="lastname" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" id="DOB" name="DOB" class="form-control" aria-describedby="dob" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" id="age" name="age" class="form-control" aria-describedby="age" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input type="text" id="passports" name="passport" class="form-control" aria-describedby="passport" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="expirydate" class="form-label">Expiry Date</label>
                                    <input type="date" id="expiryDate" name="expiryDate" class="form-control" aria-describedby="expirydate" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Issuing Country</label>
                            <select class="form-select" name="issuingCountry" id="issuingCountry" disabled>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}">{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender" disabled>
                                <option value="0" label="Please Choose "></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Marital Status</label>
                            <select class="form-select" name="maritalStatus" id="maritalStatus" disabled>
                                <option value="0" label="Please Choose "></option>
                                @foreach ($maritalStatus as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Education Information</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="education-type" class="form-label">Education Type*</label>
                            <select class="form-select" name="educationType" id="educationType" disabled>
                                <option value="0" label="Please Choose "></option>
                                @foreach ($educationType as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-level" class="form-label">Education Level*</label>
                            <select class="form-select" name="educationLevel" id="educationLevel" disabled>
                                <option value="0" label="Please Choose "></option>
                                @foreach ($educationLevel as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <label for="institution-name" class="form-label">Institution Name</label>
                            <input type="text" name="instituition" id="instituition" class="form-control" aria-describedby="institution-name" readonly>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">File upload</h4>
                    <div class="row p-2">
                        <div class="col">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <had type="button" class="btn btn-primary" id="viewChildren">Save</had>
            </div>
        </div>
    </div>
</div>

