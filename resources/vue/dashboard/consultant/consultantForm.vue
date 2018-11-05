<template>
    <div class="app" id="consultantForm">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="m-0 text-white">Create Consultant Form</h4>
            <ul class="list-inline m-0">
                <li class="list-inline-item">
                    <button class="btn btn-warning btn-sm">Save</button>
                </li>
            </ul>
        </div>
        <hr>
        <form action="">
            <label for="exampleInputEmail1">Full name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name">

            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">

            <label for="exampleInputEmail1">Phone Number</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone">

            <label for="exampleInputEmail1">User type</label>
            <select name="" id="">
                <option value="Consultant">Consultant</option>
                <option value="Company">Company</option>
                <option value="Recruiter">Recruiter</option>
            </select>
        </form>
    </div>
</template>

<script>
    export default {
        name: "consultantForm"
    };
</script>