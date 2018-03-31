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
  import buyerOptions from '../data/_buyerMotivationOptions.js';
  import sellerOptions from '../data/_sellerMotivationOptions.js';

  export default {
    name: 'motivation-dropdown',

    data () {
      return {
        options: [],
        motivation: '',
      }
    },

    props: {
      value: {
          type: String,
          required: true,
          default: ''
      },
      status: {
          type: String,
          required: false,
          default: ''
      },
    },

    watch: {
      status: function (status) {
        switch(status)
        {
          case 'B':
            this.options = buyerOptions.options;
            break;

          case 'S':
            this.options = sellerOptions.options;
            break;

          default:
            this.options = [];
        }
      },
    },

    methods: {
      updateMotivation() {
        this.$emit('input', this.motivation);  
      }
    }
  }
</script>