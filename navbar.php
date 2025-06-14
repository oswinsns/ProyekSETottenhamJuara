<style>
  /* Modern Sidebar Styling */
  :root {
    --primary: #4e73df;
    --primary-dark: #3a5fc7;
    --secondary: #858796;
    --success: #1cc88a;
    --info: #36b9cc;
    --warning: #f6c23e;
    --danger: #e74a3b;
    --light: #f8f9fc;
    --dark: #5a5c69;
    --white: #ffffff;
  }
  
  /* Modern Sidebar */
  nav#sidebar {
    position: fixed;
    top: 60px; /* Align exactly with topbar height */
    left: 0;
    height: calc(100vh - 60px); /* Full height minus topbar */
    width: 250px;
    background: linear-gradient(180deg, #2c3e50, #1a252f) !important;
    box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
    z-index: 100;
    overflow-y: auto;
    transition: all 0.3s ease;
  }
  
  /* Hide scrollbar but allow scrolling */
  nav#sidebar::-webkit-scrollbar {
    width: 5px;
  }
  
  nav#sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
  }
  
  nav#sidebar::-webkit-scrollbar-track {
    background: transparent;
  }
  
  .sidebar-header {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }
  
  .sidebar-brand {
    color: white;
    font-size: 1.2rem;
    font-weight: 600;
    letter-spacing: 0.5px;
  }
  
  .sidebar-list {
    padding: 15px 0;
  }
  
  .sidebar-list a {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 500;
    transition: all 0.3s;
    border-left: 3px solid transparent;
    margin: 2px 0;
  }
  
  .sidebar-list a:hover {
    background: rgba(78, 115, 223, 0.2);
    color: white;
    border-left-color: var(--primary);
  }
  
  .sidebar-list a.active {
    background: rgba(78, 115, 223, 0.3);
    color: white;
    border-left-color: var(--primary);
  }
  
  .icon-field {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    margin-right: 12px;
    background: rgba(78, 115, 223, 0.2);
    border-radius: 8px;
    transition: all 0.3s;
  }
  
  .sidebar-list a:hover .icon-field {
    background: rgba(78, 115, 223, 0.4);
  }
  
  .sidebar-list a.active .icon-field {
    background: var(--primary);
  }
  
  .icon-field i {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
  }
  
  .nav-text {
    font-weight: 500;
  }
  
  .sidebar-footer {
    padding: 15px 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    position: absolute;
    bottom: 0;
    width: 100%;
    text-align: center;
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.8rem;
  }
  
  /* Content area adjustment for sidebar */
  .content-wrapper {
    margin-left: 250px;
    padding-top: 60px; /* Match topbar height */
    min-height: 100vh;
    transition: all 0.3s;
  }
  
  /* Responsive sidebar */
  @media (max-width: 768px) {
    nav#sidebar {
      width: 70px;
    }
    
    .sidebar-header {
      padding: 15px 5px;
    }
    
    .sidebar-brand {
      display: none;
    }
    
    .sidebar-list a {
      padding: 15px 5px;
      justify-content: center;
    }
    
    .icon-field {
      margin-right: 0;
    }
    
    .nav-text {
      display: none;
    }
    
    .content-wrapper {
      margin-left: 70px;
    }
    
    .sidebar-footer {
      display: none;
    }
  }
</style>

<nav id="sidebar" class='mx-lt-5'>
  <div class="sidebar-list">
    <a href="index.php?page=home" class="nav-item nav-home">
      <span class='icon-field'><i class="fa fa-home"></i></span>
      <span class="nav-text">Home</span>
    </a>
    <a href="index.php?page=categories" class="nav-item nav-categories">
      <span class='icon-field'><i class="fa fa-tags"></i></span>
      <span class="nav-text">Category/Tags</span>
    </a>
    <a href="index.php?page=topics" class="nav-item nav-topics">
      <span class='icon-field'><i class="fa fa-comment"></i></span>
      <span class="nav-text">Discussion</span>
    </a>
    <?php if($_SESSION['login_type'] == 1): ?>
    <a href="index.php?page=users" class="nav-item nav-users">
      <span class='icon-field'><i class="fa fa-users"></i></span>
      <span class="nav-text">Users</span>
    </a>
    <?php endif; ?>
  </div>
  
  <div class="sidebar-footer">
    &copy; <?php echo date('Y'); ?> Forum System
  </div>
</nav>

<script>
  $('.nav_collapse').click(function(){
    console.log($(this).attr('href'))
    $($(this).attr('href')).collapse()
  })
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
