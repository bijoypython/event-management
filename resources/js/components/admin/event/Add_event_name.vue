<template>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->

            <Header />
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <Menu />

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"></h1>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Dashboard
                                    </li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid col-md-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="m-0">Add Event Name</h3>
                                <div v-if="msg" class="alert alert-success">
                                    {{ msg }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="form-label">Event Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter Event Name"
                                            v-model="name" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary " @click="submit">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <Footer />

            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
    </body>
</template>

<script>
import axios from "axios";
import Footer from "../Footer.vue";
import Header from "../Header.vue";

import Menu from "../Menu.vue";


export default {
    components: { Menu, Footer, Header },
    name: 'Add_event_name',
    data() {
        return {
            name: "",
            msg: "",
        };
    },

    methods: {
        submit() {

            axios.post("api/eventname", {
                name: this.name,
            })
                .then((response) => {
                    // this.$router.push("/addevent");
                    this.name = "";
                    this.msg = "Saved Successfully!"
                });
        },
    },

    mounted() {

    },
}
</script>