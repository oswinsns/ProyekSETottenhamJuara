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
  }
  
  .navbar-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 0.5rem 1.5rem;
  }
  
  .navbar-brand-section {
    display: flex;
    align-items: center;
  }
  
  .navbar-brand-text {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--white);
    margin-left: 0.5rem;
    letter-spacing: 0.5px;
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
  
  /* Responsive adjustments */
  @media (max-width: 992px) {
    .navbar-brand-text {
      font-size: 1rem;
    }
    
    .search-section {
      max-width: 300px;
      margin: 0 1rem;
    }
  }
  
  @media (max-width: 768px) {
    .navbar-container {
      flex-wrap: wrap;
      padding: 0.5rem 1rem;
    }
    
    .navbar-brand-section {
      flex: 0 0 auto;
    }
    
    .search-section {
      flex: 1 0 100%;
      max-width: 100%;
      margin: 0.5rem 0;
      order: 3;
    }
    
    .user-section {
      flex: 0 0 auto;
    }
    
    .user-name {
      display: none;
    }
  }
</style>

<nav class="navbar navbar-light fixed-top navbar-modern">
  <div class="navbar-container">
    <div class="navbar-brand-section">
      <div class="logo">
        <i class="fa fa-comments"></i>
      </div>
      <div class="navbar-brand-text">Oswin Hotspurs Forum</div>
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
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
  $('#find').keypress(function(e){
    if(e.which == 13){
      $('#manage-search').submit()
    }
  })
  $('#manage-search').submit(function(e){
    e.preventDefault()
    location.href = "index.php?page=search&keyword="+$('#find').val()
  })
</script>
