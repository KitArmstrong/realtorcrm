<template>
  <el-select placeholder="Select" name="hometype" v-model="hometype" @input="updateHomeType">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_homeTypeOptions.js';

  export default {
    name: 'hometype-dropdown',

    data () {
      return {
        options: options.options,
        hometype: '',
      }
    },

    props: ['value'],

    methods: {
      updateHomeType() {
        this.$emit('input', this.hometype);  
      }
    }
  }
</script>