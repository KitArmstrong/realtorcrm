<template>
    <div>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Home Type</el-col>
            <el-col :span="14" class="value">{{getDropdownText(contact.buy_home_type, homeTypeOptions)}}</el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Home Age</el-col>
            <el-col :span="14" class="value">{{getDropdownText(contact.buy_home_age, homeAgeOptions)}}</el-col>
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
                    <el-col :md="12" class="value margin-right">{{formattedPrice}}</el-col>
                    <el-col :md="12" class="pre-approved">
                        <span v-if="contact.buy_pre_approved == 'Y'"><i class="fas fa-check"></i> Pre-approved</span>
                    </el-col>
                </el-row>
            </el-col>
        </el-row>
        <el-row type="flex" justify="center" class="view-row">
            <el-col :span="10" class="label">Features</el-col>
            <el-col :span="14" class="value">{{featureList}}</el-col>
        </el-row>
    </div>
</template>

<script>
    import homeTypeOptions from '../data/_homeTypeOptions.js';
    import homeAgeOptions from '../data/_homeAgeOptions.js';
    import featureOptions from '../data/_featureOptions.js';
	
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
                homeAgeOptions: homeAgeOptions.options,
                featureOptions: featureOptions.options,
    		}
    	},

        computed: {
            featureList: function()
            {
                let list = '';

                for(let index in this.contact.features)
                {
                    if(!list)
                    {
                        list = this.getDropdownText(this.contact.features[index].feature, this.featureOptions);
                    }
                    else
                    {
                        list += ', ' + this.getDropdownText(this.contact.features[index].feature, this.featureOptions);
                    }
                }

                return list;
            },

            formattedPrice: function()
            {
                let formatted = '';

                if(this.contact.buy_max_price)
                {
                    let number = parseInt(this.contact.buy_max_price);
                    formatted = '$' + number.toLocaleString();
                }

                return formatted;
            }
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