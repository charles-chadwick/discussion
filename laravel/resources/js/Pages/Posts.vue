<script setup>
import {ref} from 'vue';
import Pagination from "../Components/Pagination.vue";
import DateTime from "../Components/DateTime.vue";
import UserDetails from "../Components/UserDetails.vue";
import PostDetails from "./Partials/PostDetails.vue";

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
    <div class="bg-white px-4 py-5 sm:px-6">
        <div class="flex space-x-3">

            <div class="flex-shrink-0">
                <PostDetails :post_count="topic.post_count" :title="topic.title" :id="topic.id" />
            </div>

            <div class="w-full">
                <DateTime class="text-right" :datetime="topic.created_at" />
                <UserDetails :user="topic.created_by" />
            </div>
        </div>
    </div>
    <div v-for="post in posts" :key="post.id">
        <div class="mx-auto max-w-full py-2 sm:px-2 lg:px-4">
            <div class="mx-auto max-w-none">
                <div class="overflow-hidden bg-white sm:rounded-lg shadow shadow-gray-300">

                    <div class="px-4 pb-5 text-gray-400 sm:p-6 sm:pt-0">
                        <p>{{ post.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
