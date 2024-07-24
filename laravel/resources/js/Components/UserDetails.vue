<script setup>
defineProps({
    user: {
        type: Object
    }
})
</script>
<template>
    <p class="text-sm text-gray-500 text-right">
        <a href="#" class="hover:underline">{{ user.full_name }}</a>
    </p>
</template>
