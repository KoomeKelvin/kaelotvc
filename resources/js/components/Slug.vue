<style scoped>
    .link-wrapper{
        display:flex;
        align-items: center;
        justify-content:flex-start;
    }
    .wrapper{
        margin-left:8px;
    }
    .slug{
        background-color:yellow;
        padding: 3px 5px;
    }
    .directory-wrapper{
        height:30px;
        display:flex;
        align-items: center;
    }
</style>
<template>
<div class="link-wrapper">
    <div class="icon-wrapper wrapper">
        <i class="fa fa-link"></i>
    </div>
    <div class="directory-wrapper wrapper">
        <span>{{directory}}</span>
           <span>/{{subdirectory}}/</span>
            <span class="slug" v-show="slug && !isEditing">{{slug}}</span>
            <input type="text" v-model="slugChanged" name="slugchanged" class="input-group-sm" v-show="isEditing">
    </div>
    <div class="wrap-buttons wrapper">
        <a class="btn btn-sm btn-info" v-show="!isEditing" @click.prevent="editSlug">Edit</a>
        <a class="btn btn-sm btn-success" v-show="isEditing" @click.prevent="saveSlug">Save</a>
          <a class="btn btn-sm btn-success" v-show="isEditing" @click.prevent="resetSlug">Reset</a>
    </div>
    </div>
  
</template>

<script>
export default {
props:{
    title: {
        type: String, 
    },
    directory: {
        type:String
    },
    subdirectory: {
        type:String
    }
},
data:function(){
    return {
        api_token: this.$root.api_token,
        slug:this.setSlug(this.title),
        isEditing:false,
        slugChanged:'',
        wasEdited:false
    }
},
watch: {
title: _.debounce(function(){
    if(this.wasEdited==false) this.slug=this.setSlug(this.title); 
}, 500) 
},
    methods:{
        editSlug:function(){
       this.isEditing=true; 
       this.slugChanged=this.slug;
       this.$emit('edit', this.slug);
     
        },
        saveSlug: function(){
        if(this.slugChanged!==this.slug) this.wasEdited=true
        this.isEditing=false;
        this.slug=this.sanitizeTitle(this.slugChanged);
         this.$emit('save', this.slug);
        },
        resetSlug: function(){
            this.slug=this.setSlug(this.title);
            this.wasEdited=false;
            this.isEditing=false;
        },
        sanitizeTitle: function(title){
              var slug = "";
      // Change to lower case
      var titleLower = title.toLowerCase();
      // Letter "e"
      slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
      // Letter "a"
      slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
      // Letter "o"
      slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
      
    // the special characters
     slug = slug.replace(/♦|♣|♠|•|◘|○/gi, '');
      // Letter "u"
     slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
      // Love
      slug = slug.replace(/♥/gi, 'love');
      //   smile
        slug = slug.replace(/☺|☻/gi, 'smile');
        
        // Letter "d"
        slug = slug.replace(/đ/gi, 'd');
        // Trim the last whitespace
        slug = slug.replace(/\s*$/g, '');
        // Change whitespace to "-"
        slug = slug.replace(/\s+/g, '-');
        
        return slug;

            },
      setSlug: function(newVal, count=0){ 
          
        let slug=this.sanitizeTitle(newVal + (count > 0 ? `-${count}`: ''));
          console.log(slug);
        var vm=this;
        if(slug && this.api_token){
           
               axios.get('/api/uniqueslug', {
            params:{
                api_token: vm.api_token,
                slug:slug
            }
        }).then(function(response){
          if(response.data){
            vm.slug=slug;
            vm.$emit('slug-modified', vm.slug);
          }else{
              vm.setSlug(newVal, count+1)
          }  
             }).catch(function(error){
            console.log(error);
        })
        }
        }
    }
}
    </script>
