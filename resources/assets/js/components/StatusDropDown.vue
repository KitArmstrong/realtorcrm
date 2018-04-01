<template>
  <el-select placeholder="Select" name="status" v-model="status" @input="updateStatus">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_statusOptions.js';

  export default {
    name: 'status-dropdown',

    data () {
      return {
        options: options.options,
        status: status,
      }
    },

    props: ['value'],

    methods: {
      updateStatus() {
        this.$emit('input', this.status);  
      }
    }
  }
</script>