<template>
    <data-table :data="data" :columns="columns" @on-table-props-changed="reloadTable">
    </data-table>
</template>

<script>
import axios from 'axios'

import ButtonComponent from '../../components/ButtonComponent.vue';
import UserImageComponent from '../../components/UserImageComponent.vue';

export default {
    data() {
        return {
            url: "/api/users",
            data: {},
            tableProps: {
                search: '',
                length: 10,
                column: 'id',
                dir: 'asc'
            },
            columns: [
                {
                    label: 'ID',
                    name: 'id',
                    orderable: true,
                },
                {
                    label: 'Name',
                    name: 'name',
                    orderable: true,
                },
                {
                    label: 'Email',
                    name: 'email',
                    orderable: true,
                },
                {
                    label: 'Profile Image',
                    name: 'img',
                    orderable: true,
                    component: UserImageComponent,
                },
                {
                    label: 'Test',
                    name: 'View',
                    orderable: false,
                    classes: {
                        'btn': true,
                        'btn-danger': true,
                        'btn-sm': true,
                    },
                    event: "click",
                    handler: this.displayRow,
                    component: ButtonComponent,
                },
            ]
        }
    },
    created() {
        this.getData(this.url);
    },
    components: {
        // eslint-disable-next-line
        ButtonComponent,
    },
    methods: {
        getData(url = this.url, options = this.tableProps) {
            axios.get(url, {
                params: options
            })
                .then(response => {
                    this.data = response.data;
                })
                // eslint-disable-next-line
                .catch(errors => {
                    //Handle Errors
                })
        },
        reloadTable(tableProps) {
            this.getData(this.url, tableProps);
        },
        displayRow(data) {
            alert(`You clicked row ${data.id}`);
        },
    }
}
</script>
<style>
.table>tbody>tr {
    /* height: 0 !important; */
    font-size: 12px !important;
}
</style>

<style lang="scss" scoped></style>
