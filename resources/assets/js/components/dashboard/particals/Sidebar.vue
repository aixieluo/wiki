<template>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">

                    <div class="dropdown profile-element"> <span>
                            <!--<img class="img-circle" src="" />-->
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
                <router-link v-for="menu in menus" :key="menu.url" tag="li" :to="menu.url">
                    <a>
                        <i :class="menu.icon"></i>
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