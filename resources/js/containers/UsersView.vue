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
                    Add user
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


<script>
import userapi from '../api/user.js'
import { mapGetters, mapActions } from "vuex";

export default {
  beforeRouteEnter(to, from, next) {
    next(vm => {
      // access to component instance via `vm`
      vm.fetchUsers();
    });
  },
  data() {
    return {
      users: [],
      loading: false
    };
  },
  methods: {
    ...mapActions(['createErrorToast', 'createSuccessToast']),
    async fetchUsers() {
      try {
        this.loading = true
        const users = await userapi.fetchUsers()
        this.users = users
      } catch(err) {
        console.error(err)
        this.createErrorToast(err)
      } finally {
        this.loading = false
      }
    },
    editUser(userId){
      this.$router.push({ path:'/users/'+userId});
    },
    onExportClick() {
      this.createErrorToast({ header: 'export pdf', body: 'not implemented'})
    },
    onPrintClick() {
      this.createSuccessToast({ header: 'print', body: 'not implemented'})
    }
  }
};
</script>