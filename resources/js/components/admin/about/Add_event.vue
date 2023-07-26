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
                    <div class="container-fluid">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="m-0">Add Event Banner Info</h3>
                                <div v-if="msg" class="alert alert-success">
                                    {{ msg }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Slogan:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter Slogan"
                                            v-model="slogan"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Title</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="title" placeholder="Enter title"
                                            v-model="title"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Starting Date</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="from" placeholder="Type date"
                                            v-model="from"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >End Date</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="to" placeholder="Type date"
                                            v-model="to"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Month</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="date" placeholder="Type month & year"
                                            v-model="date"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Address</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="address" placeholder="Type address"
                                            v-model="address"
                                        />
                                    </div>
                                    <br><br>
                                    <div class="col-12 text-right">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                            @click="submit"
                                        >
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
    name: "Add_event",

    data() {
        return {
            slogan: "",
            title: "",
            from: "",
            to: "",
            date: "",
            address: "",
            msg:"",
        };
    },

    methods: {
        submit() {
            // let formData = new FormData();
            // formData.append("slogan", this.slogan);
            // formData.append("title", this.title);
            // formData.append("from", this.from);
            // formData.append("to", this.to);
            // formData.append("date", this.date);
            // formData.append("address", this.address);
            
            axios.post("api/about", {
                    slogan: this.slogan,
                    title: this.title,
                    from: this.from,
                    to: this.to,
                    date: this.date,
                    address: this.address,
                })
                .then((response) => {
                    this.$router.push("/addevent");
                  this.slogan="";
                  this.title="";
                  this.from="";
                  this.to="";
                  this.date="";
                  this.address="";
                  this.msg="Saved Successfully!"
                });
        },
    },

    mounted() {
        
    },

};
</script>
