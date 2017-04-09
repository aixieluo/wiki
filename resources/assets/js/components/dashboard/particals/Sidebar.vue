<template>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">

                    <div class="dropdown profile-element"> <span>
                            <img class="img-circle" src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1491654452396&di=f014a7c1c29390ee1e933dc108307865&imgtype=0&src=http%3A%2F%2Fi1.hdslb.com%2Fvideo%2F4e%2F4ee6ac4c2b9ca29c97c0d32d29b0abed.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Beaut-zihan</strong>
                             </span> <span class="text-muted text-xs block">超级管理员 <b class="caret"></b></span> </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="javascript:;">修改头像</a>
                            </li>
                            <li><a href="javascript:;">个人资料</a>
                            </li>
                            <li><a href="javascript:;">联系我们</a>
                            </li>
                            <li><a href="javascript:;">信箱</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="javascript:;">安全退出</a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        Wiki
                    </div>

                </li>
                <router-link v-for="menu in menus" tag="li" :to="menu.url">
                    <a>
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">{{ menu.label }}</span>
                    </a>
                </router-link>
            </ul>

        </div>
    </nav>
</template>

<script>
    import menus from '../../../config/menu'

    export default {
        data() {
            return {
                menus: menus,
            }
        }
    }
</script>