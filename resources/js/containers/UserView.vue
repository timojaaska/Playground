<template>
  <div class="container">
    <nav aria-label="breadcrumb" class="pt-2">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" v-for="(crumb,i) in breadCrumbs" :key="i">
          <router-link :to="crumb.path">
            {{ crumb.name }}
          </router-link>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          {{ $route.params.id ? $route.params.id : $t('messages.create_user') }}
        </li>
      </ol>
    </nav>

    <div class="card" v-if="$route.params.id">
      <div class="card-body">
        <h5>{{ $t('messages.change_password') }}</h5>
        <form
          name="pw-form"
          id="pw-form"
          @submit.prevent="onSubmitPassword"
          novalidate
          autocomplete="off"
        >
          <div class="form-group pb-1">
            <label for="id-pw1">{{ $t('messages.password') }} (*)</label>
            <input
              id="id-pw1"
              type="password"
              class="form-control"
              autocomplete="off"
              novalidate
              :class="{'is-invalid': errors.password}"
              v-model.trim="password"
            >
            <div class="invalid-feedback" v-for="(err, i) in errors.password" :key="i">
              {{ err }}
            </div>
          </div>

          <div class="form-group pb-1">
            <label for="id-pw2">{{ $t('messages.password_again') }} (*)</label>
            <input
              id="id-pw2"
              type="password"
              class="form-control"
              autocomplete="off"
              novalidate
              :class="{'is-invalid': errors.verifyPw}"
              v-model.trim="repeatPassword"
            >
            <div class="invalid-feedback" v-for="(err, i) in errors.verifyPw" :key="i">
              {{ err }}
            </div>
          </div>
          <div v-show="passwordChanged" class="alert alert-success mt-2 mb-1" role="alert">
            {{ $t('messages.password_change_succeeded') }}
          </div>
          <div class="d-flex pt-2">
            <button type="submit" :disabled="loading" class="btn btn-primary ms-auto">
              {{ $t('messages.change_password') }}
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-body">
        <h5>{{ $route.params.id ? $t('messages.edit_user') : $t('messages.create_user') }}</h5>
        <form
          name="user-form"
          id="user-form"
          @submit.prevent="onSubmit"
          novalidate
          autocomplete="off"
        >
          <form-group
            class="pb-1"
            id="id-em"
            name="name-em"
            type="text"
            :label="$t('messages.email_address')"
            :required="true"
            :errors="errors.email"
            v-model.trim="email"
          />

          <form-group
            class="pb-1"
            id="id-name"
            name="name-name"
            type="text"
            :label="$t('messages.name')"
            :required="true"
            :errors="errors.name"
            v-model.trim="name"
          />

          <div class="form-group pb-1">
            <label for="id-rolee">{{ $t('messages.role') }} (*)</label>
            <select class="form-select" id="id-role" v-model="role">
              <option value="admin">
                {{ $t('messages.roles.admin') }}
              </option>
              <option value="user">
                {{ $t('messages.roles.user') }}
              </option>
            </select>
          </div>

          <form-group
            v-if="!$route.params.id"
            class="pb-1"
            id="id-pwd1"
            name="name-password"
            type="password"
            :label="$t('messages.password')"
            :required="true"
            :errors="errors.password"
            v-model.trim="password"
          />

          <form-group
            v-if="!$route.params.id"
            class="pb-1"
            id="id-pwd2"
            name="name-password2"
            type="password"
            autocomplete="new-password"
            :label="$t('messages.password_again')"
            :required="true"
            :errors="errors.verifyPw"
            v-model.trim="repeatPassword"
          />

          <div class="d-flex pt-2">
            <router-link to="/users" class="btn btn-light ms-auto">
              {{ $t('messages.cancel') }}
            </router-link>
            <button type="submit" :disabled="loading" class="btn btn-primary ms-2">
              {{ $t('messages.save') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>


<script>
import userApi from '../api/user'
import FormGroup from '../components/common/FormGroup.vue'

export default {
  components: {
    //loader
    FormGroup
  },
  beforeRouteEnter(to, from, next) {
    next(vm => {
      // access to component instance via `vm`
      if (to.params.id) {
        vm.fetchData(to.params.id);
      }
    });
  },
  beforeRouteUpdate (to, from, next) {
    if (to.params.id) {
      this.fetchData(to.params.id);
    }
    next();
  },
  data() {
    return {
      breadCrumbs:[
        {
          name:"Käyttäjät",
          path:"/users"
        }
      ],
      id: '',
      name: '',
      email: '',
      password: '',
      repeatPassword: '',
      role: 'user',
      loading: false,
      errors: {},
      passwordChanged: false
    };
  },
  methods: {
    async fetchData(userId) {
      const user = await userApi.fetchUser(userId)
      this.id = user.id;
      this.name = user.name;
      this.email = user.email;
      this.role = user.role;
    },
    async onSubmit() {
      this.loading = true;
      this.errors = {};

      const user = {
        name: this.name,
        email: this.email,
        role: this.role,
        password: this.password,
        verifyPw: this.repeatPassword
      }
      if(this.id) user.id = this.id

      try {
        await userApi.saveUser(user)
        this.$router.push('/users');
      } catch (err) {
        console.error(err.response)
        if (err.response.status === 422) {
          this.errors = err.response.data.errors
        }
      }
      this.loading = false;
    },
    async onSubmitPassword() {
      this.passwordChanged = false;
      this.loading = true;
      this.errors = {};

      const data = {
        password: this.password,
        verifyPw: this.repeatPassword
      }
      if(this.id)

        try {
          await userApi.changePassword(this.id, data)
          this.passwordChanged = true;
        } catch (err) {
          console.error(err.response)
          if (err.response.status === 422) {
            this.errors = err.response.data.errors
          }
        }
      this.loading = false;
    },
  }
};
</script>