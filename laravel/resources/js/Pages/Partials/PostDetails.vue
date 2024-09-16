<script setup>
import DateTime from "../../Components/DateTime.vue";
import UserDetails from "../../Components/UserDetails.vue";

defineProps({
    created_at: {
        type: String
    },
    user: {
        type: Object
    }
})
</script>

<template>
    <p class="whitespace-nowrap">Posted <DateTime :datetime="created_at" /> by <UserDetails :user="user" /></p>

</template>
