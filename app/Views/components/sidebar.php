 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string()=='')?"":"collapsed"?>" href=".">
      <i class="bi bi-grid"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string()=='cart')?"":"collapsed"?>" href="<?php echo base_url()?>cart">
      <i class="bi bi-cart"></i>
      <span>Cart</span>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string()=='history')?"":"collapsed"?>" href="<?php echo base_url()?>history">
      <i class="bi bi-clock-history"></i>
      <span>Order History</span>
    </a>
  </li>
  <!-- Admin only -->
  <?php
  if(session()->get('role')=='admin'){
    ?>
  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string()=='products')?"":"collapsed"?>" href="<?php echo base_url()?>products">
      <i class="bi bi-card-list"></i>
      <span>Product</span>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string()=='user')?"":"collapsed"?>" href="<?php echo base_url()?>user">
      <i class="bi bi-people-fill"></i>
      <span>User</span>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link <?php echo (uri_string()=='transaction')?"":"collapsed"?>" href="<?php echo base_url()?>transaction">
      <i class="bi bi-cash"></i>
      <span>Transaction</span>
    </a>
  </li>
    <?php
  }
  ?>
  

 

</ul>

</aside><!-- End Sidebar-->