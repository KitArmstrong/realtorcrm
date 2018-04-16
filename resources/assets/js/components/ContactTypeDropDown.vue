<template>
  <el-select placeholder="Select" id="contactTypeFilter" name="contactType" v-model="contactType" @input="updateContactType">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import options from '../data/_contactTypeFilterOptions.js';

  export default {
        name: 'contactype-dropdown',

        data () {
            return {
                options: options.options,
                contactType: '',
            }
        },

        props: ['value'],

        methods: {
            updateContactType() {
                this.$emit('input', this.contactType);  
            }
        }
    }
</script>