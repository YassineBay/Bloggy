$(document).ready(function(){
$("#AddUpdate").val("Add");
$("#lbl_cat_name").html("Add new Category");    
$('.alert-danger').hide();
$('.alert-info').hide();
$('#addSuccess').hide();
$('#UpdateSuccess').hide();
let currentItemID ="";
function loadData() {
    var table = document.getElementById("tab_body");
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET","./functions/CategoryActions/fetchAll.php",true);
    xhttp.onload = () =>{
            if(xhttp.status === 404){
                $("table").hide();
                $('.alert-info').html("No Data Found");
                $('.alert-info').show();
                $('.alert-danger').hide();

            }
            if(xhttp.status === 200){
            table.innerHTML = xhttp.responseText;
            }
        
    }
        xhttp.send();

    }
function fetchSignle(id){
      var params = "id="+id;
      let cat_title = "";
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST","./functions/CategoryActions/fetchSingle.php",true);
      xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhttp.onload = ()=>{
       $("#cat_name").val(xhttp.responseText);
    }
    xhttp.send(params);
}    
loadData();
function AddCategory(){
    var cat_name = $("#cat_name").val();
    var params = "cat_name="+cat_name;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST","./functions/CategoryActions/add.php",true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onload = () =>{
        $('#addSuccess').html("Added Successfully");
        $('#addSuccess').show();
        $('.alert-danger').hide();
        $("#cat_name").val("");
        loadData();
    }
    xhttp.send(params);
}
function UpdateCategory(id){
    var cat_name = $("#cat_name").val();
    var params = "cat_name="+cat_name+"&id="+id;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST","./functions/CategoryActions/update.php",true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onload = () =>{
          $('#UpdateSuccess').html("Updated Successfully");
        $('#UpdateSuccess').show();
        $('.alert-danger').hide();
        $("#cat_name").val("");
        $("#AddUpdate").val("Add");
        loadData();
    }
    xhttp.send(params);
}
$(document).on('click', '.btn-danger', function(e){
      e.preventDefault();
      if (confirm("Do you really want to delete this category ?")) {
          var id = $(this).attr("id");
      var params = "id="+id;
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST","./functions/CategoryActions/delete.php",true);
      xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhttp.onload = ()=>{
        console.log(xhttp.responseText);
        loadData();
    }
    xhttp.send(params);
  }


      
  });  
$(document).on('click','.edit',(e)=>{
        e.preventDefault();
        $("#AddUpdate").val("Update");
        $("#lbl_cat_name").html("Update Category");    
        currentItemID =e.target.id; 
        fetchSignle(currentItemID);   
});
$(document).on('click','#AddUpdate',(e)=>{
    e.preventDefault();
    if($("#cat_name").val() !== "" && e.target.value==="Add"){
        AddCategory();
    }
    if($("#cat_name").val() !== "" && e.target.value==="Update"){
        UpdateCategory(currentItemID);
        $("#lbl_cat_name").html("Add new Category");    

    }
    if($("#cat_name").val() === "") {
        $('.alert-danger').html("The Field Should not be empty");
        $('#addSuccess').hide();
        $('#UpdateSuccess').hide();
        $('.alert-danger').show();
    }
});
});




