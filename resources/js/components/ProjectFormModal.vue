<template>
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <form>
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900">Project</h2>
                                    <p class="mt-1 text-sm leading-6 text-gray-600">Add a project to view logs.</p>

                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-6">
                                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input v-model="name" type="text" name="name" id="name"  class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="New Laravel Project">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Path</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input :value="path" disabled placeholder="/storage/logs"
                                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    >
                                                    <button @click.prevent="openFileDialog" v-if="!path">Choose Folder</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="button" class="text-sm font-semibold leading-6 text-gray-900" @click="close">Cancel</button>
                                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    @click.prevent="addProject"
                                >Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { ref, defineEmits } from 'vue'

const name = ref('')
const path = ref('')

const emit = defineEmits(['addProject', 'close'])
const addProject = () => {
    axios.post('/api/project', {
        name: name.value,
        path: path.value
    }).then(response => {
        console.log(response.data)
        emit('addProject', response.data)
        close()
    }).catch(error => {
        console.log(error)
    })
}

const openFileDialog = async () => {
    axios('/api/dashboard/get-path').then(response => {
        console.log(response.data)
        path.value = response.data
    }).catch(error => {
        console.log(error)
    })
}

const close = () => {
    emit('close')
}

</script>

<style scoped>

</style>
