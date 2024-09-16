<script setup>
defineProps({
    user: {
        type: Object
    }
})
</script>
<template>
    <span class="text-sm text-gray-500">
        <a href="#" class="hover:underline">{{ user.full_name }}</a>
    </span>
</template>
