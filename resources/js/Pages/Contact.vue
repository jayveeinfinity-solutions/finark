<template>
    <div class="container-fluid finark-bg-default">
        <div class="container pt-3 pb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="finark-fw-800 text-uppercase">Get in touch</h1>
                    <div class="finark-landing-separator rounded mb-2 mx-auto"></div>
                    <p class="font-weight-400">
                        Drop us a message for any inquiry!<br>We love to hear from you for what services can FinArk provides you.
                    </p>
                    <form action="" method="POST" name="contact-form">
                        <div class="container form-margin">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-lg-8 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" required>    
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" required>    
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="phone" class="form-control" placeholder="Phone" name="phone" required>    
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6" placeholder="Message" name="message" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="pager">
                            <button type="submit" class="btn finark-bg-primary text-white">SEND MESSAGE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import Landing from './../Shared/Layouts/Landing.vue';
</script>