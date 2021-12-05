<?php
include_once 'header.php';
?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<body>
    <!-- Page content -->
        <div class="col-xl-10 order-xl-1 p-2 m-auto">
            <div class="card-header bg-white border-0">
              <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <div class="h5 mt-4">
                  <h1 class="ni business_briefcase-24 mr-2 m-auto"><?php echo $_SESSION['username'];?></h1>
                </div>
                <div>

                <img style="width: 80px;"src='uploads/university/<?php echo $_SESSION['useruniveristy'] . ".png"?>' alt="Content img">
                <h5 class="ni education_hat mr-2"><?php echo $_SESSION['useruid'];?></h5>
                  <h5 class="ni education_hat mr-2"><?php echo $_SESSION['useremail'];?> - <?php echo $_SESSION['useruniveristy'];?></h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="includes/update.inc.php" method="post">
                <div class="pl-lg-4">
                  <h6 class="heading-small text-muted mb-2 mt-3">Update User information</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name="input-username" class="form-control form-control-alternative" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="input-email" class="form-control form-control-alternative" placeholder="Email">
                      </div>
                    </div class="col-lg-6">
                        <label class="form-control-label ml-3" for="input-university">University</label>
                        <select class="ml-3 mr-4" id="university" name="input-university">
                            <option value="FAU">FAU</option>
                            <option value="FSU">FSU</option>
                            <option value="UCF">UCF</option>
                            <option value="USF">USF</option>
                        </select>
                  </div>
                  <h6 class="heading-small text-muted mb-2 mt-3">Password</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Old Password</label>
                        <input type="text" name="input-password" class="form-control form-control-alternative" placeholder="Old Password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-new-password">New Password</label>
                        <input type="text" name="input-new-password" class="form-control form-control-alternative" placeholder="New Password">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="update" placeholder="Update">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
