<template>
  <div class="container">
    <div class="d-flex align-items-start pt-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            {{ $t('playgrounds.playgrounds') }}
          </li>
        </ol>
      </nav>
      <button class="btn btn-sm btn-outline-secondary ms-auto" @click="onExportClick">
        Export PDF
      </button>
      <button class="btn btn-sm btn-outline-secondary ms-2" @click="onPrintClick">
        Print
      </button>
    </div>
  
    <div class="card">
      <div class="card-body">
        <h5>{{ $route.params.id ? $t('messages.edit_playground') : $t('messages.create_playground') }}</h5>
        <form @submit.prevent="saveChanges">
          <label for="id">
            <!-- hidden -->
          </label>
          <input v-model="playground.id" type="hidden" id="id" required>
          <div class="form-group pb-1">
            <label for="name">Nimi</label><br>
            <input
              v-model="playground.name"
              type="text"
              id="name"
              :class="{'is-invalid': errors.name}"
              class="form-control"
            >
            <div class="invalid-feedback" v-for="err in errors.name">
              {{ err }}
            </div>
          </div>
          <div class="form-group pb-1">
            <label for="location">Sijainti</label><br>
            <input
              v-model="playground.location"
              type="text"
              id="location"
              :class="{'is-invalid': errors.location}"
              class="form-control"
            >
            <div class="invalid-feedback" v-for="err in errors.location">
              {{ err }}
            </div>
          </div>
          <div class="form-group pb-1">
            <label for="location">Src</label><br>
            <input
              v-model="playground.src"
              type="text"
              id="src"
              :class="{'is-invalid': errors.name}"
              class="form-control"
            >
            <div class="invalid-feedback" v-for="err in errors.src">
              {{ err }}
            </div>
          </div><br>
          <div class="form-group pb-1">
            <h5>Laitteet</h5>
            <div v-for="equipment in playground.equipments" :key="equipment.id">
              <div class="form-group pb-1">
                <label :for="'equipment-' + equipment.id">{{ equipment.name }} </label><br>
                <input :id="'equipment-' + equipment.id" v-model="equipment.pivot.amount" type="number" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Tallenna muutokset</button>
        </form>
      </div>
    </div> 
  </div>
</template>
  

<script setup>
import { ref, computed } from 'vue'
import { useStore } from "vuex";
import { useRouter, useRoute, onBeforeRouteUpdate } from 'vue-router'
import playgroundapi from '../../api/playground.js'
import FormGroup from '../../components/common/FormGroup.vue'

  
const store = useStore()
const route = useRoute()
const router = useRouter()
  
// const data = ref([])
const loading = ref(false)

const playgroundId = ref(route.params.id);
const playground = ref({
  id: '',
  name: '',
  location: '',
  src: '',
});

const errors = ref({});

fetchPlayground()
// fetchData();
  
// onBeforeRouteUpdate(async (to, from) => {
//   // if needed
// })

async function fetchPlayground() {
  try {
    loading.value = true
    const pg = await playgroundapi.fetchPlayground(playgroundId.value)
    playground.value = pg
  } catch(err) {
    console.error(err)
    store.dispatch('createErrorToast', err)
  } finally {
    loading.value = false
  }
}

async function saveChanges() {
  errors.value = {};
  try {
    await playgroundapi.updatePlayground(playgroundId.value, playground.value);
    router.push('/vue-playgrounds');
  } catch (err) {
    console.error(err);
    store.dispatch('createErrorToast', err);
    if (err.response.status === 422) {
      errors.value = err.response.data.errors
      console.log('tämä: ', err.response.data.errors);
    }
  }
}

</script>