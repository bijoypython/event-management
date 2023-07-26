<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Bijoy</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <!-- <a href="#" class="nav-link"> -->
                        <router-link to="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </router-link>
                        <!-- </a> -->
                    </li>
                    <li class="nav-item">
                      
                        <router-link to="/contact" class="nav-link">
                            <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                            <p>
                               Contact Message
                            </p>
                        </router-link>
                     
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">

                            <!-- <i class="nav-icon fas fa-table"></i> -->
                            <p>
                                Artist
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/addartist" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Artist</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/artist" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Artist Info</p>
                                </router-link>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">

                            <!-- <i class="nav-icon fas fa-table"></i> -->
                            <p>
                                Event
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/addevent" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Event Banner Info</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/about" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Event Banner Info</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/add-event-name" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Event Name</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/event-name" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Event Name List</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/event-schedule" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Event Schedule List</p>
                                </router-link>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" @click="logout">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    name: 'Menu',
    data() {
        return {
            // user:this.$store.state.auth.user
        }
    },
    methods: {
        ...mapActions({
            signOut: "auth/logout"
        }),
        logout() {

            this.signOut()

        }
    }
};

</script>