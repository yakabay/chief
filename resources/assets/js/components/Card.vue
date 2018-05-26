<template>
    <div class="card text-white bg-info mb-3" v-cloak>
        <div class="card-header p-2 pl-3">{{ position }}</div> 
        <div class="card-body p-2 pl-3">
            <h5 class="card-subtitle my-1">{{ name }}</h5>
            <p class="card-text">salary: ${{ salary }}<br>from {{ employmentDate }}</p>
        </div>
    </div>
</template>


<script>

export default {
    props: [
        'position',
        'name',
        'salary',
        'employmentDate'
    ]
}

</script>


<style scoped>

.card {
    max-width: 18rem;
}

</style>
