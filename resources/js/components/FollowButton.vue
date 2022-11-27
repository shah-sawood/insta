<template>
    <div>
        <button class="btn btn-sm btn-primary" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        followUser() {
            alert('inside');
        }
    }
</script>
