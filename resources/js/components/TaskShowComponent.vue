<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
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
                    <div class="form-group row border-bottom">
                        <label for="title" class="col-sm-3 col-form-label"
                            >Title</label
                        >
                        <input
                            type="text"
                            class="col-sm-9 form-control-plaintext"
                            readonly
                            id="title"
                            v-model="task.title"
                        />
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label"
                            >Content</label
                        >
                        <input
                            type="text"
                            class="col-sm-9 form-control-plaintext"
                            readonly
                            id="content"
                            v-model="task.content"
                        />
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="is_done" class="col-sm-3 col-form-label"
                            >Is Done</label
                        >
                        <input
                            type="checkbox"
                            class="col-sm-9"
                            id="is_done"
                            onclick="return false;"
                            v-model="task.is_done"
                        />
                    </div>
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
        }
    },
    mounted() {
        this.getTask();
    }
};
</script>
