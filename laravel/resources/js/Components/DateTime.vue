<script setup>
defineProps({
    datetime: String
})
</script>

<template>
    <p class="text-sm font-semibold text-gray-900">
        <time :title="new Date(datetime.toString()).toDateString()"
              :datetime="datetime">{{ new Date(datetime.toString()).toDateString() }}
        </time>
    </p>
</template>
