<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/all" class="nav-item nav-link">Client List </router-link>
                    <router-link to="/create" class="nav-item nav-link">Create Client </router-link>
                    <router-link to="/edit/1" class="nav-item nav-link">Edit Client(1) </router-link>
                </div>
            </div>
        </nav>
        <Index></Index>
        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>