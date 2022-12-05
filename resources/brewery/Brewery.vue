<template>
    <div class="card">
        <div v-if="loading">Loading ...</div>
        <div v-else class="card-body">
            <div class="d-flex justify-content-between mt-2">
                <router-link class="btn btn-primary" :to="{ name: 'breweryList' }"> &#171; Previous</router-link>

                <div class="btn-group" role="group">
                    <router-link class="edit-button btn btn-primary"
                        :to="{ name: 'edit_brewery', params: { id: brewery.id } }">EDIT</router-link>
                    <router-link class="edit-button btn btn-danger"
                        :to="{ name: 'delete_confirm', params: { id } }">DELETE</router-link>
                </div>
            </div>
            <div v-if="loading">Data is loading ...</div>
            <div v-else>
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
            loading: true
        }
    },
    async created() {
        this.loading = true;

        const request = await axios.get(`/api/breweries/${this.$route.params.id}`)
            .then(response => {
                this.brewery = response.data.data;
                this.loading = false;
            });
    }
};
</script>