<template>
  <div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-3 mb-0 align-items-center">
        <div class="col-3">
          <h4 class="py-3 mb-2"> quests</h4>
        </div>
        <div class="col-9 justify-content-end d-flex">
          <button type="button" class="btn btn-warning theme-button-color module-create-button" data-toggle="modal"
            data-target="#questsModel" @click="openModal()">
            Add Tweet
          </button>
        </div>
      </div>
      <!-- customers List Table -->
      <div class="card">
        <div class="table-responsive">
          <table class=" table border-top">
            <thead>
              <tr>
                <th>#</th>
                <th class="text-nowrap">Tweet ID</th>
                <th class="text-nowrap">Tweet</th>
                <th class="text-nowrap text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(obj, index) in quests" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ obj.twitter_id }}</td>
                <td>{{ obj.content }}</td>
                <td class="text-center">
                    <a class="cursor-quester" data-toggle="modal" data-target="#questsModel" @click="openModal(obj.id)"><i class="ti ti-pencil me-1 text-info"></i></a>
                    <a class="cursor-quester" @click="deleteData(obj.id)"><i class="ti ti-trash me-1 text-danger"></i></a>                   
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <questModel :show="showModal" ref="questFormModal"  @close="close" @quests-list="questsList"/>
</template>
<script setup>
    import questModel from './QuestModel.vue';
    import { ref , onMounted , defineProps } from 'vue';
    const showModal = ref(false);
    const objId = ref('');
    const quests = ref([]);
    const questFormModal = ref(null);
    const props = defineProps({
        quests: {
            type: Array,
            default: () => [],
        },
        number: {
            type : Number,
            default: 0
        }
        });
    onMounted(() => {
        console.log(props.quests);
        quests.value = props.quests;
    });
    const openModal = (objId) => {
        showModal.value = true;
        console.log(objId);
        if(objId){
            questFormModal.value.loadquestData(objId)
        }
    };

    const deleteData = (objId) => {
      const confirmed = confirm("Are you sure you want to delete this quest?");
      if (confirmed) {
        axios({
          url: `/quests/${objId}`,
          method: 'DELETE',
        })
          .then(response => {
            questsList();
          })
          .catch(error => {
            errorToast(error.response.error);
          });        
      }
    };

    async function questsList() {
        axios({
              url: `get/quests`,
              method: 'GET',
            })
            .then(response => {
                quests.value = response.data
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