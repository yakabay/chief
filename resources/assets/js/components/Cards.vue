<template>
    <div  class="card-columns">
        <card 
            v-for="user in users"
            :key="user.id"
            :name="user.name"
            :position="user.position"
            :salary="user.salary"
            :employmentDate="user.employment_date"
        />
    </div>
</template>


<script>

    export default {
        data() {
            return {
                users: []
            }
        },
        created() {
            axios.get('ajax/users?sort=name&order=asc').
                then(response => this.users = response.data.data);
        }
    }

</script>
