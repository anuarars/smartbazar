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
                    label: 'ID',
                    name: 'id',
                    searchable: true,
                    orderable: true,
                },{
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
                    label: 'Код',
                    name: 'code',
                    searchable: true,
                    orderable: true,
                },
                {
                    label: 'БИН',
                    name: 'bin',
                    searchable: true,
                    orderable: true,
                },
                {
                    label: 'Город',
                    name: 'city.name',
                    columnName: 'cities.name',
                },
                {
                    label: 'Почта',
                    name: 'email_name',
                    columnName: 'emails.name',
                    searchable: true,
                },

            ]
        }
    },
}
</script>
