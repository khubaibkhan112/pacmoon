<template>
  <div v-if="show" class="modal fade show d-block" id="questsModel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2"> Post a Tweet</h3>
          </div>
          <form @submit.prevent="save" id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
            onsubmit="return false" novalidate="novalidate">            
            <div class="col-12 fv-plugins-icon-container">
              <div class="form-group">
                <div class="w-100">
                  <textarea placeholder="What is Happening?!" type="text" class="form-control" rows="5" name="content" tabindex="1"
                    v-model="form.content"></textarea>
                </div>
              </div>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
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
const form = ref({  
  content: "",
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
  }).then(response => {
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

defineExpose({
  loadquestData
});

const emit = defineEmits(['close', 'questsList'])
</script>
