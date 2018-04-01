<template>
  <el-select placeholder="Select" name="features" multiple v-model="features" @input="updateFeatures">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_featureOptions.js';

  export default {
    name: 'features-dropdown',

    data () {
      return {
        options: options.options,
        features: [],
      }
    },

    props: ['value'],

    methods: {
      updateFeatures() {
        this.$emit('input', this.features);  
      }
    }
  }
</script>