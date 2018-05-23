<template>
    <div class="card">
        <div class="card-header">Emploees grid view</div>
        
        <div class="card-body">
            <div  class="card-columns">
                <div id="card" v-cloak>
                    @{{ message }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
