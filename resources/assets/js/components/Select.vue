<template>
	<div>
		<label for="sort-select">Sort by:</label>
	    <select v-model="selected" @change="getUsers" class="form-control" id="sort-select">
	  		<option v-for="(option, index) in options" :value="option.value">
	    	{{ option.text }}
	 		</option>
		</select>
	</div>
</template>


<script>
export default {
	data() {
		return {
			selected: {sort: 'name', order: 'asc'},
		    options: [
			    { text: 'name (a-z)', 		value: {sort: 'name', order: 'asc'} },
			    { text: 'name (z-a)', 		value: {sort: 'name', order: 'dsc'} },
			    { text: 'position (a-z)', 	value: {sort: 'position', order: 'asc'} },
			    { text: 'position (z-a)', 	value: {sort: 'position', order: 'dsc'} },
			    { text: 'salary (highest)', value: {sort: 'salary', order: 'dsc'} },
			    { text: 'salary (lowest)', 	value: {sort: 'salary', order: 'asc'} },
			    { text: 'date (oldest)', 	value: {sort: 'employment_date', order: 'asc'} },
			    { text: 'date (newest)',	value: {sort: 'employment_date', order: 'dsc'} }
		     ]
		}
	},
	methods: {
		getUsers() {
			this.$store.commit('updateParams', this.selected);
			this.$store.dispatch('getUsers');
		}
	}
}
</script>


<style scoped>
label {
  margin-bottom: 3px;
}
</style>
