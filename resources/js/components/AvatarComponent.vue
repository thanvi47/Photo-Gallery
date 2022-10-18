<template>
    <div>
<div class="container">
    <div class="row">
        <div class="card-body">
<!--            <img : src="'/storage/'+userImage">-->
            <img :src="'/storage/'+userImage" alt="" width="120">
            <br>


            <form @submit.prevent="updateProfilePic" method="post" enctype="multipart/form-data">
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
            userImage:''
        }
    },mounted() { this.getUserRecentAvatar()
    },methods:{
        onImageChange(e) {
            console.log(e)
            this.image = e.target.files[0];
        },
        updateProfilePic() {
            this.userid
            const config={
                headers:{
                    "content-type":"multipart/form-data"
                }
            }
            let formData = new FormData();

            formData.append('image',this.image);
            axios.post('/profile-pic',formData,config).then((response)=>{
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your changes has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            this.image='',
                this.getUserRecentAvatar()
            }).catch((error)=>{
                alert('error')
            })
        },getUserRecentAvatar(){
            axios.get('/user/'+this.userid).then((response)=>{
                this.userImage =response.data.substr(7)
            }).catch((error)=>{
                alert(error)
            })

        }
    }
}
</script>
