<template>
  <el-select placeholder="Select" name="conmethod" v-model="conmethod" @input="updateMethod">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_bestMethodOptions.js';

  export default {
    name: 'bestmethod-dropdown',

    data () {
      return {
        options: options.options,
        conmethod: '',
      }
    },

    props: ['value'],

    methods: {
      updateMethod() {
        this.$emit('input', this.conmethod);  
      }
    }
  }
</script>