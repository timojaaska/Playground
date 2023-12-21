<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-start">
    <button
      class="navbar-toggler"
      type="button"
      @click="onMenuToggle"
    >
      <span class="navbar-toggler-icon" />
    </button>
    <a class="navbar-brand me-0" href="#">Codetag</a>
    <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
    <ul class="navbar-nav px-3 ms-auto">
      <li class="nav-item text-nowrap">
        <a class="nav-link" @click="logout">{{ $t('common.sign_out') }}</a>
      </li>
    </ul>
  </nav>
</template>

<script>
import axios from 'axios'

export default {
  components: {
    //loader
  },
  methods: {
    async logout() {
      console.log('logout')
      await axios.post('/logout')
      window.location = '/' // redirect to home
    },
    onMenuToggle(e) {
      e.stopPropagation()
      if (document.body.classList.contains('menu-open')) {
        document.body.classList.remove('menu-open')
      } else {
        document.body.classList.add('menu-open')
      }
    }
  }
}
</script>