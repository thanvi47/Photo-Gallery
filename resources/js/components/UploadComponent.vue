<template>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="from-group fi;es text-center" ref="fileform">
                <input type="file" ref="file" multiple="multiple">
                <span id="val"></span>
                <a href="">
                    <button class="btn btn-secondary" @click.prevent="submitFiles()"> Upload</button></a>
            </div>
        </form>
    </div>
</template>
<script type="text/javascript">
export default {
    data(){
        return{
            album_id:1

        }
    }, methods:{
        submitFiles(){
            const config={
                headers:{
                    "content-type":"multipart/form-data"
                }
            }
            let formData = new FormData();
            for(var i=0;i<this.$refs.file.files.length;i++){
                let file =this.$refs.file.files[i];
                formData.append('files['+i+']',file);
                formData.append('album_id',this.album_id);
            }
            axios.post('/uploadImage',formData,config).then((response)=>{

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Image has been uploaded',
                    showConfirmButton: false,
                    timer: 1500
                })
            }).catch((error)=>{

                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: error,
                    showConfirmButton: false,
                    timer: 2500
                })
                console.log(error)
            })
        }
    }
}
</script>
