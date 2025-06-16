<?php include 'db_connect.php'; ?>

<style>
  /* Ultra Modern Users Page Styling */
  :root {
    --primary: #667eea;
    --primary-dark: #5a67d8;
    --secondary: #764ba2;
    --accent: #f093fb;
    --success: #48bb78;
    --warning: #ed8936;
    --danger: #f56565;
    --info: #4299e1;
    --light: #f7fafc;
    --dark: #2d3748;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-300: #d1d5db;
    --gray-400: #9ca3af;
    --gray-500: #6b7280;
    --gray-600: #4b5563;
    --gray-700: #374151;
    --gray-800: #1f2937;
    --gray-900: #111827;
    --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --gradient-accent: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --gradient-success: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --gradient-card: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
    --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --border-radius: 16px;
    --border-radius-lg: 20px;
    --border-radius-xl: 24px;
  }
  
  body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    min-height: 100vh;
  }
  
  .main-container {
    padding: 2rem;
    padding-top: 80px;
    transition: margin-left 0.3s ease;
    min-height: calc(100vh - 60px);
  }
  
  /* Glassmorphism Header */
  .page-header {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: var(--border-radius-xl);
    padding: 2.5rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-2xl);
  }
  
  .page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    opacity: 0.1;
    z-index: -1;
  }
  
  .page-header::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg);
    animation: shimmer 3s infinite;
  }
  
  @keyframes shimmer {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
  }
  
  .header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 1;
  }
  
  .header-title {
    display: flex;
    align-items: center;
    gap: 1rem;
  }
  
  .header-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    box-shadow: var(--shadow-lg);
    animation: float 3s ease-in-out infinite;
  }
  
  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
  }
  
  .header-text h1 {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    line-height: 1.2;
  }
  
  .header-text p {
    color: var(--gray-600);
    font-size: 1.1rem;
    margin: 0.5rem 0 0 0;
    font-weight: 500;
  }
  
  /* Futuristic Add Button */
  .add-user-btn {
    background: var(--gradient-accent);
    border: none;
    border-radius: var(--border-radius);
    padding: 1rem 2rem;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: var(--shadow-lg);
    position: relative;
    overflow: hidden;
  }
  
  .add-user-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
  }
  
  .add-user-btn:hover::before {
    left: 100%;
  }
  
  .add-user-btn:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--shadow-2xl);
    color: white;
  }
  
  .add-user-btn i {
    font-size: 1.1rem;
  }
  
  /* Modern Card Container */
  .users-card {
    background: var(--gradient-card);
    border-radius: var(--border-radius-xl);
    box-shadow: var(--shadow-xl);
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
  }
  
  .card-header-modern {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.05));
    padding: 2rem;
    border-bottom: 1px solid rgba(102, 126, 234, 0.1);
    position: relative;
  }
  
  .card-header-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
  }
  
  .card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--gray-800);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }
  
  .card-title-icon {
    width: 40px;
    height: 40px;
    background: var(--gradient-primary);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
  }
  
  /* Ultra Modern Table */
  .table-container {
    padding: 0;
    overflow: hidden;
  }
  
  .modern-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: transparent;
  }
  
  .modern-table thead {
    background: var(--gradient-primary);
  }
  
  .modern-table thead th {
    padding: 1.5rem 1.25rem;
    color: white;
    font-weight: 700;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: none;
    position: relative;
  }
  
  .modern-table thead th:first-child {
    border-top-left-radius: 0;
  }
  
  .modern-table thead th:last-child {
    border-top-right-radius: 0;
  }
  
  .modern-table tbody tr {
    background: white;
    transition: all 0.3s ease;
    border-bottom: 1px solid var(--gray-100);
  }
  
  .modern-table tbody tr:hover {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.02));
    transform: scale(1.01);
    box-shadow: var(--shadow-md);
  }
  
  .modern-table tbody tr:last-child {
    border-bottom: none;
  }
  
  .modern-table tbody td {
    padding: 1.5rem 1.25rem;
    border: none;
    vertical-align: middle;
    position: relative;
  }
  
  /* User Avatar & Info */
  .user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
  }
  
  .user-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
    box-shadow: var(--shadow-md);
    position: relative;
    overflow: hidden;
  }
  
  .user-avatar::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    animation: rotate 3s linear infinite;
  }
  
  @keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  .user-details h6 {
    font-weight: 700;
    color: var(--gray-800);
    margin: 0;
    font-size: 1rem;
  }
  
  .user-details small {
    color: var(--gray-500);
    font-size: 0.85rem;
  }
  
  /* Modern Badges */
  .user-type-badge {
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: none;
    position: relative;
    overflow: hidden;
  }
  
  .badge-admin {
    background: var(--gradient-accent);
    color: white;
    box-shadow: var(--shadow-sm);
  }
  
  .badge-staff {
    background: var(--gradient-success);
    color: white;
    box-shadow: var(--shadow-sm);
  }
  
  .badge-user {
    background: linear-gradient(135deg, var(--gray-400), var(--gray-500));
    color: white;
    box-shadow: var(--shadow-sm);
  }
  
  /* Futuristic Action Buttons */
  .action-dropdown {
    position: relative;
  }
  
  .action-btn {
    background: var(--gradient-primary);
    border: none;
    border-radius: 12px;
    padding: 0.75rem 1.25rem;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-sm);
    position: relative;
    overflow: hidden;
  }
  
  .action-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.3s;
  }
  
  .action-btn:hover::before {
    left: 100%;
  }
  
  .action-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    color: white;
  }
  
  .dropdown-menu-modern {
    background: white;
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-xl);
    padding: 0.5rem 0;
    margin-top: 0.5rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }
  
  .dropdown-item-modern {
    padding: 0.75rem 1.25rem;
    color: var(--gray-700);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    transition: all 0.2s ease;
    border: none;
    background: none;
  }
  
  .dropdown-item-modern:hover {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.05));
    color: var(--primary);
    transform: translateX(5px);
  }
  
  .dropdown-item-modern.delete:hover {
    background: linear-gradient(135deg, rgba(245, 101, 101, 0.1), rgba(245, 101, 101, 0.05));
    color: var(--danger);
  }
  
  .dropdown-item-modern i {
    width: 16px;
    text-align: center;
  }
  
  /* Loading Animation */
  .loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer-loading 1.5s infinite;
  }
  
  @keyframes shimmer-loading {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
  }
  
  /* Responsive Design */
  @media (max-width: 1024px) {
    .main-container {
      margin-left: 70px;
      padding: 1.5rem;
    }
  }
  
  @media (max-width: 768px) {
    .main-container {
      margin-left: 0;
      padding: 1rem;
      padding-top: 120px;
    }
    
    .page-header {
      padding: 1.5rem;
    }
    
    .header-content {
      flex-direction: column;
      gap: 1.5rem;
      align-items: flex-start;
    }
    
    .header-text h1 {
      font-size: 2rem;
    }
    
    .add-user-btn {
      width: 100%;
      justify-content: center;
    }
    
    .card-header-modern {
      padding: 1.5rem;
    }
    
    .modern-table {
      font-size: 0.9rem;
    }
    
    .modern-table thead th,
    .modern-table tbody td {
      padding: 1rem 0.75rem;
    }
    
    .user-info {
      flex-direction: column;
      text-align: center;
      gap: 0.5rem;
    }
    
    .user-avatar {
      width: 40px;
      height: 40px;
      font-size: 1rem;
    }
  }
  
  @media (max-width: 480px) {
    .main-container {
      padding: 0.5rem;
      padding-top: 100px;
    }
    
    .page-header {
      padding: 1rem;
    }
    
    .header-text h1 {
      font-size: 1.5rem;
    }
    
    .modern-table thead th,
    .modern-table tbody td {
      padding: 0.75rem 0.5rem;
    }
    
    .user-type-badge {
      padding: 0.4rem 0.8rem;
      font-size: 0.7rem;
    }
    
    .action-btn {
      padding: 0.6rem 1rem;
      font-size: 0.8rem;
    }
  }
</style>

<div class="main-container">
  <!-- Glassmorphism Header -->
  <div class="page-header">
    <div class="header-content">
      <div class="header-title">
        <div class="header-icon">
          <i class="fa fa-users"></i>
        </div>
        <div class="header-text">
          <h1>User Management</h1>
          <p>Manage system users and their permissions</p>
        </div>
      </div>
      <button class="btn add-user-btn" id="new_user">
        <i class="fa fa-plus"></i>
        <span>Add New User</span>
      </button>
    </div>
  </div>
  
  <!-- Modern Users Card -->
  <div class="users-card">
    <div class="card-header-modern">
      <h5 class="card-title">
        <div class="card-title-icon">
          <i class="fa fa-list"></i>
        </div>
        System Users
      </h5>
    </div>
    
    <div class="table-container">
      <table class="modern-table" id="usersTable">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>User Information</th>
            <th class="text-center">Username</th>
            <th class="text-center">User Type</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $type = array("", "Admin", "Staff", "Alumnus/Alumna");
          $type_classes = array("", "badge-admin", "badge-staff", "badge-user");
          $users = $conn->query("SELECT * FROM users order by name asc");
          $i = 1;
          while($row = $users->fetch_assoc()):
            $initials = strtoupper(substr($row['name'], 0, 1) . substr(strstr($row['name'], ' '), 1, 1));
          ?>
          <tr>
            <td class="text-center">
              <span class="font-weight-bold text-primary"><?php echo $i++ ?></span>
            </td>
            <td>
              <div class="user-info">
                <div class="user-avatar">
                  <?php echo $initials ?: substr($row['name'], 0, 2) ?>
                </div>
                <div class="user-details">
                  <h6><?php echo ucwords($row['name']) ?></h6>
                  <small>Member since <?php echo date('M Y', strtotime($row['date_created'] ?? 'now')) ?></small>
                </div>
              </div>
            </td>
            <td class="text-center">
              <code class="bg-light px-2 py-1 rounded"><?php echo $row['username'] ?></code>
            </td>
            <td class="text-center">
              <span class="user-type-badge <?php echo $type_classes[$row['type']] ?>">
                <?php echo $type[$row['type']] ?>
              </span>
            </td>
            <td class="text-center">
              <div class="action-dropdown dropdown">
                <button class="action-btn dropdown-toggle" type="button" data-toggle="dropdown">
                  <i class="fa fa-cog"></i>
                  <span>Actions</span>
                </button>
                <div class="dropdown-menu dropdown-menu-modern dropdown-menu-right">
                  <a class="dropdown-item dropdown-item-modern edit_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                    <i class="fa fa-edit"></i>
                    <span>Edit User</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item dropdown-item-modern delete delete_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                    <i class="fa fa-trash"></i>
                    <span>Delete User</span>
                  </a>
                </div>
              </div>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // Initialize DataTable with modern styling
  $('#usersTable').DataTable({
    "pageLength": 10,
    "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
    "responsive": true,
    "language": {
      "search": "Search users:",
      "lengthMenu": "Show _MENU_ users per page",
      "info": "Showing _START_ to _END_ of _TOTAL_ users",
      "paginate": {
        "first": "First",
        "last": "Last",
        "next": "Next",
        "previous": "Previous"
      }
    },
    "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
           '<"row"<"col-sm-12"tr>>' +
           '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    "drawCallback": function() {
      // Re-bind events after table redraw
      bindUserEvents();
    }
  });
  
  // Bind events
  bindUserEvents();
  
  function bindUserEvents() {
    // New user
    $('#new_user').off('click').on('click', function(){
      uni_modal('Add New User','manage_user.php', 'large')
    });
    
    // Edit user
    $('.edit_user').off('click').on('click', function(){
      uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'), 'large')
    });
    
    // Delete user
    $('.delete_user').off('click').on('click', function(){
      _conf("Are you sure you want to delete this user?","delete_user",[$(this).attr('data-id')])
    });
  }
});

function delete_user($id){
  start_load()
  $.ajax({
    url:'ajax.php?action=delete_user',
    method:'POST',
    data:{id:$id},
    success:function(resp){
      if(resp==1){
        alert_toast("User successfully deleted",'success')
        setTimeout(function(){
          location.reload()
        },1500)
      }
    }
  })
}
</script>
