<template>
<div class="col-md-12">
    <label class="file-upload">
         <vue-dropzone id="dropzone" :options="dropzoneOptions" :useCustomSlot=true>
            <div class="dropzone-custom-content">
                <h3 class="dropzone-custom-title">Перетащите изображения товара!</h3>
                <div class="subtitle">...или выберите с вашего устройства</div>
            </div>
        </vue-dropzone>
    </label>
</div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone
        },
        data: function () {
            return {
                dropzoneOptions: {
                    thumbnailWidth: 300,
                    headers: { "My-Awesome-Header": "header value" }
                }
            }
        }
    }
</script>

<style>
    .theme-white .dropzone {
        border: 1px solid #6777ef;
    }
    
    label.file-upload {
        width: 100%;
    }

    .dropzone-custom-title {
        margin-top: 0;
        color: #00b782;
    }

    .subtitle {
        color: #314b5f;
    }
</style>