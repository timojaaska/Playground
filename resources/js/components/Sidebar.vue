<template>
  <nav id="sidebar" class="bg-light">
    <br>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a exact-active-class="active" to="/" class="nav-link">
          <i class="bi bi-house"></i>
          <span class="ps-2">{{ $t('common.home') }}</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <router-link exact-active-class="active" to="/other-route" class="nav-link">
          <i class="bi bi-house"></i>
          <span class="ps-2">{{ $t('common.other_route') }}</span>
        </router-link>
      </li> -->
      <!-- <li class="nav-item" v-if="$auth.check('admin')"> -->
      <li class="nav-item">
        <a exact-active-class="active" to="/users" class="nav-link">
          <i class="bi bi-person"></i>
          <span class="ps-2">{{ $t('common.users') }}</span>
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
