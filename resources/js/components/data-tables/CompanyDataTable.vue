<template>
    <data-table
        url="https://smartbazar.test/api/companies"
        :columns="columns">

    </data-table>
</template>

<script>


export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            perPage: ['10'],
            columns: [
                {
                    label: 'Название компании',
                    name: 'name',
                    searchable: true,
                    orderable: true,
                },
                {
                    label: 'Телефон',
                    name: 'phone',
                    searchable: true,
                    orderable: true,

                },
                {
                    label: 'Почта',
                    name: 'email_name',
                    searchable: true,
                    orderable: true,
                },

            ]
        }
    },
}
</script>
