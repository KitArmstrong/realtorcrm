<template>
    <div>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Home Type</el-col>
            <el-col :span="14" class="value">{{getDropdownText(contact.buy_home_type, homeTypeOptions)}}</el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Home Age</el-col>
            <el-col :span="14" class="value">{{homeAge}}</el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Square Feet</el-col>
            <el-col :span="14" class="value">{{contact.buy_sq_feet}}</el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Bedrooms</el-col>
            <el-col :span="14" class="value">{{contact.buy_bedrooms}}</el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Bathrooms</el-col>
            <el-col :span="14" class="value">{{contact.buy_bathrooms}}</el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Location</el-col>
            <el-col :span="14" class="value">{{contact.buy_location}}</el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Max Price</el-col>
            <el-col :span="14">
                <el-row type="flex" justify="center">
                    <el-col :md="12" class="value margin-right">${{contact.buy_max_price}}</el-col>
                    <el-col :md="12" class="pre-approved">
                        <span v-if="contact.buy_pre_approved == 'Y'"><i class="fas fa-check"></i> Pre-approved</span>
                    </el-col>
                </el-row>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    import homeTypeOptions from '../data/_homeTypeOptions.js';
	
    export default {
    	name: 'BuyerRequestPanel',

        props: {
            contact: {
                type: Object,
                required: true,
            }
        },

    	data() {
    		return {
                homeTypeOptions: homeTypeOptions.options,
    		}
    	},

        computed: {
            homeAge: function() {
                if(this.contact.buy_home_age)
                {
                    if(this.contact.buy_home_age === 1)
                    {
                        return this.contact.buy_home_age + ' year';
                    }
                    else
                    {
                        return this.contact.buy_home_age + ' years';
                    }
                }
                else
                {
                    return 'No age preference';
                }
            },
        },

        methods: {
            getDropdownText: function(code, options) {
                if(!code)
                {
                    return;
                }

                for(let option in options)
                {
                    if(options[option].value === code)
                    {
                        return options[option].text;
                    }
                }
            },

        },
    }
</script>