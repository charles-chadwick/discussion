<script setup>
import {ref} from 'vue';
import Pagination from "../Components/Pagination.vue";
import PostDetails from "./Partials/PostDetails.vue";
import TopicDetails from "./Partials/TopicDetails.vue";

defineProps({
    topic: {
        type: Object
    },
    posts: {
        type: Object
    }
})


</script>

<template>
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex items-center justify-between gap-x-6 py-2">
            <TopicDetails :topic="topic" />

        </li>
        <li class="flex items-center justify-between gap-x-6 py-2 shadow rounded" v-for="post in posts" :key="post.id">
            <div class="min-w-0">
                <div v-html="post.content" class="p-4"></div>
                <div class="mt-1 flex items-center gap-x-2 leading-5">
                <PostDetails :created_at="post.created_at" :created_at_diff="post.created_at_diff" :user="post.created_by" />
                </div>
            </div>
        </li>

    </ul>

</template>
