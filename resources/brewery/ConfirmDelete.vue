<template>
    <div>
        <div class="card p-2">
            <div v-if="loading">Loading ...</div>
            <div v-else class="card-body">
                <div v-if="success">
                    <div class="alert alert-success">
                        <span>Brewery Successfully Deleted!</span>
                    </div>
                    <router-link class="btn btn-primary mb-3" :to="{ name: 'breweryList' }"> &#171; Back to
                        List</router-link>
                </div>
                <div v-if="loading">Data is loading ...</div>
                <div v-else>
                    <p class="h1 m-2">Confirm Deletion</p>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-md-4 h5">
                                <span class="fw-bold ">Brewery ID:</span>
                                {{ brewery.brewery_id }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Name: </span>
                                {{ brewery.name ? brewery.name : 'N/A' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Brewery Type: </span>
                                {{ brewery.brewery_type ? brewery.brewery_type : 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Street: </span>
                                {{ brewery.street ? brewery.street : 'N/A' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="h5 fw-bold">Address 2:</span>
                                {{ brewery.address_2 ? brewery.address_2 : 'N/A' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Address 3: </span>
                                {{ brewery.address_3 ? brewery.address_3 : 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 h5">
                                <span class="fw-bold">City: </span>
                                {{ brewery.city ? brewery.city : 'N/a' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">State: </span>
                                {{ brewery.state ? brewery.state : 'N/A' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">County Providence: </span>
                                {{ brewery.county_province ? brewery.county_province : 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Postal Code: </span>
                                {{ brewery.postal_code ? brewery.postal_code : 'N/a' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Country: </span>
                                {{ brewery.country ? brewery.country : 'N/A' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Longitude: </span>
                                {{ brewery.longitude ? brewery.longitude : 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Longitude: </span>
                                {{ brewery.latitude ? brewery.latitude : 'N/a' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Phone: </span>
                                {{ brewery.phone ? brewery.phone : 'N/A' }}
                            </div>
                            <div class="col-md-4 h5">
                                <span class="fw-bold">Website URL: </span>
                                {{ brewery.website_url ? brewery.website_url : 'N/A' }}
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="btn-group">
                                <!-- <router-link class="btn btn-danger" :to="{ name: 'breweryList' }">
                                    Yes</router-link> -->
                                <button type="button" class="btn btn-danger" @click="deleteBrewery">Yes</button>
                                <router-link class="btn btn-secondary" :to="{ name: 'breweryList' }">
                                    No</router-link>
                            </div>
                        </div>
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
            brewery: null,
            loading: true,
            success: false,
        }
    },
    async created() {
        this.loading = true;
        this.getBrewery();
    },
    methods: {
        async getBrewery() {
            await axios.get(`/api/breweries/${this.$route.params.id}`)
                .then(response => {
                    this.brewery = response.data.data;
                    this.loading = false;
                }).catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    } else if (error.request) {
                        console.log('Request made but no response\n' + error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                });
        },
        async deleteBrewery() {
            await axios.delete(`/api/delete_brewery/${this.$route.params.id}`)
                .then(response => {
                    this.success = true;
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
        }
    }
};
</script>