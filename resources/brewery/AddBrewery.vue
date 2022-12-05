<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="saveBrewery" novalidate>
                    <h1>Add Brewery</h1>
                    <div class="alert alert-danger" v-if="errors.length">
                        <ul class="mb-0">
                            <li v-for="(error, index) in errors" :key="index">
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <fieldset>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="brewery_id" class="form-label mt-4">Brewery ID
                                        <span class="text-danger">*REQUIRED*</span>
                                    </label>
                                    <input type="text" class="form-control" id="brewery_id"
                                        placeholder="Enter Brewery ID" v-model="brewery.brewery_id"
                                        v-on:change="clearErrors">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="form-label mt-4">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        v-model="brewery.name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="brewery_type" class="form-label mt-4">Brewery Type</label>
                                    <input type="text" class="form-control" id="brewery_type"
                                        placeholder="Enter Brewery Type" v-model="brewery.brewery_type">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="street" class="form-label mt-4">Street</label>
                                    <input type="text" class="form-control" id="street" placeholder="Enter Street"
                                        v-model="brewery.street">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="address_2" class="form-label mt-4">Address 2</label>
                                    <input type="text" class="form-control" id="address_2" placeholder="Enter Address 2"
                                        v-model="brewery.address_2">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="address_3" class="form-label mt-4">Address 3</label>
                                    <input type="text" class="form-control" id="address_3" placeholder="Enter Address 3"
                                        v-model="brewery.address_3">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="city" class="form-label mt-4">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City"
                                        v-model="brewery.city">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="state" class="form-label mt-4">State</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter State"
                                        v-model="brewery.state">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="county_province" class="form-label mt-4">County Providence</label>
                                    <input type="text" class="form-control" id="county_province"
                                        placeholder="Enter County Providence" v-model="brewery.county_providence">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="postal_code" class="form-label mt-4">Postal Code</label>
                                    <input type="text" class="form-control" id="postal_code"
                                        placeholder="Enter Postal Code" v-model="brewery.postal_code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="country" class="form-label mt-4">Country</label>
                                    <input type="text" class="form-control" id="country" placeholder="Enter Country"
                                        v-model="brewery.country">
                                </div>
                            </div>
                            <div class="col">

                                <div class="form-group">
                                    <label for="phone" class="form-label mt-4">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number"
                                        v-model="brewery.phone_number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="website_url" class="form-label mt-4">Website URL</label>
                                    <input type="text" class="form-control" id="website_url"
                                        placeholder="Enter Website URL" v-model="brewery.website_url">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="longitude" class="form-label mt-4">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" placeholder="Enter Longitude"
                                        v-model="brewery.longitude">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="latitude" class="form-label mt-4">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" placeholder="Enter Latitude"
                                        v-model="brewery.latitude">
                                </div>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            brewery: {
                brewery_id: null,
                name: null,
                brewery_type: null,
                street: null,
                address_2: null,
                address_3: null,
                city: null,
                state: null,
                county_province: null,
                postal_code: null,
                country: null,
                phone: null,
                website_url: null,
                longitude: null,
                latitude: null,
            },

            errors: [],
        }
    },
    methods: {
        async saveBrewery() {
            this.errors = [];
            if (!this.brewery.brewery_id) {
                this.errors.push("Brewery ID is required.")
            }

            if (!this.errors.length) {
                let formData = new FormData();
                formData.append('brewery_id', this.brewery.brewery_id);
                formData.append('name', this.brewery.name);
                formData.append('brewery_type', this.brewery.brewery_type);
                formData.append('street', this.brewery.street);
                formData.append('address_2', this.brewery.address_2);
                formData.append('address_3', this.brewery.address_3);
                formData.append('city', this.brewery.city);
                formData.append('state', this.brewery.state);
                formData.append('county_province', this.brewery.county_province);
                formData.append('postal_code', this.brewery.postal_code);
                formData.append('country', this.brewery.country);
                formData.append('longitude', this.brewery.longitude);
                formData.append('latitude', this.brewery.latitude);
                formData.append('phone', this.brewery.phone);
                formData.append('website_url', this.brewery.website_url);

                const url = '/api/add_brewery'
                await axios.post(url, formData)
                    .then((response) => {
                        console.log(response);
                        if (response.status = 200) {
                            alert(response.data.message);
                        }
                    }).catch((error) => {
                        if (error.response) {
                            if (error.response.status == 403) {
                                this.errors.push("Brewery ID already exists.")
                            } else if (error.response.status == 400) {
                                this.errors.push("Brewery ID is required.")
                            }
                            console.log(error.response.data);
                        } else if (error.request) {
                            console.log('Request made but no response\n' + error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
            }
        },
        clearErrors() {
            this.errors = [];
        }
    }
}
</script>

<style>

</style>