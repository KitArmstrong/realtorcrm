<template>
    <el-tabs type="card">
        <el-tab-pane label="Buyer Requests">
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="10" class="label">Home Type</el-col>
                <el-col :span="14" class="value"></el-col>
            </el-row>
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="10" class="label">Home Age</el-col>
                <el-col :span="14" class="value"></el-col>
            </el-row>
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="10" class="label">Square Feet</el-col>
                <el-col :span="14" class="value"></el-col>
            </el-row>
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="10" class="label">Bedrooms</el-col>
                <el-col :span="14" class="value"></el-col>
            </el-row>
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="10" class="label">Bathrooms</el-col>
                <el-col :span="14" class="value"></el-col>
            </el-row>
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="10" class="label">Location</el-col>
                <el-col :span="14" class="value"></el-col>
            </el-row>
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="10" class="label">Features</el-col>
                <el-col :span="14" class="value"></el-col>
            </el-row>
            <el-row type="flex" justify="center" class="view-row">
                <el-col :span="7" class="label">Max Price</el-col>
                <el-col :span="9" class="value margin-right"></el-col>
                <el-col :span="8" class="label">Pre Appr.</el-col>
            </el-row>
        </el-tab-pane>
        <el-tab-pane label="Seller Requests"></el-tab-pane>
    </el-tabs>
</template>

<script>
    export default {
        name: 'BothRequestPanel',

        props: {
            requests: {
                type: Object,
                required: true,
                default: {}
            }
        },

        data() {
            return {
            }
        },

        computed: {

        },

        methods: {

        },
    }
</script>