<template>
  <el-select placeholder="Select" name="homeage" v-model="homeage" @input="updateAge">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_homeAgeOptions.js';

  export default {
    name: 'homeage-dropdown',

    data () {
      return {
        options: options.options,
        homeage: '',
      }
    },

    props: ['value'],

    methods: {
      updateAge() {
        this.$emit('input', this.homeage);  
      }
    }
  }
</script>