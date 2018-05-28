<template>
    <input class="form-control" type="text" placeholder="Search...">
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



