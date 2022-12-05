<template>
    <div>
        <div class="d-flex justify-content-between align-items-center p-1 border-bottom">
            <h1>List of Breweries</h1>
            <div class="d-flex justify-content-center align-items-center">
                <input type="text" class="form-control me-5" id="searchString" placeholder="Search List"
                    v-model="searchString">
                <button class="btn btn-danger" @click="resetData">Grab/Reset
                    Data</button>
            </div>
        </div>
        <div v-if="loading">Data is loading ...</div>
        <div v-else>
            <div v-if="(searchString.length == 0)">
                <div class="h4 p-1 text-muted mt-2" v-if="(breweries.length == 0)">No Breweries in database</div>
                <div class="row mt-2" v-for="(brewery, index) in breweries" :key="index">
                    <div class="col mb-2">
                        <BreweryItem :="brewery" />
                    </div>
                </div>
            </div>
            <div v-else-if="filteredList">
                <div class="h4 p-1 text-muted mt-2" v-if="(filteredList.length == 0)">No Results</div>
                <div class="row mt-2" v-for="(brewery, index) in filteredList" :key="index">
                    <div class="col mb-2">
                        <BreweryItem :="brewery" />
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
    computed: {
        filteredList() {
            return this.breweries.filter((brew) => {
                if (brew.brewery_id && brew.brewery_id.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.brewery_type && brew.brewery_type.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.name && brew.name.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.street && brew.street.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.city && brew.city.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.state && brew.state.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.postal_code && brew.postal_code.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.phone && brew.phone.toLowerCase().includes(this.searchString.toLowerCase())) return true;
                if (brew.website_url && brew.website_url.toLowerCase().includes(this.searchString.toLowerCase())) return true;
            })
        }
    },
    data() {
        return {
            breweries: null,
            searchString: '',
            loading: true
        }
    },
    methods: {
        async getBreweries() {
            await axios.get('/api/breweries')
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
            if (confirm('This will wipe all current changes and reset with data from the API.\nAre you sure you want to reset data?')) {
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
            }
        },
    },

    created() {
        this.loading = true;
        this.getBreweries();
    }
};
</script>