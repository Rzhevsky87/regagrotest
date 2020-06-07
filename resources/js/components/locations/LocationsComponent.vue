<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header_title">
                            Список населенных пунктов
                        </h3>
                    </div>

                    <div class="card-body form-wrapper">
                        <input v-model.trim="name" placeholder="Названия н.п.">
                        <input v-model.trim="population_count" placeholder="Население">
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="submit()"
                        >
                            Отправить
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><p class="font-weight-bold">Название н.п.</p></th>
                                    <th scope="col"><p class="font-weight-bold">Широта</p></th>
                                    <th scope="col"><p class="font-weight-bold">Долгота</p></th>
                                    <th scope="col"><p class="font-weight-bold">Население</p></th>
                                </tr>
                            </thead>
                            <tbody v-for="location in locations">
                                <tr>
                                    <th scope="row">{{location.name}}</th>
                                    <td>{{location.latitude}}</td>
                                    <td>{{location.longitude}}</td>
                                    <td>{{location.population_count}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                locations: '',
                error:'',

                name: '',
                population_count:'',
            }
        },

        mounted() {
            this.getData()
        },

        methods: {
            getData() {
                axios.get('/loc/getLocations')
                    .then(res => {
                        this.locations = res.data.data.locations.locations
                    }
                );
            },

            submit() {
                axios.post('/loc/storeLocation', {
                    name: this.name,
                    population_count: this.population_count,
                  })
                .then(res => {
                        this.getData()
                        this.name = ''
                        this.population_count = ''
                    }
                );
            }
        },
    }
</script>