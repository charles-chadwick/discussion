<script setup>
defineProps({
    date: String,
    date_diff: String,
});

</script>

<template>
    <time :datetime="date" class="whitespace-nowrap text-xs text-gray-500">
        <slot /> {{ date_diff }}
    </time>
</template>
