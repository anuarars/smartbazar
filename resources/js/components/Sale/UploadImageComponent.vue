<template>
    <div>
        <vue-upload-multiple-image
            @upload-success="uploadImageSuccess"
            @before-remove="beforeRemove"
            @edit-image="editImage"
            @data-change="dataChange"
            :data-images="images"
            :drag-text="'Drag'"
            :browse-text="'Browse'"
            :primary-text="'Front image'"
            :drop-text="'Drop'"
            :popup-text="'This image will be displayed as an image of field in fields list'"
            :mark-is-primary-text="'First image on the list'"
            :max-image="10"
        ></vue-upload-multiple-image>

        <input name="galleries" :value="JSON.stringify(images)" hidden>
    </div>


</template>

<script>
import VueUploadMultipleImage from 'vue-upload-multiple-image'


export default {
    props: {
        images: {
            type: Array,
            default: []
        }
    },
    components: {
        VueUploadMultipleImage
    },
    methods: {
        uploadImageSuccess(formData, index, fileList) {
            // console.log('data', formData, index, fileList)
            this.images = fileList
            console.log(this.images)
        },
        beforeRemove (index, done, fileList) {
            console.log('index', index, fileList)
            var r = confirm("remove image")
            if (r === true) {
                done()
            } else {
            }
        },
        editImage (formData, index, fileList) {
            console.log('edit data', formData, index, fileList)
        },
        dataChange (data) {
            console.log(data)
        }
    }
}
</script>

<style scoped>

</style>
