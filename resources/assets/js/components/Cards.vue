<template>
    <div  class="card-columns">
        <card 
            v-for="user in users"
            :key="user.id"
            :name="user.name"
            :position="user.position"
            :salary="user.salary"
            :employmentDate="user.employmentDate"
        />
    </div>
</template>


<script>
import { mapState } from 'vuex'

export default {
    computed: {
        ...mapState([
            'users'
        ])
    },
    created() {
        this.$store.dispatch('sort');
    }
}

</script>
