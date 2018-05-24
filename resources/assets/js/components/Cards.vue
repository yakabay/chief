<template>
    <div class="card">
        <div class="card-header">Emploees grid view</div>
        
        <div class="card-body">
            <div  class="card-columns">
                <div id="card" v-cloak>
                    {{ message }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: "Finaly!!! I have started to use Components!!!"
            }
        }
    }
</script>
