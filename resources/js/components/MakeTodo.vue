<template>
    <div class="container m-auto mt-10">
        <p class="text-2xl">Tasks</p>
        <div class="flex w-96">
            <input v-model="addedTasks" class="w-80 border-2" placeholder="New Task" />
            <button @click="addTask()" class="flex bg-blue-500 px-8 py-5 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg> Add
            </button>
        </div>


    </div>
</template>
<script>
export default {
    data() {
        return {
            addedTasks: null
        }
    },
    methods: {
        addTask() {
            this.axios.post('api/todo/add',{'Name':this.addedTasks}).then((response) => {
            if(response.status == 200){
                window.location.reload();
            } else {
                alert('There was an Error marking this task');
            }
        });
        }
    }
}
</script>