<template>
    <div>
        <div class="container">
            <div class="card_header">
                <div>
                    <h2 class="">Create Client</h2>
                </div>
            </div>
            <div class="card__content">
                <div class="row">
                    <div class="col-md-6">
                        <form @submit.prevent="addClient">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" v-model="client.firstname">
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" v-model="client.middlename">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" v-model="client.lastname">
                            </div>
                            <div class="form-group">
                                <label>EMAIL</label>
                                <input type="text" class="form-control" v-model="client.email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" v-model="client.password">
                            </div>
                            <!-- <div class="form-group">
                                <label>Detail</label>
                                <input type="text" class="form-control" v-model="client.detail">
                            </div> -->
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
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
                client: {}
            }
        },
        methods: {
            addClient() {
                this.axios
                    .post('http://localhost:8000/api/clients', this.client)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>