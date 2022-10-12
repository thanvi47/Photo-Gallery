<template>
    <div>
      <table class="table table-image" >
          <thead>
          <tr>
              <th scope="col">Sn</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Category</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(album,index) in albums">
              <th scope="row">{{index+1}}</th>
              <td class="w-25">
                  <img :src="'/album/'+album.image" class="img-fluid img-thumbnail">
              </td>
              <td>
                  {{album.name}}
              </td>
              <td> {{album.description}}</td>
              <td> {{album.category.name}}</td>
              <td>
                  <button @click.prevent="edit(album.id)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Edit
                  </button>
              </td>
              <td>
                  <button @click.prevent="deleteRecord(album.id)" type="button" class="btn btn-danger" >
                      Delete
                  </button>
              </td>
          </tr>
          </tbody>
      </table>
<edit-component :editrecord="records" @recordUpdated="recordUpdate"></edit-component>
    </div>
</template>
<script type="text/javascript">
export default {
    data(){
        return{
            albums:[],
            records:[]
        }
    },created() {
        axios.get('/getalbums').then((response)=>{
            // Swal.fire({
            //     position: 'center',
            //     icon: 'success',
            //     title: 'Your chnages has been saved',
            //     showConfirmButton: false,
            //     timer: 1500
            // })
            this.albums=response.data
        }).catch((error)=>{
            alert('unable to fetch albums')
        })
    },
    methods:{
        edit(id){
          axios.get('/api/albums/'+id).then((response)=>{
              this.records=response.data
          }).catch((error)=>{
              alert('unable to fetch album')
          })
        },
        recordUpdate(response){
            this.albums = response.data
        },deleteRecord(id){


                Swal.fire({
                    // position: 'center',
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonColor: '#3085d6',
                    // showConfirmButton: false,
                    timer: 1500
                }).then((result)=>{
                    if(result.value){
                        axios.delete('albums/'+id+'/delete').then((response)=>{
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Your chnages has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            this.albums = response.data
                        }).catch((error)=>{
                            console.log(error)
                        })
                    }
            })


        }

    }

}

</script>
