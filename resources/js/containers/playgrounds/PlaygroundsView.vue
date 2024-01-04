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
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nimi</th>
                <th>Sähköposti</th>
                <!-- <th>Rooli</th> -->
                <th class="text-nowrap">
                  <router-link to="/users/create" class="btn btn-sm btn-primary">
                    Lisää käyttäjä
                  </router-link>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <!-- <td>{{ $t('users.roles.' + user.role) }}</td> -->
                <td style="width:20px" class="py-1">
                  <button type="button" @click="editUser(user.id)" class="btn btn-sm btn-primary">
                    Muokkaa
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
  
  
<script setup>
import { ref, computed } from 'vue'
// import userapi from '../api/user.js'
import { useStore } from "vuex";
import { useRouter, useRoute, onBeforeRouteUpdate } from 'vue-router'
  
const store = useStore()
const route = useRoute()
const router = useRouter()
  
const users = ref([])
const loading = ref(false)
  
fetchUsers();
  
onBeforeRouteUpdate((to, from) => {
  // if needed
})
  
async function fetchUsers() {
  try {
    loading.value = true
    // const usrs = await userapi.fetchUsers()
    // users.value = usrs
  } catch(err) {
    console.error(err)
    store.dispatch('createErrorToast', err)
  } finally {
    loading.value = false
  }
}
function editUser(userId){
  router.push({ path:'/users/'+userId});
}
function onExportClick() {
  store.dispatch('createErrorToast', { header: 'export pdf', body: 'not implemented'})
}
function onPrintClick() {
  store.dispatch('createErrorToast', { header: 'print', body: 'not implemented'})
}
  
  
</script>