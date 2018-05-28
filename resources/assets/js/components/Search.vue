<template>
    <input 
        v-model="query.search" 
        @focus="placeholder = 'Enter name, position, salary or employment date'"
        @focusout="placeholder = 'Search...'"
        @keyup.enter="getUsers"
        :placeholder="placeholder"
        class="form-control" 
        type="text" 
    >
</template>


<script>
export default {
    data() {
        return {
            placeholder: 'Search...',
            query: {
                search: ''
            }
        }
    },
    methods: {
        getUsers() {
            this.$store.dispatch('searchUsers', this.query);
        }
    }
}
</script>


<style scoped>
input {
  background-image: url('/img/searchicon.png');
  background-position: 8px 8px;
  background-repeat: no-repeat;
  float: right;
  padding-left: 37px;
  margin-top: 26px;
  width: 130px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input:focus {
  width: 100%;
}
</style>



