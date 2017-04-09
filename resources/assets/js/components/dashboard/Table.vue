<template>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="display: flex;justify-content: space-between;align-items: center">
                        <h5>基本属性</h5>
                        <slot name="buttons"></slot>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <template v-for="field in fields">
                                    <th :class="field.titleClass">{{ field.title ? field.title : '' }}</th>
                                </template>
                            </tr>
                            </thead>
                            <tbody>
                            <template v-if="items.length > 0">
                                <tr v-for="item in items">
                                    <template v-for="field in fields">
                                        <template v-if="isSpecialField(field.name)">
                                            <template v-if="field.name == '__actions'">
                                                <td :class="field.dataClass">
                                                    <template v-for="action in itemActions">
                                                        <a @click="callAction(action.name, item)" :class="action.class">
                                                            <i :class="action.icon"></i>
                                                            {{ action.label }}
                                                        </a>
                                                    </template>
                                                </td>
                                            </template>
                                        </template>
                                        <template v-else>
                                            <td :class="field.dataClass">
                                                {{ item[field.name] }}
                                            </td>
                                        </template>
                                    </template>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            fields: {
                type: Array,
                required: true
            },
            items: {},
            itemActions: {
                type: Array,
            }
        },
        methods: {
            isSpecialField(name) {
                return name.slice(0, 2) === '__';
            },
            callAction(action, data) {
                this.$emit('table-action', action, data);
            }
        }
    }
</script>

<style>

</style>