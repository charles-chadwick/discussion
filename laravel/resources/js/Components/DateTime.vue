<script setup>
defineProps({
    datetime: String
})
</script>

<template>
        <time :title="new Date(datetime.toString()).toDateString()"
              :datetime="datetime">{{ new Date(datetime.toString()).toDateString() }}
        </time>
</template>
