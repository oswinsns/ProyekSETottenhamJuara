<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>
  /* Modern Responsive Sidebar Styling */
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
    --sidebar-width: 250px;
    --sidebar-collapsed-width: 70px;
  }
  
  /* Sidebar Container */
  nav#sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    height: calc(100vh - 60px);
    width: var(--sidebar-width);
    background: linear-gradient(180deg, #2c3e50, #1a252f) !important;
    box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    overflow-y: auto;
    overflow-x: hidden;
    transition: all 0.3s ease;
    transform: translateX(0);
  }
  
  /* Sidebar States */
  nav#sidebar.collapsed {
    width: var(--sidebar-collapsed-width);
  }
  
  nav#sidebar.mobile-hidden {
    transform: translateX(-100%);
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
  
  /* Sidebar Header */
  .sidebar-header {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
  }
  
  nav#sidebar.collapsed .sidebar-header {
    padding: 15px 5px;
  }
  
  .sidebar-brand {
    color: white;
    font-size: 1.2rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
  }
  
  nav#sidebar.collapsed .sidebar-brand {
    font-size: 0.8rem;
    opacity: 0;
  }
  
  /* Sidebar List */
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
    position: relative;
  }
  
  nav#sidebar.collapsed .sidebar-list a {
    padding: 15px 5px;
    justify-content: center;
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
  
  /* Icon Field */
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
    flex-shrink: 0;
  }
  
  nav#sidebar.collapsed .icon-field {
    margin-right: 0;
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
  
  /* Nav Text */
  .nav-text {
    font-weight: 500;
    transition: all 0.3s ease;
    white-space: nowrap;
  }
  
  nav#sidebar.collapsed .nav-text {
    opacity: 0;
    width: 0;
    overflow: hidden;
  }
  
  /* Tooltip for collapsed sidebar */
  .sidebar-tooltip {
    position: absolute;
    left: 70px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 0.85rem;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1002;
  }
  
  .sidebar-tooltip::before {
    content: '';
    position: absolute;
    left: -5px;
    top: 50%;
    transform: translateY(-50%);
    border: 5px solid transparent;
    border-right-color: rgba(0, 0, 0, 0.8);
  }
  
  nav#sidebar.collapsed .sidebar-list a:hover .sidebar-tooltip {
    opacity: 1;
    visibility: visible;
  }
  
  /* Sidebar Footer */
  .sidebar-footer {
    padding: 15px 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    position: absolute;
    bottom: 0;
    width: 100%;
    text-align: center;
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.8rem;
    transition: all 0.3s ease;
  }
  
  nav#sidebar.collapsed .sidebar-footer {
    opacity: 0;
    padding: 15px 5px;
  }
  
  /* Mobile Overlay */
  .sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
  }
  
  .sidebar-overlay.active {
    opacity: 1;
    visibility: visible;
  }
  
  /* Content area adjustment */
  .content-wrapper {
    margin-left: var(--sidebar-width);
    padding-top: 60px;
    min-height: 100vh;
    transition: all 0.3s ease;
  }
  
  .content-wrapper.collapsed {
    margin-left: var(--sidebar-collapsed-width);
  }
  
  .content-wrapper.mobile {
    margin-left: 0;
  }
  
  /* Desktop Responsive (1200px+) */
  @media (min-width: 1200px) {
    nav#sidebar {
      width: var(--sidebar-width);
    }
    
    .content-wrapper {
      margin-left: var(--sidebar-width);
    }
  }
  
  /* Tablet Responsive (769px - 1199px) */
  @media (max-width: 1199px) and (min-width: 769px) {
    nav#sidebar {
      width: var(--sidebar-collapsed-width);
    }
    
    nav#sidebar .sidebar-brand,
    nav#sidebar .nav-text,
    nav#sidebar .sidebar-footer {
      opacity: 0;
      width: 0;
      overflow: hidden;
    }
    
    nav#sidebar .sidebar-list a {
      padding: 15px 5px;
      justify-content: center;
    }
    
    nav#sidebar .icon-field {
      margin-right: 0;
    }
    
    .content-wrapper {
      margin-left: var(--sidebar-collapsed-width);
    }
  }
  
  /* Mobile Responsive (max-width: 768px) */
  @media (max-width: 768px) {
    nav#sidebar {
      transform: translateX(-100%);
      width: var(--sidebar-width);
      z-index: 1001;
    }
    
    nav#sidebar.mobile-open {
      transform: translateX(0);
    }
    
    .content-wrapper {
      margin-left: 0;
    }
    
    /* Reset collapsed styles on mobile */
    nav#sidebar .sidebar-brand,
    nav#sidebar .nav-text,
    nav#sidebar .sidebar-footer {
      opacity: 1;
      width: auto;
      overflow: visible;
    }
    
    nav#sidebar .sidebar-list a {
      padding: 12px 20px;
      justify-content: flex-start;
    }
    
    nav#sidebar .icon-field {
      margin-right: 12px;
    }
  }
  
  /* Extra Small Mobile (max-width: 480px) */
  @media (max-width: 480px) {
    nav#sidebar {
      width: 280px;
    }
  }
</style>

<!-- Mobile Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<nav id="sidebar" class='mx-lt-5'>
  <div class="sidebar-header">
    <div class="sidebar-brand">Forum System</div>
  </div>
  
  <div class="sidebar-list">
    <a href="index.php?page=home" class="nav-item nav-home">
      <span class='icon-field'>
        <i class="fa fa-home"></i>
      </span>
      <span class="nav-text">Home</span>
      <div class="sidebar-tooltip">Home</div>
    </a>
    
    <a href="index.php?page=categories" class="nav-item nav-categories">
      <span class='icon-field'>
        <i class="fa fa-tags"></i>
      </span>
      <span class="nav-text">Category/Tags</span>
      <div class="sidebar-tooltip">Category/Tags</div>
    </a>
    
    <a href="index.php?page=topics" class="nav-item nav-topics">
      <span class='icon-field'>
        <i class="fa fa-comment"></i>
      </span>
      <span class="nav-text">Discussion</span>
      <div class="sidebar-tooltip">Discussion</div>
    </a>

      <a href="index.php?page=live_classes" class="nav-item nav-categories">
      <span class='icon-field'>
       <i class="fa fa-signal"></i>
      </span>
      <span class="nav-text">Live Classes</span>
      <div class="sidebar-tooltip">Live classes</div>
    </a>
    
    <?php if($_SESSION['login_type'] == 1): ?>
    <a href="index.php?page=users" class="nav-item nav-users">
      <span class='icon-field'>
        <i class="fa fa-users"></i>
      </span>
      <span class="nav-text">Users</span>
      <div class="sidebar-tooltip">Users</div>
    </a>
    <?php endif; ?>
  </div>
  
  <div class="sidebar-footer">
    &copy; <?php echo date('Y'); ?> Forum System
  </div>
</nav>

<script>
$(document).ready(function() {
  const sidebar = $('#sidebar');
  const sidebarOverlay = $('#sidebarOverlay');
  const contentWrapper = $('.content-wrapper, .main-container');
  
  // Check screen size and set initial state
  function checkScreenSize() {
    const windowWidth = $(window).width();
    
    if (windowWidth <= 768) {
      // Mobile
      sidebar.removeClass('collapsed').addClass('mobile-hidden');
      contentWrapper.addClass('mobile');
    } else if (windowWidth <= 1199) {
      // Tablet
      sidebar.removeClass('mobile-hidden mobile-open').addClass('collapsed');
      contentWrapper.removeClass('mobile').addClass('collapsed');
      sidebarOverlay.removeClass('active');
    } else {
      // Desktop
      sidebar.removeClass('collapsed mobile-hidden mobile-open');
      contentWrapper.removeClass('mobile collapsed');
      sidebarOverlay.removeClass('active');
    }
  }
  
  // Initial check
  checkScreenSize();
  
  // Check on window resize
  $(window).resize(function() {
    checkScreenSize();
  });
  
  // Listen for sidebar toggle from topbar
  $(document).on('click', '#sidebarToggle', function() {
    const windowWidth = $(window).width();
    
    if (windowWidth <= 768) {
      // Mobile toggle
      if (sidebar.hasClass('mobile-open')) {
        sidebar.removeClass('mobile-open');
        sidebarOverlay.removeClass('active');
        $(this).removeClass('active');
      } else {
        sidebar.addClass('mobile-open');
        sidebarOverlay.addClass('active');
        $(this).addClass('active');
      }
    } else if (windowWidth <= 1199) {
      // Tablet toggle
      if (sidebar.hasClass('collapsed')) {
        sidebar.removeClass('collapsed');
        contentWrapper.removeClass('collapsed');
      } else {
        sidebar.addClass('collapsed');
        contentWrapper.addClass('collapsed');
      }
    }
  });
  
  // Close sidebar when clicking overlay
  sidebarOverlay.click(function() {
    sidebar.removeClass('mobile-open');
    sidebarOverlay.removeClass('active');
    $('#sidebarToggle').removeClass('active');
  });
  
  // Close sidebar when clicking outside on mobile
  $(document).click(function(e) {
    if ($(window).width() <= 768) {
      if (!sidebar.is(e.target) && sidebar.has(e.target).length === 0 && 
          !$('#sidebarToggle').is(e.target) && $('#sidebarToggle').has(e.target).length === 0) {
        sidebar.removeClass('mobile-open');
        sidebarOverlay.removeClass('active');
        $('#sidebarToggle').removeClass('active');
      }
    }
  });
  
  // Highlight active menu item
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>').addClass('active');
  
  // Handle menu item clicks on mobile
  $('.sidebar-list a').click(function() {
    if ($(window).width() <= 768) {
      sidebar.removeClass('mobile-open');
      sidebarOverlay.removeClass('active');
      $('#sidebarToggle').removeClass('active');
    }
  });
});
</script>
