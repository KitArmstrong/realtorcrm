<template>
    <div>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Min Sale Price</el-col>
            <el-col :span="14" class="value">{{formattedPrice}}</el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        name: 'SellerRequestPanel',

        props: {
            contact: {
                type: Object,
                required: true,
            }
        },

        data() {
            return {

            }
        },

        computed: {
            formattedPrice: function()
            {
                let formatted = '';

                if(this.contact.sell_min_price)
                {
                    let number = parseInt(this.contact.sell_min_price);
                    formatted = '$' + number.toLocaleString();
                }

                return formatted;
            },
        },

        methods: {

        },
    }
</script>