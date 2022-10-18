<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="card-body">
                    <!--            <img : src="'/storage/'+userImage">-->
                    <img :src="'/storage/'+bgImage" alt="" width="120">
                    <br>


                    <form @submit.prevent="updatebgPic" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" v-on:change="onImageChange">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    props:['userid'],
    data(){
        return{
            image:'',
            bgImage:''
        }
    },mounted() { this.getUserRecentBgPic()
    },methods:{
        onImageChange(e) {
            console.log(e)
            this.image = e.target.files[0];
        },
        updatebgPic() {
            this.userid
            const config={
                headers:{
                    "content-type":"multipart/form-data"
                }
            }
            let formData = new FormData();

            formData.append('image',this.image);
            axios.post('/bg-pic',formData,config).then((response)=>{
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your changes has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
                this.image='',
                    this.getUserRecentBgPic()
            }).catch((error)=>{
                alert('error')
            })
        },getUserRecentBgPic(){
            axios.get('/user/bg/'+this.userid).then((response)=>{
                this.bgImage =response.data.substr(7)
            }).catch((error)=>{
                alert(error)
            })

        }
    }
}
</script>
