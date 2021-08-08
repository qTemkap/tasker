<template>
    <div class="container">
        <h2 class="text-center">Создание задачи <span>({{this.group.name}})</span></h2>
        <br>
        <form>
            <div class="mb-3">
                <label for="taskName" class="form-label">Название группы</label>
                <input v-model="taskName" type="text" class="form-control" id="taskName">
            </div>
            <div class="mb-3">
                <label for="taskPriority" class="form-label">Важность</label>
                <select v-model="taskPriority" class="form-control" id="taskPriority">
                    <option v-for="item in this.priorityList" v-bind:value="item.id">{{item.name}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="taskCategory" class="form-label">Категория</label>
                <select v-model="taskCategory" class="form-control" id="taskCategory">
                    <option v-for="item in this.categoryList" v-bind:value="item.id">{{item.name}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="taskExecutor" class="form-label">Исполнитель</label>
                <select v-model="taskExecutor" class="form-control" id="taskExecutor">
                    <option v-for="item in this.friendsList" v-bind:value="item.id">{{item.name}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="taskShortDescription" class="form-label">Короткое описание</label>
                <input v-model="taskShortDescription" type="text" class="form-control" id="taskShortDescription">
            </div>
            <div class="mb-3">
                <label for="taskDescription" class="form-label">Полное описание</label>
                <input v-model="taskDescription" type="text" class="form-control" id="taskDescription">
            </div>
            <div class="mb-3">
                <label for="taskEnd" class="form-label">Конечный срок</label>
                <input v-model="taskEnd" type="date" class="form-control" id="taskEnd">
            </div>
            <button type="button" v-on:click="saveGroup" class="btn btn-primary">Создать</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['group', 'priorityList', 'categoryList', 'friendsList', 'saveTask'],
        data() {
            return {
                taskPriority: '',
                taskName: '',
                taskCategory: '',
                taskExecutor: '',
                taskShortDescription: '',
                taskDescription: '',
                taskEnd: '',
            }
        },
        mounted() {
            // console.log(this.friendsList);
        },
        methods: {
            saveGroup: function () {
                axios.post(this.saveTask, {
                    taskPriority: this.taskPriority,
                    taskName: this.taskName,
                    taskCategory: this.taskCategory,
                    taskExecutor: this.taskExecutor,
                    taskShortDescription: this.taskShortDescription,
                    taskDescription: this.taskDescription,
                    taskEnd: this.taskEnd,
                })
                .then(respons => {
                    window.location.href = respons.data;
                });
            }
        }
    }
</script>

