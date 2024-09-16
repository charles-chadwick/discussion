<script setup>
import {ref} from 'vue';
import Pagination from "../Components/Pagination.vue";
import DateTime from "../Components/DateTime.vue";
import UserDetails from "../Components/UserDetails.vue";
import PostDetails from "./Partials/PostDetails.vue";
import TopicDetails from "./Partials/TopicDetails.vue";

defineProps({
    topics: {
        type: Object
    }
})


</script>

<template>
    <Pagination :links="topics.links"/>
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex items-center justify-between gap-x-6 py-5" v-for="topic in topics.data" :key="topic.id">
            <div class="min-w-0">
                <div class="flex items-start gap-x-3 leading-6">
                    <TopicDetails :topic="topic" />
<!--                    <p class="mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Complete</p>-->
                </div>
                <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                    <PostDetails :created_at="topic.created_at" :user="topic.created_by" />
                </div>
            </div>
        </li>

    </ul>

    <Pagination :links="topics.links"/>
</template>
