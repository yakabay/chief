<template>
    <div class="card card-user text-white bg-info mb-3" v-cloak>
        <div class="card-header p-2 pl-3">{{ position }}</div> 
        <div class="card-body p-2 pl-3">
            <h5 class="card-subtitle my-1">{{ name }}</h5>
            <p class="card-text">salary: ${{ salary }}<br>from {{ employment_date }}</p>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                position: "CEO",
                name: "Abraham Linkoln",
                salary: "100000",
                employment_date: "01-06-2018",
            }
        }
    }
</script>


<style scoped>
    .card-user {
        max-width: 18rem;
    }
</style>
