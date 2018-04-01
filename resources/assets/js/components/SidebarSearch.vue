<template>
	<div class="search-container">
		<div class="search-title">Find</div>
		<label for="contactname">Name</label>
		<el-input type="text" v-model="contactname" name="contactname"></el-input>
		<label for="contactphone">Phone</label>
		<el-input type="text" v-model="contactphone" name="contactphone"></el-input>
		<el-button class="btn">Search</el-button>
	</div>
</template>

<script>
export default {
	data() {
		return {
			contactname: '',
			contactphone: ''
		}
	}
}

</script>