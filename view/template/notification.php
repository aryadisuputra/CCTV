<li class="nav-item dropdown">
        <a id="notification"class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true" >
          <i class="far fa-bell"></i>
            <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS total_pending FROM user WHERE status='Pending'");
                  $data=mysqli_fetch_assoc($result);
            ?>
          <span class="badge badge-warning navbar-badge"><?php echo $data['total_pending'];?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="../table-user/list_pimpinan.php" class="dropdown-item">
            <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS pending_pimpinan FROM user WHERE level ='Pimpinan' AND status='Pending'");
                  $data=mysqli_fetch_assoc($result);
            ?>
            <i class="fas fa-users mr-2"></i> <?php echo $data['pending_pimpinan'];?> New User Pimpinan
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="../table-user/list_user_tlc.php" class="dropdown-item">
            <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS pending_tlc FROM user WHERE level ='TLC' AND status='Pending'");
                  $data=mysqli_fetch_assoc($result);
            ?>
            <i class="fas fa-users mr-2"></i> <?php echo $data['pending_tlc'];?> New User TLC
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="../table-user/list_user_tl.php" class="dropdown-item">
            <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS pending_tl FROM user WHERE level ='TL' AND status='Pending'");
                  $data=mysqli_fetch_assoc($result);
            ?>
            <i class="fas fa-users mr-2"></i> <?php echo $data['pending_tl'];?> New User TL
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="../table-user/list_user_staff.php" class="dropdown-item">
            <?php
                  $result=mysqli_query($mysqli,"SELECT count(*) AS pending_staff FROM user WHERE level ='Staff' AND status='Pending'");
                  $data=mysqli_fetch_assoc($result);
            ?>
            <i class="fas fa-users mr-2"></i> <?php echo $data['pending_staff'];?> New User Staff
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>
        </div>
      </li>