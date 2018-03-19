<template>
    <el-col :sm="12" :lg="6" class="contact-item" @click.native="openContact(contact.contact_id)">
        <p class="contact-name">{{fullName}}</p>
            <el-tooltip class="item" effect="dark" content="Buyer" placement="top" v-if="contact.buy_request_id">
                <span class="buyer-icon"><i class="fas fa-home"></i></span>
            </el-tooltip>
            <el-tooltip class="item" effect="dark" content="Seller" placement="top" v-if="contact.sell_request_id">
                <span class="seller-icon"><i class="fas fa-dollar-sign"></i></span>
            </el-tooltip> 
        <div class="contact-details">
            <div class="contact-phone">{{contact.mobile_phone}}</div>
            <div class="contact-email"><a :href="mailUrl">{{contact.email}}</a></div>
        </div>
    </el-col>
</template>

<script>
	export default {
    	name: 'ContactItem',

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
            fullName: function() {
                return this.contact.firstname + " " + this.contact.lastname;
            },
            mailUrl: function() {
                return "mailto:" + this.contact.email;
            }
        },

        methods: {
            openContact: function(contactId) {
               this.$router.push({name: 'contacts-view', params: {id: contactId}});
            },
        },
    }
</script>