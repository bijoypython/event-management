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
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(d, i) in evntname" :key="i">
                                                <td>{{ ++i }}</td>
                                                <td>{{ d.name }}</td>
                                                <td>
                                                    <!-- <router-link
                                                        :to="`/edit_about/${d.id}`" class="btn btn-success"
                                                        >
                                                        <i class="nav-icon fas fa-edit "></i></router-link
                                                    > -->
                                                    &nbsp;
                                                    <a href="javascript:void(0)" @click="
                                                        delname(d.id)
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
    name: 'Event_name',
    data() {
        return {
            evntname: [],
            msg:'',
        };
    },
    methods: {
        getname() {
            axios.get("api/eventname").then((response) => {
                this.evntname = response.data.data;
            });
        },
        delname(id) {
            axios.delete(`api/eventname/${id}`)
                .then((response) => {
                    // console.log(response.data)
                    this.getname()
                    this.msg = "Deleted Successfully!"
                })
        },
    },
    mounted() {
        this.getname();
    },
}
</script>