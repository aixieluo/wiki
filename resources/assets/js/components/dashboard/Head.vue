<template>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Wiki编辑</h2>
            <ol class="breadcrumb">
                <li>
                    <router-link to="/dashboard/home">首页</router-link>
                </li>
                <slot>
                    <li>
                        <strong>{{ headTitle }}</strong>
                    </li>
                </slot>
            </ol>
        </div>
        <div class="col-lg-2"></div>
    </div>
</template>

<script>
    export default {
        props: {
            headTitle: {
                type: String,
                default: ''
            }
        },
    }
</script>

<style>

</style>