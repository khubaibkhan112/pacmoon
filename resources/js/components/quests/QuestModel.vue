<template>
  <div v-if="show" class="modal fade show d-block" id="questsModel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2"> Add Quest</h3>
          </div>
          <form @submit.prevent="save" id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
            onsubmit="return false" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label" for="type">Type</label>
                  <select class="form-control" name="type" v-model="form.type">
                    <option value="tweet" selected>Post A Tweet</option>
                    <option value="follow">Follow Account</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row" v-if="form.type == 'tweet'">
              <div class="col-12 fv-plugins-icon-container">
                <div class="form-group">
                  <div class="w-100">
                    <textarea placeholder="What is Happening?!" type="text" class="form-control" rows="5" name="content" tabindex="1"
                      v-model="form.content"></textarea>
                  </div>
                </div>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
              <div class="col-12 fv-plugins-icon-container my-2">
                <div class="form-group">
                  <div class="w-100">
                    <input type="file" name="media[]" accept="image/*,video/*" multiple class="form-control" v-on:change="handleFileChange">
                  </div>
                </div>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-12 fv-plugins-icon-container">
                <div class="form-group">
                  <div class="w-100">
                    <label class="form-label" for="user_name">User Name</label>
                    <input type="text" placeholder="Enter User Name" class="form-control" name="user_name" tabindex="1" v-model="form.user_name">
                  </div>
                </div>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
              <div class="col-12 fv-plugins-icon-container">
                <div class="form-group">
                  <div class="w-100">
                    <label class="form-label" for="account_url">Account URL</label>
                    <input type="text" placeholder="Account URL" class="form-control" name="account_url" tabindex="1" v-model="form.account_url">
                  </div>
                </div>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
            </div>
            <div class="col-12 text-end">
              <button type="submit" class="btn btn-primary waves-effect waves-light">{{ isEditMode ? 'Update' : 'Post' }}</button>
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
import Swal from 'sweetalert2';
const form = ref({
  type: "tweet",
  content: "",
  user_name: "",
  account_url: "",
  media:[]
});
const isEditMode = ref(false);
const questId = ref();
const props = defineProps({
  show: {
    type: Boolean,
    default: false
  }
})

const loadquestData = (id = null) => {
  if (id != null) {
    isEditMode.value = true;
    questId.value = id,
      getDataForEdit();
  }
}
async function save() {
  let url = '';
  let method = '';
  if (isEditMode.value) {
    url = `/quests/${questId.value}`
    method = 'PUT'
  } else {
    url = '/quests'
    method = 'POST'
  }
  axios({
    url: url,
    method: method,
    data: form.value,
    headers: {
    'Content-Type': 'multipart/form-data' // Set Content-Type header
    }, 
  }).then(response => {
    const message = response.data.message;
    Swal.fire({
        icon: 'success',
        title: message,
        showConfirmButton: true
    });
    emit('questsList');
    close();
  }).catch(error => {
    this.errorToast(error.response.statusText)
    close();
  });
}
async function getDataForEdit() {
  axios({
    url: `/quests/${questId.value}/edit`,
    method: 'GET',
  })
    .then(response => {
      form.value.content = response.data.content
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
  form.value.content = ''
}

function handleFileChange(event) {
  // Reset the array to ensure previous selections are cleared
  form.value.media = [];
  const files = event.target.files;
  console.log(files);
  if (files) {
    for (let i = 0; i < files.length; i++) {
      // Check if file is not empty and push it into the media array
      if (files[i].size > 0) {
        form.value.media.push(files[i]);
      }
    }
  }
}

defineExpose({
  loadquestData
});

const emit = defineEmits(['close', 'questsList'])
</script>
