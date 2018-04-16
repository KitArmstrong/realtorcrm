<template>
    <div class="filter-row">
        
        <label for="contactTypeFilter">Contact Type </label>
        <contactTypeDropDown v-model="filters.contactType" />
    </div>
</template>

<script>
    import ContactTypeDropDown from './ContactTypeDropDown.vue';

    export default {
        name: 'contactListFilters',

    	components: {
    		ContactTypeDropDown
    	},

    	data() {
    		return {
                filters: {
                    contactType: 'A'
                }
    		}
    	},
    }
</script>

<style>

</style>
