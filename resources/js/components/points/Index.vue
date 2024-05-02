<template>
  <div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-3 mb-0 align-items-center">
        <div class="col-3">
          <h4 class="py-3 mb-2"> Points</h4>
        </div>
        <div class="col-9 justify-content-end d-flex">
          <!-- <button type="button" class="btn btn-warning theme-button-color module-create-button" data-toggle="modal"
            data-target="#PointsModel" @click="openModal()">
            Add Points
          </button> -->
        </div>
      </div>
      <!-- customers List Table -->
      <div class="card">
        <div class="table-responsive">
          <table class=" table border-top">
            <thead>
              <tr>
                <th>#</th>
                <th class="text-nowrap">points</th>
                <th>Description</th>
                <!-- <th class="text-nowrap text-center">Action</th> -->
              </tr>
            </thead>
            <tbody>
              <tr v-for="(obj, index) in points" :key="index">
                <td>{{ index + 1 }}</td>
                <!-- <td data-toggle="modal" data-target="#PointsModel" @click="openModal(obj.id)" class="cursor-pointer text-primary">{{ obj.points }}</td> -->
               <td class="cursor-pointer text-primary" @blur="update($event, obj.id)" 
    contenteditable="true">{{ obj.points }}</td>

                <td>{{ obj.note }}</td>
                <!-- <td class="text-center">
                    <a class="cursor-pointer" data-toggle="modal" data-target="#PointsModel" @click="openModal(obj.id)"><i class="ti ti-pencil me-1 text-info"></i></a>
                    <a class="cursor-pointer" @click="deleteData(obj.id)"><i class="ti ti-trash me-1 text-danger"></i></a>                   
                </td> -->
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <pointModel :show="showModal" ref="pointFormModal"  @close="close" @points-list="pointsList"/>
</template>
<script setup>
    import PointModel from './PointModel.vue';
    import { ref , onMounted , defineProps } from 'vue';
    const showModal = ref(false);
    const objId = ref('');
    const points = ref([]);
    const pointFormModal = ref(null);
    const props = defineProps({
        points: {
            type: Array,
            default: () => [],
        },
        number: {
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

  async function update(event, id) {
    const editedValue = event.target.innerText.trim(); // Get the edited value from the table cell
    let url = `/points/${id}`;
    let method = 'PUT';
    try {
        await axios({
            url: url,
            method: method,
            data: { points: editedValue } // Assuming your API expects the points value in the data object
        });
        // Optionally, you can handle success here, such as showing a success message
    } catch (error) {
        // Handle error
        this.errorToast(error.response.statusText);
    }
}



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