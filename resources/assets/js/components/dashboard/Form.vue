<template>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="display: flex;justify-content: space-between;align-items: center">
                        <slot name="title"></slot>
                        <slot name="buttons"></slot>
                    </div>

                    <div class="ibox-content">
                        <slot name="content"></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>