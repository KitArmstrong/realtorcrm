<template>
    <el-row class="contact-row" >
        <ContactItem v-for="(contact, index) in contactRowSet" :key="contact.id" :contact="contact"></ContactItem>
    </el-row>
</template>

<script>
    import ContactItem from './ContactItem.vue';

	export default {
    	name: 'ContactListingRow',

    	components: {
            ContactItem,
    	},

        props: {
            contactRowSet: {
                type: Array,
                required: true,
                default: []
            }
        },

    	data() {
    		return {
    		}
    	},
    }
</script>