<template>
  <div v-if="show" class="modal fade show d-block" id="PointsModel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2"> Points Information</h3>
          </div>
          <form @submit.prevent="save" id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
            onsubmit="return false" novalidate="novalidate">
            <div class="col-12 fv-plugins-icon-container">
              <div class="form-group">
                <label class="mb-0">Points:</label>
                <div class="w-100">
                  <input type="number" class="form-control" name="points" tabindex="1" v-model="form.points">
                </div>
              </div>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
            <div class="col-12 fv-plugins-icon-container">
              <div class="form-group">
                <label class="mb-0">Description:</label>
                <div class="w-100">
                  <textarea type="text" class="form-control" rows="5" name="note" tabindex="1"
                    v-model="form.note"></textarea>
                </div>
              </div>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">{{ isEditMode ? 'Update' : 'Submit' }}</button>
              <button type="reset" class="btn btn-label-secondary waves-effect" @click="close" aria-label="Close">
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
<script setup>
import { ref } from 'vue';
const form = ref({
  points: "",
  note: "",
});
const isEditMode = ref(false);
const pointId = ref();
const props = defineProps({
  show: {
    type: Boolean,
    default: false
  }
})

const loadPointData = (id = null) => {
  if (id != null) {
    isEditMode.value = true;
    pointId.value = id,
      getDataForEdit();
  }
}
async function save() { 
  let url = '';
  let method = '';
  if (isEditMode.value) {
    url = `/points/${pointId.value}`
    method = 'PUT'
  } else {
    url = '/points'
    method = 'POST'
  }
  axios({
    url: url,
    method: method,
    data: form.value,
  }).then(response => {
    emit('pointsList');
    close();
  }).catch(error => {
    this.errorToast(error.response.statusText)
    close();
  });
}
async function getDataForEdit() {
  axios({
    url: `/points/${pointId.value}/edit`,
    method: 'GET',
  })
    .then(response => {
      form.value.points = response.data.points
      form.value.note = response.data.note
    })
    .catch(error => {
      this.errorToast(error.response.error)
    })
}

function close() {
  isEditMode.value = false;
  resetValue();
  emit('close');
}

function resetValue() {
  form.value.points = ''
  form.value.note = ''
}

defineExpose({
  loadPointData
});

const emit = defineEmits(['close', 'pointsList'])
</script>
