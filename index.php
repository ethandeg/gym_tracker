<?php include "includes/header.php" ?>
<?php 
   $rows = get_number_of_workouts();
   $total_workouts = $rows['total_workouts'];
?>

<div class="container">
   <div class="main-content">
   <div class="row mt-5">
      <div class="col-xl col-md-6 col-12">
         <div class="card">
            <div class="card-body">
               <div class="align-items-center row">
                  <div class="col">
                     <h6 class="text-uppercase text-muted mb-2">Total Workouts</h6>
                     <span class="h2 mb-0"><?php echo $total_workouts; ?></span>
                  </div>
                  <div class="col-auto">
                  <i class="icon icon_plus">&#43;</i>               
                </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl col-md-6 col-12">
         <div class="card">
            <div class="card-body">
               <div class="align-items-center row">
                  <div class="col">
                  <h6 class="text-uppercase text-muted mb-2">Value</h6>
                  <span class="h2 mb-0">$24,500</span>
                  <span class="mt-n1 ms-2 badge bg-success-soft">+3.5%</span>
                  </div>
                  <div class="col-auto">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign text-muted"><g><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></g></svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl col-md-6 col-12">
         <div class="card">
            <div class="card-body">
               <div class="align-items-center row">
                  <div class="col">
                  <h6 class="text-uppercase text-muted mb-2">Value</h6>
                  <span class="h2 mb-0">$24,500</span>
                  <span class="mt-n1 ms-2 badge bg-success-soft">+3.5%</span>
                  </div>
                  <div class="col-auto">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign text-muted"><g><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></g></svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl col-md-6 col-12">
         <div class="card">
            <div class="card-body">
               <div class="align-items-center row">
                  <div class="col">
                  <h6 class="text-uppercase text-muted mb-2">Value</h6>
                  <span class="h2 mb-0">$24,500</span>
                  <span class="mt-n1 ms-2 badge bg-success-soft">+3.5%</span>
                  </div>
                  <div class="col-auto">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign text-muted"><g><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></g></svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</div>
   
<!-- <h1 class="display-4">Gym Tracker</h1>
      <p class="lead">Stay Motivated and Efficient with this Easy-to-Use Gym Tracker</p> -->

<?php include "includes/footer.php" ?>
