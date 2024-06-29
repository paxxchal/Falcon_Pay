<?php
require "header.php";
?>


<div class="container my-4 py-4">
    
    
     <div class="modal fade action-sheet" id="verify-modal" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header h3">
            Verify your account
        </div>
        <div class="modal-body">
            <form method="post" id="verify-form" enctype="multipart/form-data">
                <div class="form-group m-2 p-4">
                    
                
                <label class="form-label">
                    Upload your Drivers License, International passport or any Government issued Document
                </label>
                <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                <input type="file" class="form-control" name="kyc" id="kyc" required/>
                </div>
                <div class="form-group ">
                    <button  id="uploadKyc" type="submit" name="uploadKyc" class="btn btn-secondary" accept="image/*">Verify Account</button>
                </div>
                
            </form>
            
        </div>
    </div>
    </div>
</div>
<div class="row my-4 py-4">
   
   <div class="col-12 col-sm-12 col-lg-5 mx-auto">
       <div class="card">
           <div class="card-header h3">
               KYC Verification Status
           </div>
           <div class="card-body">
              
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 5px 0;
        
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      .checkmark {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        padding: 10px;
        border-radius: 4px;
       
        display: inline-block;
        margin: 0 auto;
      }
    </style>
     
      <div class="card">
     
          <?php
          if($kyc_status=="approved"){
              ?>
               <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✓</i>
              </div>
                <h1>Success</h1> 
                <p class="text-white">Your KYC application has been approved.</p>
              
              <?php
          }
          elseif($kyc_status=="not verified"){
              ?>
              
              <div class="alert alert-secondary my-2">
                  Please Upload your KYC Information to access full features of ctcreditconnect
              </div>
               <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verify-modal">
                Verify now
                </button>
              
              <?php
          }
          else{
              ?>
               <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark" style="color: #f9b81f">!</i>
              </div>
                <h1>Pending</h1> 
                <p class="text-white">Your KYC application is pending. You would be contacted once our team has reviewed your account.</p>
              <?php
          }
          ?>
       
      </div>
     
<script>
    document.getElementById("uploadKyc").addEventListener("click", function(event){
  event.preventDefault()
  var form=document.getElementById("verify-form");
  var fd=new FormData(form);
  $.ajax({
      type: 'post',
      url: 'ajax/kyc.php',
      data: fd,
      cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(data){
            $("#uploadKyc").html("<i class='fa fa-spinner fa-spin'></i>")
        },
        success: function(data){
            swal('Great',data,'success')
            .then(()=>{
                location.replace('kyc')
            })
        }
  })
});
</script>
   
           </div>
       </div>
   </div>
</div>
</div>

<?php
require "footer.php"
?>