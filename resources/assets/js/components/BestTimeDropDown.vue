<template>
  <el-select placeholder="Select" name="contime" v-model="contime" @input="updateTime">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_bestTimeOptions.js';

  export default {
    name: 'besttime-dropdown',

    data () {
      return {
        options: options.options,
        contime: '',
      }
    },

    props: ['value'],

    methods: {
      updateTime() {
        this.$emit('input', this.contime);  
      }
    }
  }
</script>