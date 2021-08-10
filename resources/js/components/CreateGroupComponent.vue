<template>
    <div class="container">
        <h2 class="text-center">{{this.namePage}}</h2>
        <br>
        <form>
            <div class="mb-3">
                <label for="groupName" class="form-label">Название группы</label>
                <input v-model="name" type="text" class="form-control" id="groupName">
            </div>
            <div class="mb-3">
                <label for="countPeople" class="form-label">Количество людей в группе</label>
                <input v-model="countPeople" type="text" class="form-control" id="countPeople">
            </div>
            <button type="button" v-on:click="saveGroup" class="btn btn-success">{{this.nameBtnSave}}</button>
        </form>
        <div class="options" v-if="prioritiesOptions">
            <hr>
            <h2 class="text-center">Приоритеты для задач</h2>
            <br>
            <form>
                <div class="mb-3">
                    <label for="priorityName" class="form-label">Название приоритета</label>
                    <input v-model="priorityName" type="text" class="form-control" id="priorityName">
                </div>
                <div class="mb-3">
                    <label for="priorityColor" class="form-label">Цвет фона</label>
                    <input v-model="priorityColor" type="text" class="form-control" id="priorityColor">
                </div>
                <button type="button" v-on:click="savePriority" class="btn btn-success">{{this.nameBtnSave}}</button>
            </form>
        </div>
        <div class="options" v-if="categoriesOptions">
            <hr>
            <h2 class="text-center">Категории для задач</h2>
            <br>
            <form>
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Название категории</label>
                    <input v-model="categoryName" type="text" class="form-control" id="categoryName">
                </div>
                <button type="button" v-on:click="saveCategory" class="btn btn-success">{{this.nameBtnSave}}</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['urlForCreateGroup', 'group', 'categories', 'priorities', 'urlForPriority', 'urlForCategory'],
        data() {
            return {
                namePage: 'Создание группы',
                nameBtnSave: 'Создать',
                name: '',
                countPeople: '',
                prioritiesOptions: false,
                categoriesOptions: false,
                categoryName: '',
                priorityName: '',
                priorityColor: '',
            }
        },
        mounted() {
            if (Object.keys(this.group).length !== 0) {
                this.name = this.group.name;
                this.namePage = 'Редактирование группы';
                this.nameBtnSave = 'Сохранить';
                this.prioritiesOptions = true;
                this.categoriesOptions = true;
                this.countPeople = this.group.count_people;
            }
        },
        methods: {
            saveCategory: function() {
                axios.post(this.urlForCategory, {name:this.categoryName})
                    .then(respons => {
                        // window.location.href = respons.data;
                    });
            },
            savePriority: function() {
                axios.post(this.urlForPriority, {name:this.priorityName, color:this.priorityColor})
                    .then(respons => {
                        // window.location.href = respons.data;
                    });
            },
            saveGroup: function () {
                axios.post(this.urlForCreateGroup, {name:this.name, countPeople:this.countPeople})
                    .then(respons => {
                        window.location.href = respons.data;
                    });
            }
        }
    }
</script>
