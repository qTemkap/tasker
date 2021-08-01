<template>
    <div class="container">
        <div v-for="item, key in list">
            <qwer-component :id="item.id" :index="key" @click="theParentMethod"></qwer-component>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                list: [
                    {
                        id: 1,
                        name: 'first'
                    },
                    {
                        id: 2,
                        name: 'first'
                    },
                    {
                        id: 3,
                        name: 'first'
                    }
                ],
            }
        },
        methods: {
            theParentMethod(index) {
                setTimeout(() => {
                    console.log(index);
                    this.$delete(this.list, index)
                }, 1000);
            }
        }
    }
</script>
