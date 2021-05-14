<template>
    <data-table
        :columns="columns"
        :url="url"
        :debounce-delay="10"
        @on-table-props-changed="reloadTable">
    </data-table>
</template>

<script>
import EditButton from "../button-partials/EditButton";
import DeleteButton from "../button-partials/DeleteButton";

export default {
    name: "ProductDataTable",
    props: ['url', 'resource_url', 'home_url'],
    mounted() {
        console.log(this.resource_url);
    },
    data() {
        return {
            columns: [
                {
                    label: 'ID',
                    name: 'id',
                    orderable: true,
                },
                {
                    label: 'Название',
                    name: 'product.title',
                    columnName: 'products.title',
                    orderable: true,
                },
                {
                    label: 'Категория',
                    name: 'product.category.title',
                    columnName: 'products.category_id',
                    orderable: true,
                },
                {
                    label: 'Количество',
                    name: 'count',
                    orderable: true,
                },
                {
                    label: 'Цена',
                    name: 'price',
                    orderable: true,
                },
                {
                    label: 'Скидка в %',
                    name: 'discount',
                    columnName: 'discount',
                    orderable: true,

                },
                {
                    label: 'Редактировать',
                    name: 'Редактировать',
                    orderable: false,
                    event: "click",
                    classes: {
                        'btn': true,
                        'btn-info': true,
                        'btn-sm': true,
                    },
                    click: this.editRow,
                    component: EditButton,
                    handler: this.editRow,
                },
                {
                    label: 'Удалить',
                    name: 'Удалить',
                    orderable: false,
                    event: "click",
                    classes: {
                        'btn': true,
                        'btn-danger': true,
                        'btn-sm': true,
                    },
                    click: this.deleteRow,
                    component: DeleteButton,
                    handler: this.deleteRow,
                },

            ],
        }
    },
    methods: {
        deleteRow(data) {
            axios.delete(this.resource_url + "/" + data.id).then(() => {
                this.reloadTable()
                console.log(data);
            });
        },
        editRow(data) {
            window.location.href = this.home_url + "company/items/" + data.id;
        },
        reloadTable(){
            axios.get(this.url).then(response => {
                    this.data = response.data
                }
            )
        }

    }
}
</script>

<style scoped>

</style>
