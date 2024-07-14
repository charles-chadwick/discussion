<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import {computed} from "vue";

const props = defineProps({
    topics: {
        type: Array
    },
    preview: {
        type: Boolean

    }
})


</script>

<template>
    <Head title="Discussion"/>
    <AuthenticatedLayout>
        <ul class="">
            <li v-for="topic in topics">
                <h3 class="px-4 m-4 text-lime-800 font-extrabold bg-white rounded-lg p-4 shadow">{{ topic.title }}</h3>
                <ul>
                    <li v-for="(post, post_index) in topic.posts" class="bg-white m-4 rounded-lg p-4 shadow">
                        <div class="font-semibold text-sm text-lime-600">
                            {{ post.created_by.full_name }}
                            {{ post.created_at_diff }}
                        </div>
                        <span v-if="preview" v-html="post.truncated" class="text-gray-700"></span>
                        <span v-else v-html="post.content" class="text-gray-700"></span>

                    </li>
                </ul>
            </li>
        </ul>
    </AuthenticatedLayout>
</template>
