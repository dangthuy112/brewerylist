<template>
    <div>
        <h5 class="text-uppercase text-secondary font-weight-bolder m-1 mt-4">Check Availablility</h5>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="from" class="m-1">From</label>
                <input type="text" name="from" id="from" class="form-control m-1" placeholder="Start date"
                    v-model="from" @keyup.enter="check" />
            </div>
            <div class="form-group col-md-6">
                <label for="from" class="m-1">To</label>
                <input type="text" name="to" id="to" class="form-control m-1" placeholder="End date" v-model="to"
                    @keyup.enter="check" />
            </div>
        </div>
        <button class="btn btn-secondary col-12 m-1" @click="check">Check!</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            from: null,
            to: null
        }
    },
    methods: {
        check() {
            console.log('Check!');
        }
    }
}
</script>

<style scoped>
label {
    font-size: 1.2rem;
}
</style>