<template>
  <router-link :to="url">
    <i :class="icon"></i>  <span class="nav-item-text">{{name}}</span>
  </router-link>
</template>

<script>
export default {
  name: 'sidebar-nav-link',
  props: {
    name: {
      type: String,
      default: ''
    },
    url: {
      type: String,
      default: ''
    },
    icon: {
      type: String,
      default: ''
    },
  }
}
</script>