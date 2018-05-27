<template>
    <nav class="mt-2">
        <ul class="pagination justify-content-end">
            <li class="page-item" :class="{disabled: !prevPageUrl}" id="prev">
                <a @click.prevent="getPrevUsers" class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item" :class="{disabled: !nextPageUrl}" id="next">
                  <a @click.prevent="getNextUsers" class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</template>


<script>
import { mapActions } from 'vuex'
import { mapState } from 'vuex'

export default {
    computed: {
        ...mapState([
            'prevPageUrl',
            'nextPageUrl'
        ])
    },
    methods: {
        ...mapActions([
            'getPrevUsers',
            'getNextUsers'
        ])
    }
}
</script>


<style scoped>
#next a {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}
</style>



