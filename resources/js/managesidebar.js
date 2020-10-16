var the_parents=document.getElementsByClassName('the_parent');
var showHideMenu=document.getElementById('show-hide-menu')
showHideMenu.onclick=function(){
    this.classList.toggle('toggle-the-menu')
    document.getElementById('admin-side-bar').classList.toggle('toggle-the-menu')
}
for(var i=0; i<the_parents.length; i++){
if(the_parents[i].classList.contains('active-links')){
    var the_child=the_parents[i].nextElementSibling
    the_child.style.maxHeight=the_child.scrollHeight + "px"
}
    the_parents[i].onclick=function(){
        this.classList.toggle('is-open');
        var the_child=this.nextElementSibling;
        if(the_child.style.maxHeight){
            // the menu is open we need to close it 
            the_child.style.maxHeight=null;
        }
        else{
            //the menu is closed we need to open it  
            the_child.style.maxHeight=the_child.scrollHeight + "px"
        }
    }
}
