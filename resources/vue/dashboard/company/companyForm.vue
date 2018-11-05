<template>
    <div class="app" id="consultantForm">
        <div class="d-flex justify-content-between align-items-center bg-dark p-3 text-white">
            <div>
                <h4 class="m-0">Create Company Form</h4>
                <small><span class="text-danger">*</span> Marked Feilds are manditory</small>
            </div>
            <ul class="list-inline m-0">
                <li class="list-inline-item"><router-link :to="{name:'forms',params:{formFor:'vendor',formType:'addNew'}}" class="text-white">Skip and Create Vendor</router-link></li>
                <li class="list-inline-item">
                    <button class="btn btn-danger">Submit New Company Details</button>
                </li>
            </ul>
        </div>
        <!-- <h4>Create Vendor Form</h4>
        <small><span class="text-danger">*</span> Marked Feilds are manditory</small> -->
        <hr>
        <form action="">
            <div class="card mb-3">

                <div class="card-body">
                    <div class="mb-3">
                    <h5>Company Details</h5>
                    <hr>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="companyName">Company Name</label>
                            <input type="text" class="form-control" id="companyName" aria-describedby="emailHelp"
                                placeholder="Company name">
                        </div>
                        <div class="col">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                placeholder="email"></div>
                        <div class="col">
                            <label for="phonenumber">Phone Number</label>
                            <input type="number" class="form-control" id="phonenumber" aria-describedby="emailHelp"
                                placeholder="Phone"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="m-0">Address Info</h4>
                        </div>
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <button class="btn btn-danger btn-sm">Add New Address</button>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="address">Adderess type</label>
                            <select name="address" id="address" class="form-control">
                                <option>Select One</option>
                                <option value="Perminent">Perminent</option>
                                <option value="Office">Office</option>
                                <option value="Rcidence">Residence</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="city">City</label>
                            <select name="city" id="city" class="form-control">
                                <option>Select One</option>
                                <option value="city">City</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="state">State</label>
                            <select name="state" id="state" class="form-control">
                                <option>Select One</option>
                                <option value="state">State</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" class="form-control" id="zipcode" aria-describedby="zipcode" placeholder="zipcode">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="fullAddress">Full Address</label>
                            <textarea class="form-control" id="fullAddress" rows="3"></textarea>
                        </div>
                    </div>
                    </div>
                    <h5>Security Details</h5>
                    <hr>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="federalid">Federal Id</label>
                            <input type="text" class="form-control" id="federalid" aria-describedby="Federal Id"
                                placeholder="Federal Id">
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
  name: "consultantForm"
};
</script>