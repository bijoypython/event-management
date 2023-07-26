<template>
    <div class="hold-transition sidebar-mini layout-fixed">
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
                                <h3 class="m-0">Event Name List</h3>
                                <div v-if="msg" class="alert alert-success">
                                    {{ msg }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Event Name</th>
                                                <th>Event Title</th>
                                                <th>Artist Name</th>
                                                <th>Event Date</th>
                                                <th>Event Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(d, i) in evntinfo" :key="i">
                                                <td>{{ ++i }}</td>
                                                <td>{{ d.evntname.name}}</td>
                                                <td>{{ d.title }}</td>
                                                <td>{{ d.artist_name }}</td>
                                                <td>{{ d.event_date }}</td>
                                                <td>{{ d.time }}</td>
                                                <td>
                                                    <!-- <router-link
                                                        :to="`/edit_about/${d.id}`" class="btn btn-success"
                                                        >
                                                        <i class="nav-icon fas fa-edit "></i></router-link
                                                    > -->
                                                    &nbsp;
                                                    <a href="javascript:void(0)" @click="
                                                        delinfo(d.id)
                                                        " class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    </div>
</template>

<script>
import Footer from "../Footer.vue";
import Header from "../Header.vue";
import Menu from "../Menu.vue";
export default {
    components: { Menu, Footer, Header },
    name: 'Event_schedule',
    data() {
        return {
            evntinfo: [],
            msg:'',
            displayedEventNames: [],
        };
    },
    methods: {
        getinfo() {
            axios.get("api/eventschedule").then((response) => {
                this.evntinfo = response.data.bijoy;
                // console.log(response.data.bijoy)
            });
        },
        delinfo(id) {
            axios.delete(`api/eventschedule/${id}`)
                .then((response) => {
                    this.getinfo()
                    this.msg = "'"+response.data.message+"'";
                })
        },
    },
    mounted() {
        this.getinfo();
    },
}
</script>