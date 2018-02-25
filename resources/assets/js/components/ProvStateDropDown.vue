<template>
  <el-select placeholder="Select" name="prov" filterable v-model="prov" @input="updateProv">
    <el-option
      v-for="option in options"
      :key="option.value"
      :label="option.text"
      :value="option.value">
    </el-option>
  </el-select>
</template>

<script>
  import provinceOptions from '../data/_provinces.js';
  import stateOptions from '../data/_states.js';

  export default {
    name: 'provstate-dropdown',

    data () {
      return {
        options: [],
        prov: '',
      }
    },

    props: {
      value: {
          type: String,
          required: true,
          default: ''
      },
      country: {
          type: String,
          required: false,
          default: ''
      }
    },

    watch: {
      country: function (country) {
        switch(country)
        {
          case 'US':
            this.options = stateOptions.options;
            break;

          case 'CA':
            this.options = provinceOptions.options;
            break;

          default:
            this.options = [];
        }
      },
    },

    methods: {
      updateProv() {
        this.$emit('input', this.prov);  
      }
    }
  }
</script>