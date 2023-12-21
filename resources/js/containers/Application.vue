<template>
  <!-- <div v-if="$auth.ready()"> -->
  <div>
    <!-- <navbar v-if="$auth.check()" /> -->
    <navbar />
    <div class="d-flex">
      <sidebar />
      <main role="main" class="main-content">
        <router-view />
      </main>
    </div>
    <div class="toast-container position-fixed top-0 end-0">
      <toast
        v-for="toast in toasts"
        :key="toast.key"
        :x-key="toast.key"
        :type="toast.type"
        :header-text="toast.header"
        :body-text="toast.body"
        @close="onToastClose"
      />
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useStore } from 'vuex'
import Navbar from "../components/Navbar.vue";
import Sidebar from "../components/Sidebar.vue";
import Toast from "../components/common/Toast.vue";

const store = useStore()
const toasts = computed(() => store.state.toasts)
const onToastClose = () => store.commit('removeToast')
</script>