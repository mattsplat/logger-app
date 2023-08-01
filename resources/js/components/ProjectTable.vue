<template>
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <button type="button" class="ml-auto flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    @click="showProjectFormModal = true"
                >
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add product
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">Project Name</th>
                    <th scope="col" class="px-4 py-3">Path</th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b dark:border-gray-700" v-for="(project, index) in projects" :key="index">
                    <td class="px-4 py-3">{{project.name}}</td>
                    <td class="px-4 py-3">{{project.path}}</td>
                    <td class="px-4 py-3 flex items-center justify-end">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                            <li>
                                <a :href="`/project/${project.id}`" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-green-600">Show</a>
                            </li>
                            <li>
                                <a href="#" @click.prevent="deleteProject(project.id)" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-600">Delete</a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr v-if="projects.length <  1">
                    <td colspan="3" class="text-center py-4 text-2xl text-white">No projects found.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <ProjectFormModal v-if="showProjectFormModal" @close="showProjectFormModal = false" @addProject="getProjects"></ProjectFormModal>
</template>

<script setup>
import {onMounted, ref} from "vue";
import ProjectFormModal from "./ProjectFormModal.vue";

const projects = ref([]);
const showProjectFormModal = ref(false);

onMounted(() => {
    getProjects()
})
const getProjects = () => {
    axios.get('/api/project')
        .then(response => {
            projects.value = response.data.projects;
        })
        .catch(error => {
            console.log(error);
        });
}

const deleteProject = (id) => {
    axios.delete(`/api/project/${id}`)
        .then(_ => {
            getProjects();
        })
        .catch(error => {
            console.log(error);
        });
}

</script>

<style scoped>

</style>
