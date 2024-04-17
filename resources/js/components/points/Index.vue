<template>
    <div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-2"> Points</h4>

            <!-- customers List Table -->
            <div class="card">
              <div class="card-datatable table-responsive">
                <table class="datatables-customers table border-top">
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
                        <td>{{ obj.notes }}</td>
                        <td>{{ obj.points }}</td>
                        <td class="text-nowrap align-middle text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
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
        </div>
        <pointModel/>
</template>

<script>
import PointModel from './PointModel.vue';

export default {
  name: 'pointIndex',
  components: {
    PointModel,
  },
  data: () => ({
    // form: new Form({
    //   employeeName: "",
    //   department: "",
    //   designation: "",
    //   salary: "",
    //   commission: "",
    //   mobileNumber: "",
    //   gender: "",
    //   birthDate: "",
    //   bloodGroup: "",
    //   religion: "",
    //   appointmentDate: "",
    //   joiningDate: "",
    //   address: "",
    //   status: 1,
    //   image: "",
    //   allowLogin: false,
    //   email: "",
    //   password: "",
    //   role: "",
    // }),
    // options: [],
    // roles: "",
  }),
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
  },
};
</script>
