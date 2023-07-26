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
                                <h3 class="m-0">Add Artist Info</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Artist Name:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="name"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Birthday</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputPassword4"
                                            v-model="birthday"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Music</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputPassword4"
                                            v-model="music"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Chanel</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputPassword4"
                                            v-model="chanel"
                                        />
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="" class="form-label"
                                            >Photo</label
                                        >
                                        <input
                                            type="file"
                                            class="form-control"
                                            @change="fileHandle($event)"
                                        />
                                    </div>
                                    <br />
                                    

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
    name: "Add_artist",

    data() {
        return {
            name: "",
            birthday: "",
            music: "",
            chanel: "",
           
            file: "",
        };
    },

    methods: {
        fileHandle(e) {
            this.file = e.target.files[0];
        },

        submit() {
            let formData = new FormData();
            formData.append("name", this.name);
            formData.append("birthday", this.birthday);
            formData.append("music", this.music);
            formData.append("chanel", this.chanel);
            formData.append("file", this.file);

            axios
                .post("api/artist", formData, {
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then((response) => {
                    this.$router.push("/artist");
                });
        },
    },

    mounted() {
        
    },

};
</script>

