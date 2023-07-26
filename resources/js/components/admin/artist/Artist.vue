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
                               <h3 class="m-0">Event Status</h3>
                           </div>
                           <div class="card-body">
                               <div class="col-md-12">
                                   <table
                                       class="table table-bordered table-hover"
                                   >
                                       <thead>
                                           <tr>
                                               <th>SL</th>
                                               <th>Name</th>
                                               <th>Birthday</th>
                                               <th>Music</th>
                                               <th>Chanel</th>
                                               <th>Photo</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr
                                               v-for="(d, i) in artist"
                                               :key="i"
                                           >
                                               <td>{{ ++i }}</td>
                                               <td>{{ d.name }}</td>
                                               <td>{{ d.birthday }}</td>
                                               <td>{{ d.music }}</td>
                                               <td>{{ d.chanel }}</td>
                                               <td><img
                                                        :src="`uploads/${d.photo}`"
                                                        width="100"
                                                        height="100"
                                                    /></td>
                                                                            

                                               <td>
                                                   <router-link
                                                       :to="`/edit_artist/${d.id}`" class="btn btn-success"
                                                       >
                                                       <i class="nav-icon fas fa-edit "></i></router-link
                                                   >
                                                   &nbsp;
                                                   <a 
                                                       href="javascript:void(0)"
                                                       @click="
                                                           delartist(d.id)
                                                       " class="btn btn-danger"
                                                       ><i class="fa fa-trash"></i></a
                                                   >
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
    name:"Artist",
    data() {
       return {
           artist: [],
       };
   },
   methods: {
       getartist() {
           axios.get("api/artist").then((response) => {
               this.artist = response.data.data;
           });
       },
       delartist(id) {
           axios.delete(`api/artist/${id}`)
       .then((response)=> {
           // console.log(response.data)
           this.getartist()
       })
       },
   },
   mounted() {
       this.getartist();
   },
}
</script>