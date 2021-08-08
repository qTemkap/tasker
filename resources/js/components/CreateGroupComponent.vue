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
        <div class="options" v-if="options">
            <br>
            <br>
            <h2 class="text-center">Значения важности</h2>
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
        </div>
    </div>
</template>

<script>
    export default {
        props: ['urlForCreateGroup', 'group'],
        data() {
            return {
                namePage: 'Создание группы',
                nameBtnSave: 'Создать',
                name: '',
                countPeople: '',
                options: false,
            }
        },
        mounted() {
            if (Object.keys(this.group).length !== 0) {
                this.name = this.group.name;
                this.namePage = 'Редактирование группы';
                this.nameBtnSave = 'Сохранить';
                this.options = true;
                this.countPeople = this.group.count_people;
            }
        },
        methods: {
            saveGroup: function () {
                axios.post(this.urlForCreateGroup, {name:this.name, countPeople:this.countPeople})
                    .then(respons => {
                        window.location.href = respons.data;
                    });
            }
        }
    }
</script>
