<script setup>
defineProps({
    title: {
        type: String
    },
    post_count: {
        type: Number
    },
    id: {
        type: Number
    }
})
</script>

<template>
<p class="text-sm font-semibold text-gray-900">
    <a :href="`discuss/${ id }`" class="hover:underline">{{ title }}</a>
</p>
<p class="text-sm font-normal text-gray-400">
    {{ post_count }} Posts
</p>
</template>
