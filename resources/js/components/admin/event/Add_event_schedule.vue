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
                    <div class="container-fluid col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="m-0">Add Event Schedule</h3>
                                <div v-if="msg" class="alert alert-success">
                                    {{ msg }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="evnt_name" class="form-label">Event Name:</label>
                                        <select name="eventname_id" id="evnt_name" class="form-control"
                                            v-model="eventname_id">
                                            <option value="">Click here to select name</option>
                                            <option v-for="(d, i) in eventname" :key="i" :value="`${d.id}`">{{ d.name }}
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Event Date:</label>
                                        <input type="date" class="form-control" placeholder="Select date"
                                            v-model="event_date" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Event Time:</label>
                                        <input type="text" class="form-control" placeholder="Enter Time"
                                            v-model="time" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Event Title:</label>
                                        <input type="text" class="form-control" placeholder="Enter Event Title"
                                            v-model="title" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Artist Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter Artist Name"
                                            v-model="artist_name" />
                                    </div>
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
    name: 'Add_event_schedule',
    data() {
        return {
            eventname_id: "",
            event_date:"",
            title:"",
            time:"",
            artist_name:"",
            eventname: [],
            msg: "",
        };
    },

    methods: {
        getname() {
            axios.get("api/eventname").then((response) => {
                this.eventname = response.data.data;
                console.log(response.data.data);
            });
        },
        submit() {
            let formData = new FormData();
            formData.append("eventname_id", this.eventname_id);
            formData.append("event_date", this.event_date);
            formData.append("title", this.title);
            formData.append("time", this.time);
            formData.append("artist_name", this.artist_name);

            axios.post("api/eventschedule", formData, {
                eventname_id: this.eventname_id,
                event_date: this.event_date,
                title: this.title,
                time: this.time,
                artist_name: this.artist_name,
            })
                .then((response) => {
                    // this.$router.push("/addevent");
                    this.eventname_id="";
                    this.event_date="";
                    this.title="";
                    this.time="";
                    this.artist_name="";
                    this.msg = "'"+response.data.message+"'";
                });
        },
    },

    mounted() {
        this.getname();
    },
}

</script>