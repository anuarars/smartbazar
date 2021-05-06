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
                    label: 'Name',
                    name: 'name',
                    searchable: true,
                    orderable: true,
                },
                {
                    label: 'Phone',
                    name: 'phone',
                    searchable: true,
                    orderable: true,

                },

            ]
        }
    },
}
</script>
