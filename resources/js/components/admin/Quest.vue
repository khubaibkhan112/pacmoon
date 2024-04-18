<template>
  <div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="py-3 mb-2"> Points</h4>
      <button type="button" class="btn btn-success border-0 btn-flat" data-toggle="modal" data-target="#PointsModel"
        @click="openFormModal('Add', null)">
        <i class="fa-solid fa-plus pr-2"></i>
        Add Points
      </button>

      <!-- customers List Table -->
      <div class="card">
        <div class="table-responsive">
          <table class="table border-top">
            <thead>
              <tr>
                <th>#</th>
                <th>Description</th>
                <th class="text-nowrap">points</th>
                <th class="text-nowrap">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(obj, index) in points" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ obj.note }}</td>
                <td>{{ obj.points }}</td>
                <td class="text-nowrap align-middle text-center">
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="ti ti-dots-vertical"></i>
                    </button>
                    <div class="dropdown-menu" style="">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- <point-model v-if="is_form_model" :modalType="modal_type" :objId="obj_id" @close-modal="closeModel">
    </point-model> -->
  </div>
</template>

<script>
// import PointModel from './PointModel.vue';

export default {
  name: 'questIndex',
  props: ['points'],
  components: {
    PointModel,
  },
  data() {
    return {
      is_form_model: false,
      modal_type: '',
      obj_id: '',
    }
  },
  computed: {
  },
  created() {
  },
  methods: {
    openFormModal(modalType, id) {
      this.modal_type = modalType
      this.obj_id = id
      this.is_form_model = true
    },
    closeModel() {
      this.is_form_model = false;
      $(".modal-backdrop").remove();
      $("body").removeClass('modal-open');
    },
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
  },
};
</script>
