<template>
  <el-select placeholder="Select" name="motivation" v-model="motivation" @input="updateMotivation">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_motivationOptions.js';

  export default {
    name: 'motivation-dropdown',

    data () {
      return {
        options: options.options,
        motivation: '',
      }
    },

    props: ['value'],

    methods: {
      updateMotivation() {
        this.$emit('input', this.motivation);  
      }
    }
  }
</script>