<template>
    <el-col :sm="12" :lg="6" class="contact-item" @click.native="openContact(contact.id)">
        <p class="contact-name">{{fullName}}</p>
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
                default: {}
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