<template>
    <div class="container">
        <div v-for="item, key in tasks">
<!--            <qwer-component :id="item.id" :index="key" @click="theParentMethod"></qwer-component>-->
            <qwer-component-2 :id="item.id" :task="item" :index="key" @click="theParentMethod"></qwer-component-2>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['tasks'],
        data() {
            return {
                list: []
            }
        },
        methods: {
            theParentMethod(index) {
                console.log(index);
                this.$delete(this.tasks, index)

                console.log(this.tasks)
            }
        }
    }
</script>
