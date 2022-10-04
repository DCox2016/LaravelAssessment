<template>
    <div class="container m-auto mt-10">
        <li v-for="item in listItems" class="list-none w-3/4">
            <div v-if="item.active" class="flex my-8 border-2 justify-between">
                <span v-if="!item.complete" @click="markCompleteIncomplete(item)" class="mt-2 ml-5">{{ item.name }}</span>
                <span v-if="item.complete" @click="markCompleteIncomplete(item)" class="mt-2 ml-5 line-through">{{ item.name }}</span>
                <span>
                    <button @click="deleteTask(item.id)" class="bg-red-500 px-4 py-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
            </div>
        </li>
    </div>
</template>
<script>

export default {
    data() {
        return {
            listItems: null,
            taskId: null,
            completedLine: null,
        }
    },
    methods: {
        markCompleteIncomplete(item) {
            let newStatus;
            if (item.complete) {
                newStatus = false;
            } else {
                newStatus = true;
            }

            this.axios.post('api/todo/mark', { 'Status': newStatus, 'Id': item.id }).then((response) => {
                if (response.status == 200) {
                    window.location.reload();
                } else {
                    alert('There was an Error mark task complete or incomplete');
                }
            });
        },
        deleteTask(id) {
            this.axios.post('api/todo/delete', { 'Id': id }).then((response) => {
                if (response.status == 200) {
                    window.location.reload();
                } else {
                    alert('There was an Error deleting this task');
                }
            });
        }
    },
    mounted() {
        this.axios.get('api/todo').then((response) => {
            this.listItems = response.data;
        });
    }
}
</script>