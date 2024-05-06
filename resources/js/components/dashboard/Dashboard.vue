<template>
  <div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-3 mb-0 align-items-center">
        <div class="col-3">
          <h4 class="py-3 mb-2"> Dashboard</h4>
        </div>
        <div class="col-9 justify-content-end d-flex">
          <!-- <button type="button" class="btn btn-warning theme-button-color module-create-button" data-toggle="modal"
            data-target="#PointsModel" @click="openModal()">
            Add Points
          </button> -->
        </div>
      </div>
      <!-- customers List Table -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-truck ti-md"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ users_count }}</h4>
                    </div>
                    <p class="mb-1">Total Users</p>                    
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-warning"
                        ><i class="ti ti-alert-triangle ti-md"></i
                        ></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ quests }}</h4>
                    </div>
                    <p class="mb-1">Total Quests</p>                    
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-danger"
                        ><i class="ti ti-git-fork ti-md"></i
                        ></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ tweetts_like_count }}</h4>
                    </div>
                    <p class="mb-1">Likes Count</p>                   
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-info"><i class="ti ti-clock ti-md"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ mentions_count }}</h4>
                    </div>
                    <p class="mb-1">Mentioned Counts</p>                    
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Weekly Reports -->
            <div class="col-lg-6 mb-4">
                  <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                      <div class="card-title mb-0">
                        <h5 class="mb-0">Weekly Reports</h5>
                        <small class="text-muted">Weekly  Overview</small>
                      </div>
                      <!-- <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="earningReportsId"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div> -->
                      <!-- </div> -->
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div id="weeklyEarningReports"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Weekly Reports -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="card-title m-0 me-2">LeaderBoard</h5>
                      <!-- <div class="dropdown">
                        <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div> -->
                    </div>
                    <div class="table-responsive">
                      <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                          <tr>
                            <th>Postion</th>
                            <th>Username</th>
                            <th>Points</th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr v-for="(obj, index) in leaderboard" :key="index">
                            <td>{{ getOrdinal(index + 1) }}</td>
                            <td>
                              <div class="d-flex justify-content-start align-items-center">
                                <div class="me-1">
                                  <img :src="obj.profile_img" class="rounded-circle me-1" alt="Visa" height="30"></br>
                                </div>
                                <div class="d-flex flex-column">
                                  <p class="mb-0 fw-medium">{{ obj.name }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="mb-0 fw-medium">{{ obj.points_sum_user_points ?? 0 }}</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

        </div>
    </div>
  </div>  
</template>
<script setup>
    import { ref , onMounted , defineProps } from 'vue';
    const showModal = ref(false);
    const objId = ref('');
    const points = ref([]);
    const pointFormModal = ref(null);
    const props = defineProps({
        users_count: {  
            type : Number,          
            default: () => 0,
        },
        quests: {  
            type : Number,          
            default: () => 0,
        },
        tweetts_like_count: {  
            type : Number,          
            default: () => 0,
        },
        mentions_count: {
            type : Number,
            default: 0
        },
        leaderboard: {
            type: Array,
            default: () => [],
        }
        });
    onMounted(() => {
        points.value = props.points;
    });
    const openModal = (objId) => {
        showModal.value = true;
        console.log(objId);
        if(objId){
            pointFormModal.value.loadPointData(objId)
        }
    };

    const deleteData = (objId) => {
      const confirmed = confirm("Are you sure you want to delete this point?");
      if (confirmed) {
        axios({
          url: `/points/${objId}`,
          method: 'DELETE',
        })
          .then(response => {
            pointsList();
          })
          .catch(error => {
            errorToast(error.response.error);
          });        
      }
    };

    async function pointsList() {
        axios({
              url: `get/points`,
              method: 'GET',
            })
            .then(response => {
                points.value = response.data
            })
            .catch(error => {
                this.errorToast(error.response.error)
        })
    };

    function close(){
        if(showModal.value==true)
        {
            showModal.value = false

        }
    }   
    function  getOrdinal(number) {
        const suffixes = ["st", "nd", "rd"];
        const remainderTen = number % 10;
        const remainderHundred = number % 100;

        if (remainderTen <= 3 && remainderHundred !== 11 && remainderHundred !== 12 && remainderHundred !== 13) {
            return number + suffixes[remainderTen - 1];
        } else {
            return number + "th";
        }
    }
</script>