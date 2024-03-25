<template>
    <div>
        <!-- <h2 class="text-center">clients List</h2>   -->

        <div class="container">
            <div class="">
        
                <div class="card__header">
                    <div>
                        <h2 class="invoice__title">Clients</h2>
                    </div>
                    <div>
                        <!-- <a class="btn btn-secondary" @click="newClient">
                            New Client
                        </a> -->
                        <router-link :to="{name: 'create'}" class="btn btn-secondary">New Client</router-link>
                    </div>
                </div>

                <div class="table card__content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="client in clients" :key="client.id">
                            <td>{{ client.id }}</td>
                            <td>{{ client.firstname }}</td>
                            <td>{{ client.middlename }}</td>
                            <td>{{ client.lastname }}</td>
                            <td>{{ client.email }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <router-link :to="{name: 'edit', params: { id: client.id }}" class="btn btn-success">Edit</router-link>
                                    <button class="btn btn-danger" @click="deleteclient(client.id)">Delete</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table> 
                </div>
        
            </div>
        </div>
 
    </div>
</template>
 
<script>    
    export default {
        data() {
            return {
                clients: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/clients/')
                .then(response => {
                    this.clients = response.data.clients;
                });
        },
        methods: {
            deleteclient(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/clients/${id}`)
                    .then(response => {
                        let i = this.clients.map(data => data.id).indexOf(id);
                        this.clients.splice(i, 1)
                    });
            },
            // newClient() {
            //     router.push("/create");  
            // }
        }
    }
</script>