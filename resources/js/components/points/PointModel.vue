<template>
  <div class="modal fade show d-block" id="PointsModel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
            @click="$emit('close-modal')"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2"> Points Information</h3>
          </div>
          <form @submit.prevent="save" id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
            onsubmit="return false" novalidate="novalidate">
            <div class="col-12 fv-plugins-icon-container">
              <div class="form-group">
                <label class="mb-0">Points:</label>
                <div class="w-100">
                  <input type="number" class="form-control" name="points" tabindex="1" v-model="points.points">
                </div>
              </div>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
            <div class="col-12 fv-plugins-icon-container">
              <div class="form-group">
                <label class="mb-0">Description:</label>
                <div class="w-100">
                  <textarea type="text" class="form-control" rows="5" name="note" tabindex="1"
                    v-model="points.note"></textarea>
                </div>
              </div>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
              <button type="reset" class="btn btn-label-secondary waves-effect" @click="$emit('close-modal')"
                aria-label="Close">
                Cancel
              </button>
            </div>
            <input type="hidden">
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'pointModel',
  props: ['modal_type', 'obj_id'],
  data() {
    return {
      points: {
        points: '',
        note: '',
      },
      crud_loading: false,
    }
  },
  methods: {
    save() {
      this.crud_loading = true;
      let url = '';
      let method = '';

      if (this.modal_type === 'add') {
        console.log('here', this.modal_type)
        url = '/points'
        method = 'POST'
      }
      if (this.modal_type === 'edit') {
        url = `/points/${this.obj_id}`
        method = 'PUT'
      }
      axios({
        url: url,
        method: method,
        data: this.points,
      })
        .then(response => {
          this.crud_loading = false
          this.successToast(response.data.message)
          this.$emit('close-model')
          // window.location.reload();
        })
        .catch(error => {
          this.errorToast(error.response.statusText)
        });
    },
  }
}
</script>