<template>
  <div id="adminView">
    <div class="card">
      <div class="card-body">
        <div class="col">
          <div class="row">
            <div class="col-3 border-right">
              <ul class="p-0">
                <li>Question paper model name 1</li>
                <li>Created by: Ravi</li>
                <li>Created on: 21 oct2016</li>
                <li>Group: NA</li>
                <li>Subject: NA</li>
                <li>Valid From - To: 22 oct 2016 4 June 2019</li>
                <li>Total Marks: 100</li>
                <li>Total Time: 3 Hrs</li>
                <li>Section type: NA</li>
                <li>Question Name type : NA</li>
                <li>No of Sections: 4
                  <ul>
                    <li>Section 1: 20 marks,
                      <br>No of questions: 10
                      <br>No of optional questions: 0
                      <br>Question type: Orative
                    </li>
                    <li>Section 2: 25 marks,
                      <br>No of questions: 2
                      <br>No of optional questions: 1
                      <br>Question type: Orative
                    </li>
                    <li>Section 3: 25 marks,
                      <br>No of questions: 3
                      <br>No of optional questions: 2
                      <br>Question type: Orative
                    </li>
                    <li>Section 4: 30 marks,
                      <br>No of optional questions: 3
                      <br>No of questions: 5
                      <br>Question type: MCQ
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="col-9">
              <form>
                <div class="form-row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Group</label>
                      <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        placeholder="Group"
                      >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Subject Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="Subject Name"
                      >
                    </div>
                  </div>
                </div>
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div
                      class="card-header"
                      id="headingOne"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Section 1</h5>
                        <ul class="list-inline">
                          <li class="list-inline-item">No of Questions: 4</li>
                          <li class="list-inline-item">Total Marks: 4</li>
                          <li class="list-inline-item">Questions type: MCQ</li>
                        </ul>
                      </div>
                    </div>

                    <div
                      id="collapseOne"
                      class="collapse show"
                      aria-labelledby="headingOne"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="list-group">
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q1) List group item heading</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q1) List group item heading</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q1) List group item heading</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q4)</h5>
                                <small></small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div
                      class="card-header"
                      id="headingTwo"
                      data-toggle="collapse"
                      data-target="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                    >
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Section 2</h5>
                        <ul class="list-inline">
                          <li class="list-inline-item">No of Questions: 4</li>
                          <li class="list-inline-item">Total Marks: 4</li>
                          <li class="list-inline-item">Questions type: MCQ</li>
                        </ul>
                      </div>
                    </div>
                    <div
                      id="collapseTwo"
                      class="collapse"
                      aria-labelledby="headingTwo"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="list-group">
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q1) List group item heading</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q2) Sample test question 2</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q3) question 3 sample test</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q4)</h5>
                                <small></small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div
                      class="card-header"
                      id="headingThree"
                      data-toggle="collapse"
                      data-target="#collapseThree"
                      aria-expanded="false"
                      aria-controls="collapseThree"
                    >
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Section 3</h5>
                        <ul class="list-inline">
                          <li class="list-inline-item">No of Questions: 4</li>
                          <li class="list-inline-item">Total Marks: 4</li>
                          <li class="list-inline-item">Questions type: MCQ</li>
                        </ul>
                      </div>
                    </div>

                    <div
                      id="collapseThree"
                      class="collapse"
                      aria-labelledby="headingThree"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="list-group">
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q1) List group item heading</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q1) List group item heading</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q1) List group item heading</h5>
                                <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                          <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <div>
                                <h5 class="mb-1">Q4)</h5>
                                <small></small>
                              </div>
                              <div>
                                <a
                                  href
                                  class="btn swatch-indigo text-white btn-sm"
                                  data-toggle="modal"
                                  data-target="#exampleModal"
                                >Select Question</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <h5 class="modal-title" id="exampleModalLabel">Section 1 > Q1</h5>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action>
              <div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="Topic">Topic</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option value>Choose one</option>
                        <option>Internet &amp; multi media</option>
                        <option>Photoshope</option>
                        <option>Database</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="Difficulty_Level">Difficulty Level</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option value>Choose one</option>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="Created_by">Created by</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option value>Choose one</option>
                        <option>Lakshmi</option>
                        <option>Ravi</option>
                        <option>Naveen</option>
                        <option>Imran</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <hr>
            <div class="list-group">
              <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <div>
                    <p>
                      Topic: Internet &amp; multimedia | Difficulty Level:
                      <span
                        class="badge badge-danger"
                      >High</span>
                    </p>
                    <h5 class="mb-1">List group item heading</h5>
                    <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                  </div>
                  <div>
                    <a
                      href
                      class="btn swatch-teal text-white btn-sm"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >Choose Question</a>
                  </div>
                </div>
              </div>
              <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <div>
                    <p>
                      Topic: Internet &amp; multimedia | Difficulty Level:
                      <span
                        class="badge badge-warning"
                      >Medium</span>
                    </p>
                    <h5 class="mb-1">List group item heading</h5>
                    <small>Posted on: 3 days ago | Created by: Ravi ganaga</small>
                  </div>
                  <div>
                    <a
                      href
                      class="btn swatch-teal text-white btn-sm"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >Choose Question</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import topHeaderView from "../../../../shared/MainHeader";
import asideBar from "../../../../shared/AsideBar";
export default {
  name: "adminApp",
  data() {
    return {
      userType: "",
      pageType: ""
    };
  },
  watch: {
    "$route.params": function() {
      this.userType = this.$route.params.userType;
    }
  },
  mounted() {
    this.userType = this.$route.params.userType;
    this.pageType = this.$route.path.split(
      "/portal/" + this.userType + "/dashboard/"
    )[1];
    console.log(this.pageType);
  },
  components: {
    topHeaderView,
    asideBar
  },
  methods: {}
};
</script>