<template>
    <div class="card p-2">
        <div class="card-body">
            <router-link class="h4 fw-bold text-decoration-none" :to="{ name: 'brewery', params: { id } }">
                {{ name }}
            </router-link>
            <div class="container">
                <div class="row my-3">
                    <div class="col-sm-5 h5">
                        <span class="fw-bold">Brewery ID: </span> {{ (brewery_id) }}
                        <br />
                        <span class="fw-bold">Street: </span> {{ (street) }}
                        <br />
                        <span class="fw-bold">Brewery Type: </span> {{ (brewery_type) }}
                    </div>
                    <div class="col-sm-5 h5">
                        <p>
                            <span class="fw-bold">City: </span> {{ (city) }}
                            <br />
                            <span class="fw-bold">State: </span> {{ (state) }}
                            <br />
                            <span class="fw-bold">Postal Code: </span> {{ (postal_code) }}
                        </p>
                    </div>
                    <div class="col-sm-2 btn-group-vertical" role="group">
                        <router-link class="edit-button btn btn-primary"
                            :to="{ name: 'edit_brewery', params: { id } }">EDIT</router-link>
                        <router-link class="edit-button btn btn-danger"
                            :to="{ name: 'delete_confirm', params: { id } }">DELETE</router-link>
                        <!-- <button type="button" class="btn btn-danger" @click="$emit('delete', id)">DELETE</button> -->
                    </div>
                </div>
            </div>
            <router-link class="btn btn-info" :to="{ name: 'brewery', params: { id } }">
                More Details
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: Number,
        brewery_id: String,
        name: String,
        brewery_type: String,
        street: String,
        city: String,
        state: String,
        postal_code: String,
    }
}
</script>

<style scoped>
.edit-button {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>