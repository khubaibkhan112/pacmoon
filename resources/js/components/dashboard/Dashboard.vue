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
            <div class="col-12 mb-4">
                <div class="card">
                <div class="card-header header-elements">
                    <div>
                    <h5 class="card-title mb-0">Statistics</h5>
                    <small class="text-muted">Commercial networks and enterprises</small>
                    </div>
                    <div class="card-header-elements ms-auto py-0">
                    <h5 class="mb-0 me-3">$ 78,000</h5>
                    <span class="badge bg-label-secondary">
                        <i class="ti ti-arrow-up ti-xs text-success"></i>
                        <span class="align-middle">37%</span>
                    </span>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <canvas id="lineChart" class="chartjs" data-height="500"></canvas>
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
</script>