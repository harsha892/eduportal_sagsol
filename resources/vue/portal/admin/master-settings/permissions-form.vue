<template>
  <div>
    <div class="card">
      <div class="card-body">
        <form>
          <div class="form-row">
            <div class="form-group col-md-12">
              <p>Existed Roles</p>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">Sr incharge</label>
                  </div>
                </li>
                <li class="list-inline-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    Jr incharge
                  </div>
                </li>
                <li class="list-inline-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">Accountant</label>
                  </div>
                </li>
                <li class="list-inline-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">Operator</label>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="form-row">
            <div class="col-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Permission Name</label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Permission Name"
                >
              </div>
            </div>
          </div>
          <div>
            <h5>Check the boxces to create new permissions</h5>
            <hr>
            <ul class="list-inline">
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">Home</label>
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  Users
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">Page 3</label>
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">page 4</label>
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">page 5</label>
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">page 6</label>
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">page 7</label>
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">page 8</label>
                </div>
              </li>

              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">page 9</label>
                </div>
              </li>
              <li class="list-inline-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">page 10</label>
                </div>
              </li>
            </ul>
          </div>
          <hr>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I Accept Tearms &amp; Conditions</label>
          </div>
          <div>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import staticData from "../../../../js/StaticData.json";
export default {
  name: "vendorView",
  data() {
    return {
      tabs: "",
      tabIndex: 0,
      userType: ""
    };
  },
  mounted() {
    this.tabs = staticData.userProfileTabs;
    this.userType = this.$route.params.userType;
    console.log("Component mounted.", this.tabs);
  }
};
</script>