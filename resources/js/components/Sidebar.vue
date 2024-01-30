<template>
  <nav id="sidebar" class="bg-light">
    <br>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a exact-active-class="active" href="/" class="nav-link">
          <i class="bi bi-house" />
          <span class="ps-2">{{ $t('messages.home') }}</span>
        </a>
      </li>
      <li class="nav-item">
        <router-link exact-active-class="active" to="/vue-playgrounds" class="nav-link">
          <i class="bi bi-balloon" />
          <span class="ps-2">{{ $t('messages.other_route') }}</span>
        </router-link>
      </li>
      <!-- <li class="nav-item" v-if="$auth.check('admin')"> -->
      <li class="nav-item">
        <a exact-active-class="active" href="/users" class="nav-link">
          <i class="bi bi-person" />
          <span class="ps-2">{{ $t('messages.users') }}</span>
        </a>
      </li>
    </ul>
  </nav>
</template>

<script setup>

</script>

<style lang="scss">
.nav-item {
  color: red;
}
</style>
