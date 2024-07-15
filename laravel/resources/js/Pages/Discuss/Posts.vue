<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import Heading from "@/Pages/Discuss/Partials/Heading.vue";
import UserDetails from "@/Pages/Discuss/Partials/UserDetails.vue";
import DropdownLink from "@/Components/Breeze/DropdownLink.vue";
import Dropdown from "@/Components/Breeze/Dropdown.vue";
import {EllipsisVerticalIcon} from '@heroicons/vue/20/solid'

const props = defineProps({
    topics: {
        type: Array
    },
    preview: {
        type: Boolean
    },
    confirmingUserDeletion: {
        type: Boolean,
        value: false
    }
})

const addPost = () => {

}

</script>

<template>
    <Head title="Discussion"/>
    <AuthenticatedLayout>
        <ul>
            <li v-for="topic in topics" :key="topic.id">
                <Heading :topic="topic">

                </Heading>
                <ul>
                    <li v-for="(post) in topic.posts" :key="post.id" class="bg-white m-4 rounded-lg p-4 shadow">
                        <UserDetails :user="post.created_by"/>
                        <span v-if="preview" v-html="post.truncated" class="text-gray-700"></span>
                        <span v-else v-html="post.content" class="text-gray-700"></span>
                    </li>
                </ul>
            </li>
        </ul>
    </AuthenticatedLayout>
</template>
