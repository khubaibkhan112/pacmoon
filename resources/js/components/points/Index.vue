<template>
  <div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-3 mb-4 align-items-center">
        <div class="col-3">
          <h4 class="py-3 mb-2"> Points</h4>
        </div>
        <div class="col-9 justify-content-end d-flex">
          <button type="button" class="btn btn-warning theme-button-color module-create-button" data-toggle="modal"
            data-target="#PointsModel" @click="openModal()">
            Add Points
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
                <th class="text-nowrap">points</th>
                <th>Description</th>
                <th class="text-nowrap">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(obj, index) in points" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ obj.points }}</td>
                <td>{{ obj.note }}</td>
                <td class="text-nowrap align-middle text-center">
                  <div class="dropdown">
                      <a class="dropdown-item" @click="openModal(obj.id)"><i class="ti ti-pencil me-1"></i> Edit</a>
                      <a class="dropdown-item" ><i class="ti ti-trash me-1"></i> Delete</a>
                  </div>
                </td>
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

    async function pointsList() {
        console.log("In");
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
    // async function pointsList() {
    //         axios({
    //             url: `/points`,
    //             method: 'GET',
    //         })
    //         .then(response => {
    //             this.loading = false
    //             this.points = response.data
    //         })
    //         .catch(error => {
    //             this.errorToast(error.response.error)
    //         })

    // }
    // pointsList();

</script>
<!-- <script>
import PointModel from './PointModel.vue';

export default {
  name: 'pointsIndex',
  props: ['points'],
  components: {
    PointModel,
  },
  data() {
    return {
      is_form_model: false,
      modalType: '',
      objId: '',
    }
  },
  computed: {
  },
  created() {
  },
  methods: {

    // save employee
    async saveEmployee() {
      await this.form
        .post(window.location.origin + "/api/employees")
        .then(() => {
          toast.fire({
            type: "success",
            title: this.$t("employees.list.create.success_msg"),
          });
          this.$router.push({ name: "employees.index" });
        })
        .catch(() => {
          toast.fire({ type: "error", title: this.$t("common.error_msg") });
        });
    },
    openModal(modalType, objId) {
      this.modalType = modalType
      this.objId = objId
      this.is_form_model = true;
    },
    closeModel() {
      this.is_form_model = false;
    }
  },
  mounted() {
    console.log(this.points);
  },

};
</script> -->
