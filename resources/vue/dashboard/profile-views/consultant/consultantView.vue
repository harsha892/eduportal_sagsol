<template>
    <div class="app" id="consultantForm">
        <div class="container my-3">
            <div class="row">
                <div class="card w-100 mb-3">
                    <div class="card-header">
                        Submmited Jobs
                    </div>
                    <div class="card-body">
                        <table class="table  table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Job details</th>
                                    <th scope="col">Posted on</th>
                                    <th scope="col">Assained on</th>
                                    <th>Interviews on</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Java Developer <br>
                                        <small>
                                            Company: Google
                                        </small><br>
                                        <small>
                                            Contact Person: Santosh K
                                        </small><br>

                                    </td>
                                    <td>10 oct 2018</td>
                                    <td>
                                        10 oct 2018
                                    </td>
                                    <td>10 oct 2018</td>
                                </tr>
                                <tr>
                                    <td>Angular Developer <br>
                                        <small>
                                            Company: TCS
                                        </small><br>
                                        <small>
                                            Contact Person: Manoj K
                                        </small><br>

                                    </td>
                                    <td>12 oct 2018</td>
                                    <td>
                                        10 oct 2018
                                    </td>
                                    <td>NA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card w-100 mb-3">
                    <div class="card-header">
                        Assigneed Recruiter
                    </div>
                    <div class="card-body">
                        <table class="table  table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Recruiter</th>
                                    <th scope="col">Assigneed On</th>
                                    <th>Interviews</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>21 oct 2018</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>10 oct 2018</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Larry</td>
                                    <td>1 Oct 2018</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "consultantForm"
    };
</script>