<template>
    <div class="container-fluid finark-bg-primary">
        <div class="container-xxl container-xl container-lg container-md container-sm ">
            <div class="d-flex justify-content-between pt-3 pb-1">
                <div>
                    <a href="/admin" class="btn btn-sm btn-outline-white">Admin dashboard</a>
                </div>
                <div>
                    <p class="text-white">
                        Hi! {{ username }} 
                        <a href="/signout" class="btn btn-sm btn-outline-white">Sign out</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            username: String
        }
    }
</script>