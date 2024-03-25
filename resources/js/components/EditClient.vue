<template>
    <div>
        <h3 class="text-center">Edit Client</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateClientt">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="client.firstname">
                    </div>
                    <div class="form-group">
                        <label>MiddleName</label>
                        <input type="text" class="form-control" v-model="client.middlename">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="client.lastname">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="client.email">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/clients/${this.$route.params.id}`)
                .then((res) => {
                    this.client = res.data;
                });
        },
        methods: {
            updateClientt() {
                this.axios
                    .patch(`http://localhost:8000/api/clients/${this.$route.params.id}`, this.client)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>