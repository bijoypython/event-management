<template>
    <div class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>Admin</b>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Log In to start your session</p>

                    <form action="javascript:void(0)" method="post">
                        <div class="col-12" v-if="Object.keys(validationErrors).length > 0">
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <li v-for="(value, key) in validationErrors" :key="key">{{ value[0] }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" v-model="auth.email" name="email" id="email" class="form-control" placeholder="Enter Email Address">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" v-model="auth.password" name="password" id="password"
                                class="form-control" placeholder="Enter Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" :disabled="processing" @click="login"
                                    class="btn btn-primary btn-block">
                                    {{ processing ? "Please wait" : "Login" }}
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    name: 'Login',
    data() {
        return {
            auth: {
                email: "",
                password: ""
            },
            validationErrors: {},
            processing: false
        }
    },
    methods: {
        ...mapActions({
            signIn: 'auth/login'
        }),
        async login() {
            this.processing = true
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/login', this.auth).then(({ data }) => {
                // console.log(data)
                this.signIn()
                axios.get('/api/user')
                    .then(({data})=>{
                        console.log(data)
                    })
            }).catch(({ response }) => {
                if (response.status === 422) {
                    this.validationErrors = response.data.errors
                } else {
                    this.validationErrors = {}
                    alert(response.data.message)
                }
            }).finally(() => {
                this.processing = false
            })
        },
    }
}

</script>