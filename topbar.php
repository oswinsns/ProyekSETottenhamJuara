<style>
  /* Modern Topbar Styling */
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
  
  .navbar-modern {
    padding: 0;
    min-height: 60px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    background: linear-gradient(90deg, var(--primary), #5a85e6) !important;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1050;
  }
  
  .navbar-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 0.5rem 1.5rem;
  }
  
  /* Hamburger Menu Button */
  .hamburger-menu {
    background: none;
    border: none;
    color: white;
    font-size: 1.3rem;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-right: 1rem;
    display: none;
  }
  
  .hamburger-menu:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: scale(1.05);
  }
  
  .hamburger-menu:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
  }
  
  /* Hamburger Animation */
  .hamburger-icon {
    display: inline-block;
    transition: transform 0.3s ease;
  }
  
  .hamburger-menu.active .hamburger-icon {
    transform: rotate(90deg);
  }
  
  .navbar-brand-section {
    display: flex;
    align-items: center;
    flex: 0 0 auto;
  }
  
  .navbar-brand-text {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--white);
    margin-left: 0.5rem;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
  }
  
  .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 50%;
    color: var(--primary);
    font-size: 1.25rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-right: 0.75rem;
    transition: all 0.3s;
  }
  
  .logo:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
  }
  
  .search-section {
    flex: 1;
    max-width: 400px;
    margin: 0 2rem;
  }
  
  .search-form {
    position: relative;
  }
  
  .search-input {
    width: 100%;
    padding: 0.6rem 1rem 0.6rem 2.5rem;
    border: none;
    border-radius: 50px;
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
    transition: all 0.3s;
  }
  
  .search-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
  }
  
  .search-input:focus {
    background-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    outline: none;
  }
  
  .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.7);
  }
  
  .user-section {
    display: flex;
    align-items: center;
    flex: 0 0 auto;
  }
  
  .user-dropdown {
    position: relative;
  }
  
  .user-dropdown-toggle {
    display: flex;
    align-items: center;
    color: white;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    transition: all 0.3s;
  }
  
  .user-dropdown-toggle:hover {
    background-color: rgba(255, 255, 255, 0.1);
    text-decoration: none;
    color: white;
  }
  
  .user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.5rem;
    font-size: 1rem;
    color: white;
  }
  
  .user-name {
    font-weight: 600;
    margin-right: 0.5rem;
  }
  
  .dropdown-menu-modern {
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    padding: 0.5rem 0;
    min-width: 200px;
    margin-top: 0.5rem;
  }
  
  .dropdown-item-modern {
    padding: 0.75rem 1.25rem;
    display: flex;
    align-items: center;
    color: var(--dark);
    transition: all 0.2s;
  }
  
  .dropdown-item-modern:hover {
    background-color: rgba(78, 115, 223, 0.1);
    color: var(--primary);
  }
  
  .dropdown-item-modern i {
    margin-right: 0.75rem;
    font-size: 0.9rem;
    width: 16px;
    text-align: center;
  }
  
  /* Responsive Design */
  
  /* Large Desktop (1200px+) */
  @media (min-width: 1200px) {
    .hamburger-menu {
      display: none;
    }
    
    .navbar-brand-text {
      font-size: 1.25rem;
    }
    
    .search-section {
      max-width: 500px;
      margin: 0 2rem;
    }
  }
  
  /* Desktop/Tablet (992px - 1199px) */
  @media (max-width: 1199px) and (min-width: 993px) {
    .hamburger-menu {
      display: none;
    }
    
    .navbar-brand-text {
      font-size: 1.1rem;
    }
    
    .search-section {
      max-width: 350px;
      margin: 0 1.5rem;
    }
  }
  
  /* Tablet (769px - 992px) */
  @media (max-width: 992px) and (min-width: 769px) {
    .hamburger-menu {
      display: block;
    }
    
    .navbar-brand-text {
      font-size: 1rem;
    }
    
    .search-section {
      max-width: 300px;
      margin: 0 1rem;
    }
    
    .user-name {
      display: none;
    }
  }
  
  /* Mobile Large (481px - 768px) */
  @media (max-width: 768px) and (min-width: 481px) {
    .hamburger-menu {
      display: block;
      margin-right: 0.5rem;
    }
    
    .navbar-container {
      padding: 0.5rem 1rem;
    }
    
    .navbar-brand-text {
      font-size: 0.9rem;
    }
    
    .logo {
      width: 35px;
      height: 35px;
      margin-right: 0.5rem;
    }
    
    .search-section {
      flex: 1;
      max-width: none;
      margin: 0 0.5rem;
    }
    
    .search-input {
      padding: 0.5rem 0.8rem 0.5rem 2rem;
      font-size: 0.9rem;
    }
    
    .search-icon {
      left: 0.8rem;
      font-size: 0.9rem;
    }
    
    .user-name {
      display: none;
    }
    
    .user-avatar {
      width: 28px;
      height: 28px;
      margin-right: 0;
    }
  }
  
  /* Mobile Small (max-width: 480px) */
  @media (max-width: 480px) {
    .hamburger-menu {
      display: block;
      margin-right: 0.25rem;
      padding: 6px 10px;
      font-size: 1.2rem;
    }
    
    .navbar-container {
      padding: 0.4rem 0.75rem;
      flex-wrap: wrap;
    }
    
    .navbar-brand-section {
      order: 1;
    }
    
    .user-section {
      order: 2;
    }
    
    .search-section {
      order: 3;
      flex: 1 0 100%;
      margin: 0.5rem 0 0 0;
      max-width: 100%;
    }
    
    .navbar-brand-text {
      font-size: 0.85rem;
    }
    
    .logo {
      width: 30px;
      height: 30px;
      margin-right: 0.4rem;
    }
    
    .search-input {
      padding: 0.45rem 0.75rem 0.45rem 1.8rem;
      font-size: 0.85rem;
    }
    
    .search-icon {
      left: 0.7rem;
      font-size: 0.85rem;
    }
    
    .user-name {
      display: none;
    }
    
    .user-avatar {
      width: 26px;
      height: 26px;
      margin-right: 0;
      font-size: 0.9rem;
    }
    
    .user-dropdown-toggle {
      padding: 0.4rem 0.6rem;
    }
  }
  
  /* Extra Small Mobile (max-width: 360px) */
  @media (max-width: 360px) {
    .navbar-brand-text {
      display: none;
    }
    
    .hamburger-menu {
      margin-right: 0.5rem;
    }
    
    .logo {
      margin-right: 0;
    }
  }
</style>

<nav class="navbar navbar-light fixed-top navbar-modern">
  <div class="navbar-container">
    <div class="navbar-brand-section">
      <!-- Hamburger Menu Button -->
      <button class="hamburger-menu" id="sidebarToggle" type="button">
        <i class="fa fa-bars hamburger-icon"></i>
      </button>
      
      <div class="logo">
        <i class="fa fa-comments"></i>
      </div>
      <div class="navbar-brand-text">Oswin Hotsputs Forum</div>
    </div>
    
    <div class="search-section">
      <form id="manage-search" class="search-form">
        <i class="fa fa-search search-icon"></i>
        <input type="text" placeholder="Search here" id="find" class="form-control search-input" value="<?php echo isset($_GET['keyword'])? $_GET['keyword'] :'' ?>">
      </form>
    </div>
    
    <div class="user-section">
      <div class="user-dropdown dropdown">
        <a href="#" class="user-dropdown-toggle dropdown-toggle" id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="user-avatar">
            <i class="fa fa-user"></i>
          </div>
          <span class="user-name"><?php echo $_SESSION['login_name'] ?></span>
          <i class="fa fa-chevron-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-modern dropdown-menu-right" aria-labelledby="account_settings">
          <a class="dropdown-item dropdown-item-modern" href="javascript:void(0)" id="manage_my_account">
            <i class="fa fa-cog"></i> Manage Account
          </a>
          <a class="dropdown-item dropdown-item-modern" href="ajax.php?action=logout">
            <i class="fa fa-power-off"></i> Logout
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<script>
$(document).ready(function() {
  // Account management
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  });
  
  // Search functionality
  $('#find').keypress(function(e){
    if(e.which == 13){
      $('#manage-search').submit()
    }
  });
  
  $('#manage-search').submit(function(e){
    e.preventDefault()
    location.href = "index.php?page=search&keyword="+$('#find').val()
  });
  
  // Hamburger menu animation
  $('#sidebarToggle').click(function() {
    $(this).toggleClass('active');
  });
});
</script>
