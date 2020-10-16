<template>
   <div class="col-md-2">
      
              <div v-html="marksinsystem">
                </div>
    </div>

</template>

<script>
    export default {
        props:{
            classid:{
                required:true
            },
            unitid:{
                required:true
            },
            term:{
                required:true
            }
        },
        data:function(){
            return {
                results: "Marks Entered?",
                api_token: this.$root.api_token,
                marksinsystem: ''
    
            }
        },
        watch:{
            term:_.debounce(function(){
                 this.results="Checking if marks entered....."
                let vm=this;
                if(this.term && this.unitid && this.classid){
                         axios.get('/api/marksentered', {
                      params:{
                    api_token: vm.api_token,
                    term:vm.term,
                    unitid:vm.unitid,
                    classid:vm.classid
                }
                }).then(function (response){
                    vm.marksinsystem=response.data
                }).catch(function(error){
                    console.log(error);
                });
                }
           
            }, 500)
        }
    
    }
</script>
