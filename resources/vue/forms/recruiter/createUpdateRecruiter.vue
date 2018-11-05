<template>
    <div class="app" id="createUpdateRecruiter">
        <div class="container">
            <div class="forms">
                <div class="container">
                    <form>
                        <legend class="text-left">Personal Info</legend>
                        <hr>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="exampleInputEmail1">Full name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Full name">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="email">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Phone">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">User type</label>
                                <select name="" id="" class="form-control">
                                    <option value="Consultant">Consultant</option>
                                    <option value="Company">Company</option>
                                    <option value="Recruiter">Recruiter</option>
                                </select>
                            </div>
                        </div>
                        <legend class="my-3">Adderess</legend>
                        <hr>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="exampleInputEmail1">Adderess type</label>
                                <select name="" id="" class="form-control">
                                    <option value="Perminent">Perminent</option>
                                    <option value="Office">Office</option>
                                    <option value="Rcidence">Residence</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">City</label>
                                <select name="" id="" class="form-control">
                                    <option value="City">City</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">State</label>
                                <select name="" id="" class="form-control">
                                    <option value="Perminent">State</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Zipcode</label>

                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Zipcode">
                            </div>
                        </div>
                        <div class="form-row">
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <legend class="mt-3">User Security info</legend>
                        <hr>
                        <div class="form-row">
                            <div class="col">
                                <label for="exampleInputEmail1">Passport Number</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Passport Number">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Federal Id</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Federal ID">
                            </div>
                        </div>
                        <legend class="mt-3">Education</legend>
                        <hr>
                        <div class="form-row mb-2">
                            <div class="col">

                                <label for="exampleInputEmail1">Education Type</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Education Type">
                            </div>
                            <div class="col">

                                <label for="exampleInputEmail1">Course Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Course Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="exampleInputEmail1">Univercity</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Univercity">
                            </div>
                            <div class="col">

                                <label for="exampleInputEmail1">Year of passed</label>
                                <input type="taxt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Year of passed">
                            </div>
                        </div>

                        <legend class="mt-4">User Document</legend>
                        <hr>
                        <div class="form-row">
                            <div class="col">
                                <div class="d_name">
                                    <label for="exampleInputEmail1">Document Name</label>
                                    <input type="file" placeholder="Document Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-row my-3">
                            <div class="col text-center">
                                <button class="btn btn-primary">Create New User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "createUpdateRecruiter"
    };
</script>