<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form  enctype="multipart/form-data" >
                            <div class="form-group">

                                <label>Name of Album   </label>
                                <input type="text" name="name" v-model="editrecord.name" class="form-control" maxlength="15">


                            </div>
                            <div class="form-group">
                                <label>Description of Album</label>
                                <textarea class="form-control"  maxlength="200" name="description" v-model="editrecord.description"></textarea>

                            </div>
                            <div class="form-group">
                                <label>Category of Album</label>

                                <select class="form-control" name="category" v-model="editrecord.category_id" >

                                    <option v-for="(category,index) in categories"
                                            :key="index" :value="category.id" >
                                        {{category.name}}


                                    </option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image of Album</label>
                                <input type="file" name="image" class="form-control" v-on:change="onImageChange">

                            </div>
                            <div class="form-group">

                                <button class="btn btn-secondary" type="submit">Update Album</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default{
    props:['editrecord'],
    data(){
        return{
            categories:[],
            image:''

        }
    },
    created(){
        this.getCategories();
    },
    methods:{
        onImageChange(e){
            console.log(e)
            this.image = e.target.files[0];

        },

        getCategories(){
            axios.get('/api/category').then((response)=>{
                this.categories = response.data
            }).catch((error)=>{
                alert('unable to fetch categories')
            })
        },
        // getAlbum(){
        //     axios.get('/api/album').then((response)=>{
        //         this.albums = response.data
        //         console.log(this.albums);
        //     }).catch((error)=>{
        //         alert('unable to fetch albums')
        //     })
        // },
    },

}

</script>
