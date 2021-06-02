<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label"
                            >ID</label
                        >
                        <input
                            type="text"
                            class="col-sm-9 form-control-plaintext"
                            readonly
                            id="id"
                            v-model="task.id"
                        />
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label"
                            >Title</label
                        >
                        <input
                            type="text"
                            class="col-sm-9 form-control"
                            id="title"
                            v-model="task.title"
                        />
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label"
                            >Content</label
                        >
                        <input
                            type="text"
                            class="col-sm-9 form-control"
                            id="content"
                            v-model="task.content"
                        />
                    </div>
                    <div class="form-group row">
                        <label for="is_done" class="col-sm-3 col-form-label"
                            >Is Done</label
                        >
                        <input
                            type="checkbox"
                            class="col-sm-9"
                            id="is_done"
                            v-model="task.is_done"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        taskId: Number
    },
    data: function() {
        return {
            task: {}
        };
    },
    methods: {
        getTask() {
            axios.get("/api/tasks/" + this.taskId).then(res => {
                this.task = res.data;
            });
        },
        submit() {
            axios.put("/api/tasks/" + this.taskId, this.task).then(res => {
                this.$router.push({ name: "task.list" });
            });
        }
    },
    mounted() {
        this.getTask();
    }
};
</script>
