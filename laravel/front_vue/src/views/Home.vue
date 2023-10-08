<template>
    <div>
        
        <Sidebar>
            <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row ">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Welcome Back {{user.name }}  🎉</h5>
                          <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> of Your tasks today. 
                          </p>

                          <a href="/tasks" class="btn btn-sm btn-outline-primary">View Tasks</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/backTemplate/assets/img/illustrations/man-with-laptop-light.png"
                            
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
        </Sidebar>
        <!-- <h1> {{ $store.state.user.name }}</h1> -->
            
    </div>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import Sidebar from './includes/Sidebar.vue'
const router = useRouter();
import axios from "axios"
let user = ref('')
onMounted(() => {
   user.value = JSON.parse(localStorage.getItem("user"));

  
  if (!user) {
    router.push({ path: "/" });
    console.log("error no user signed in");
  }
  else{
    router.push({ path: "/home" });
  }

});
</script>