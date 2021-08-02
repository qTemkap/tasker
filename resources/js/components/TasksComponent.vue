<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="btn-group text-center" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary" v-on:click="show_creater = !show_creater, show_executor = !show_executor">Автор</button>
                <button type="button" class="btn btn-primary" v-on:click="show_executor = !show_executor, show_creater = !show_creater">Исполнитель</button>
            </div>
        </div>

        <div v-if="show_creater">
1
        </div>
        <div v-if="show_executor">
2
        </div>
<!--        <div v-for="item, key in tasks">-->
<!--            &lt;!&ndash;            <qwer-component :id="item.id" :index="key" @click="theParentMethod"></qwer-component>&ndash;&gt;-->
<!--            <qwer-component-2 :id="item.id" :task="item" :index="key" @click="theParentMethod"></qwer-component-2>-->
<!--        </div>-->
    </div>
</template>


<script>
    export default {
        // props: ['tasks'],
        data() {
            return {
                show_creater: true,
                show_executor: false,
            }
        },
        methods: {
            // theParentMethod(index) {
            //     console.log(index);
            //     this.$delete(this.tasks, index)
            //
            //     console.log(this.tasks)
            // }
        }
    }
</script>
