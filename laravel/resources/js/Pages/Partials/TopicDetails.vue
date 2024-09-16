<script setup>
defineProps({
    topic: Object
})
</script>
<template>
    <p class="text-lg font-semibold text-gray-900">
        <a :href="`discuss/${topic.id}`">{{ topic.title }}</a>
    </p>
</template>
