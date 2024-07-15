<script setup>
import {nextTick, ref} from "vue";
import DropdownLink from "@/Components/Breeze/DropdownLink.vue";
import Dropdown from "@/Components/Breeze/Dropdown.vue";
import {EllipsisVerticalIcon} from "@heroicons/vue/20/solid/index.js";
import Modal from "@/Components/Breeze/Modal.vue";
import SecondaryButton from "@/Components/Breeze/SecondaryButton.vue";
import DangerButton from "@/Components/Breeze/DangerButton.vue";
import {useForm} from '@inertiajs/vue3';

const confirmingThreadDeletion = ref(false);
const props = defineProps({
    topic: {},
})
const form = useForm({
    password: '',
});
const confirmThreadDeletion = () => {
    confirmingThreadDeletion.value = true;
};

const deleteThread = () => {
    form.delete(route('topic.destroy', props.topic), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        // onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingThreadDeletion.value = false;

    form.reset();
};
</script>

<template>
    <div class="grid grid-cols-2 xl:grid-cols-3 gap-4 p-4 m-4 text-lime-800 font-extrabold bg-white rounded-lg shadow">
        <a class="w-full col-span-1" :href="`/discuss/${topic.id}/posts`">
            <h3>{{ topic.title }}</h3>
        </a>
        <div class="w-full text-right">

            <Modal :show="confirmingThreadDeletion" @close="closeModal">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        Are you sure you want to delete this thread?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Once this is deleted, all of its resources and data will be permanently deleted.
                    </p>

                    <div class="mt-6 flex justify-end">
                        <SecondaryButton @click="closeModal"> Cancel</SecondaryButton>

                        <DangerButton
                            class="ms-3"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="deleteThread"
                        >
                            Delete Thread
                        </DangerButton>
                    </div>
                </div>
            </Modal>
            <Dropdown align="right" width="48">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button
                            type="button"
                            class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                        >
                       <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true"/>
                        </button>
                    </span>
                </template>

                <template #content>
<!--                    <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>-->
                    <button @click="confirmThreadDeletion"
                            class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                    >
                        Delete Thread
                    </button>

                </template>
            </Dropdown>
        </div>
    </div>
</template>
