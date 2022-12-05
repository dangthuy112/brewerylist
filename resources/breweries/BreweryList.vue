<template>
    <div>
        <div class="d-flex justify-content-between align-items-center p-1 border-bottom">
            <h1>List of Breweries</h1>
            <button class="btn btn-danger" @click="resetData">Grab/Reset
                Data</button>
        </div>
        <div v-if="loading">Data is loading ...</div>
        <div v-else>
            <div>
                <div class="h4 p-1 text-muted mt-2" v-if="(breweries.length == 0)">No Breweries in database</div>
                <div class="row mt-2" v-for="(brewery, index) in breweries" :key="index">
                    <div class="col mb-2">
                        <!-- <BreweryItem :id="brewery.id" :brewery_id="brewery.brewery_id"
                            :brewery_type="brewery.brewery_type" :name="brewery.name" :city="brewery.city"
                            :state="brewery.state" /> -->
                        <BreweryItem :="brewery" @delete="deleteBrewery" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BreweryItem from '../breweries/BreweryItem.vue';

export default {
    components: {
        BreweryItem
    },
    data() {
        return {
            breweries: null,
            loading: true
        }
    },
    methods: {
        async deleteBrewery(id) {
            const request = await axios.delete(`/api/delete_brewery/${id}`)
                .then(response => {
                    this.getBreweries();
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log('Request made but no response\n' + error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                });
        },
        async getBreweries() {
            const request = await axios.get('/api/breweries')
                .then(response => {
                    this.breweries = response.data.data;
                    this.loading = false;
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log('Request made but no response\n' + error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                });
        },
        async resetData() {
            console.log('resetting data');

            const request = await axios.get('https://api.openbrewerydb.org/breweries')
                .then(response => {
                    const request1 = axios.post('/api/reset_data', response.data)
                        .then(() => {
                            this.getBreweries();
                            console.log('data resetted');
                        }).catch((error) => {
                            if (error.response) {
                                console.log(error.response.data);
                                console.log(error.response.status);
                                console.log(error.response.headers);
                            } else if (error.request) {
                                console.log('Request made but no response\n' + error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                        });
                });
        },
    },

    created() {
        this.loading = true;
        console.log("brewList Component created.");
        this.getBreweries();
    }
};
</script>