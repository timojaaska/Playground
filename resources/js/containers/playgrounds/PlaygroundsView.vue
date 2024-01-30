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
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nimi</th>
                <th>Sijainti</th>
                <!-- <th class="text-nowrap">
                  <router-link to="/playgrounds/create" class="btn btn-sm btn-primary">
                    Lisää leikkikenttä
                  </router-link>
                </th> -->
              </tr>
            </thead>
            <tbody>
              <tr v-for="playground in playgrounds" :key="playground.id">
                <td>{{ playground.id }}</td>
                <td>{{ playground.name }}</td>
                <td>{{ playground.location }}</td>
                <td style="width:20px" class="py-1">
                  <button type="button" @click="editPlayground(playground.id)" class="btn btn-sm btn-primary">
                    Muokkaa
                  </button>
                </td>
                <td style="width:20px" class="py-1"> 
                  <!-- deletePlayground(playground.id)  -->
                  <button type="button" @click="openConfirmModal(playground.id)" class="btn btn-sm btn-danger">
                    Poista
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <confirm-modal
      :show="confirmModalVisible"
      title="Vahvista poisto"
      message="Oletko varma, että haluat poistaa {{playground.name}} leikkikentän?"
      accept-button-label="Kyllä"
      cancel-button-label="Peruuta"
      @close="onConfirmClose"
    />
  </div>
</template>
  
  
<script setup>
import { ref, computed } from 'vue'
import playgroundapi from '../../api/playground.js'
import { useStore } from "vuex";
import { useRouter, useRoute, onBeforeRouteUpdate } from 'vue-router'
import ConfirmModal from '../../components/common/ConfirmModal.vue';
  
const store = useStore()
const route = useRoute()
const router = useRouter()
  
const playgrounds = ref([])
const loading = ref(false)


const confirmModalVisible = ref(false);

function openConfirmModal() {
  confirmModalVisible.value = true;
}

function onConfirmClose(status) {
  console.log('onConfirmClose', status);
  if (status){
    deletePlayground()
  }
  confirmModalVisible.value = false;
}

fetchPlaygrounds();
  
onBeforeRouteUpdate((to, from) => {
  // if needed
})
  
async function fetchPlaygrounds() {
  try {
    loading.value = true
    const pg = await playgroundapi.fetchPlaygrounds()
    playgrounds.value = pg
  } catch(err) {
    console.error(err)
    store.dispatch('createErrorToast', err)
  } finally {
    loading.value = false
  }
}

function deletePlayground(playgroundId) {
  router.push({ path: '/vue-playgrounds/delete/' + playgroundId });
}

function editPlayground(playgroundId) {
  router.push({ path: '/vue-playgrounds/' + playgroundId });
}

function onExportClick() {
  store.dispatch('createErrorToast', { header: 'export pdf', body: 'not implemented'})
}
function onPrintClick() {
  store.dispatch('createErrorToast', { header: 'print', body: 'not implemented'})
}

</script>