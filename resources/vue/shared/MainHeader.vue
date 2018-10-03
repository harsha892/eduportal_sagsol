<template>
    <div class="app" id="mainApp">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Benz Tech</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item badge_animate">
                        <a class="nav-link" href="#"><i class="far fa-envelope envveicon text-white"></i>
                            <span class="number badge badge-success  ">2</span></a>
                    </li>
                    <li class="nav-item badge_animate">
                        <a class="nav-link" href="#"><i class="fas fa-bars bar text-white envveicon"></i>
                            <span class="number badge badge-success  ">2</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="http://vue-dark.vueadmintemplate.com/src/assets/img/authors/avatar1.jpg " alt=""
                                class="rounded-circle mr-1" style="width: 25px; "> Addision
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>    </div>
</template>

<script>
export default {
  name: "mainApp",
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

