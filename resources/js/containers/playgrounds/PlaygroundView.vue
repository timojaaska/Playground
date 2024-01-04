<template>
  <div class="container">
    <div class="d-flex align-items-start pt-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            {{ $t('users.users') }}
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
        <!--  -->
      </div>
    </div>
  </div>
</template>
  
  
<script setup>
import { ref, computed } from 'vue'
import { useStore } from "vuex";
import { useRouter, useRoute, onBeforeRouteUpdate } from 'vue-router'
  
const store = useStore()
const route = useRoute()
const router = useRouter()
  
const data = ref([])
const loading = ref(false)
  
fetchData();
  
onBeforeRouteUpdate((to, from) => {
  // if needed
})
  
async function fetchData() {
//   try {
//     loading.value = true
//     const usrs = await userapi.fetchData()
//     users.value = usrs
//   } catch(err) {
//     console.error(err)
//     store.dispatch('createErrorToast', err)
//   } finally {
//     loading.value = false
//   }
}

</script>