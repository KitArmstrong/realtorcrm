<template>
  <el-select placeholder="Select" name="country" filterable v-model="country" @input="updateCountry">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_countries.js';

  export default {
    name: 'country-dropdown',

    data () {
      return {
        options: options.options,
        country: '',
      }
    },

    props: ['value'],

    methods: {
      updateCountry() {
        this.$emit('input', this.country);  
      }
    }
  }
</script>