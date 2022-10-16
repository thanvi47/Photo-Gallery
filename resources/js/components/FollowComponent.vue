<template>
    <div>
        <button class="btn btn-outline-info ml-4" @click.prevent="followUser" v-text="buttonText">Follow</button>
    </div>
</template>
<script type="text/javascript">
export default {
    props:[
      'userId',
      'follows'
    ],
    data(){
        return{
            status:this.follows

        }
    },methods:{
        followUser(){
            // console.log({userId:this.userId})

            axios.post('/follow',{userId:this.userId}).then(response=>{
                this.status = ! this.status

            }).catch(error=>{alert('error')})
        }
    },
    computed:{
        buttonText(){
            return(this.status)?'Unfollow':'Follow';
        }
    }
}
</script>
