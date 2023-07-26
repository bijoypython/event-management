<template>
    <div class="wrapper">
        <!-- Navbar -->
    <Header/>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
    <Menu/>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Blank Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$store.state.auth.user.name}}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        Start creating your amazing application!
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- /footer -->
        <Footer/>
    </div>
    <!-- ./wrapper -->
</template>

<script>
import Header from './Header.vue';
import Menu from './Menu.vue';
import Footer from './Footer.vue';
import axios from 'axios';

export default {
    name: 'Dashboard',
    components:{
        Header,
        Menu,
        Footer 
    },
    methods:{
         getUser(){
            axios.get('/api/user')
            .then(({data})=>{
                console.log(data)
            })
        }
    },
    mounted(){
        this.getUser()
    }
}
</script>