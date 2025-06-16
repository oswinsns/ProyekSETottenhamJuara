<?php include 'db_connect.php' ?>
<style>
  /* Modern Dashboard Styling */
  :root {
    --primary: #4361ee;
    --secondary: #3f37c9;
    --success: #4cc9f0;
    --info: #4895ef;
    --warning: #f72585;
    --danger: #e63946;
    --light: #f8f9fa;
    --dark: #212529;
  }
  
  body {
    background-color: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  .main-container {
    padding: 2rem;
    background-color: #f0f2f5;
  }
  
  /* Welcome Banner */
  .welcome-banner {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    border-radius: 15px;
    padding: 2rem;
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
  }
  
  .welcome-banner::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: rgba(255, 255, 255, 0.1);
    transform: rotate(30deg);
  }
  
  .welcome-banner h2 {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
  }
  
  .welcome-banner p {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0;
    position: relative;
    z-index: 1;
  }
  
  .welcome-icon {
    position: absolute;
    right: 2rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 5rem;
    opacity: 0.2;
  }
  
  /* Stats Cards */
  .stats-container {
    margin-bottom: 2.5rem;
  }
  
  .stat-card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 7px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
    border: none;
  }
  
  .stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }
  
  .stat-card-header {
    padding: 1.5rem;
    position: relative;
    z-index: 1;
    height: 100%;
  }
  
  .stat-card-users {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
  }
  
  .stat-card-topics {
    background: linear-gradient(135deg, #4895ef, #4cc9f0);
  }
  
  .stat-card-tags {
    background: linear-gradient(135deg, #f72585, #b5179e);
  }
  
  .stat-card-icon {
    position: absolute;
    right: 1.5rem;
    bottom: 1.5rem;
    font-size: 4rem;
    opacity: 0.2;
    color: white;
  }
  
  .stat-card-value {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .stat-card-label {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
  }
  
  /* Tags Section */
  .section-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
    position: relative;
  }
  
  .section-header::after {
    content: "";
    flex-grow: 1;
    height: 2px;
    background: linear-gradient(to right, var(--primary), transparent);
    margin-left: 1rem;
  }
  
  .section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark);
    margin: 0;
    display: flex;
    align-items: center;
  }
  
  .section-icon {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
  }
  
  /* Tag Cards */
  .tag-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    height: 100%;
    border: none;
    position: relative;
  }
  
  .tag-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }
  
  .tag-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background: linear-gradient(to bottom, #4361ee, #3a0ca3);
  }
  
  .tag-card-body {
    padding: 1.5rem;
  }
  
  .tag-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
  }
  
  .tag-icon {
    color: var(--primary);
    margin-right: 0.75rem;
    background: rgba(67, 97, 238, 0.1);
    width: 30px;
    height: 30px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .tag-description {
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.5;
  }
  
  /* PERUBAHAN: Blok CSS Responsif yang lebih lengkap */
  @media (max-width: 991px) { /* Target tablet dan di bawahnya */
    .stat-card-header {
       padding: 1.25rem;
       display: flex;
       flex-direction: column;
       justify-content: center;
       text-align: center;
    }
    .stat-card-icon {
       position: static;
       margin-top: 0.5rem;
       font-size: 2.5rem;
       opacity: 0.3;
       transform: none;
       align-self: center;
    }
  }

  @media (max-width: 768px) {
    .main-container {
      padding: 1rem;
    }
    
    .welcome-banner {
      padding: 1.5rem;
      text-align: center;
    }

    .welcome-banner h2 {
      font-size: 1.5rem;
    }

    .welcome-banner p {
      font-size: 0.9rem;
    }
    
    .welcome-icon {
      display: none; 
    }
    
    .section-title {
        font-size: 1.3rem;
    }

    .stat-card-value {
      font-size: 2rem;
    }

    .stat-card-label{
        font-size: 0.85rem;
    }

    .tag-card-body {
        padding: 1.25rem;
    }
  }
</style>

<div class="main-container">
  <div class="welcome-banner">
    <h2><i class="fa fa-user-circle mr-2"></i> Hello, <?php echo $_SESSION['login_name']; ?>!</h2>
    <p>Welcome back to your dashboard. Here's an overview of your forum.</p>
    <i class="fa fa-tachometer-alt welcome-icon"></i>
  </div>
  
  <div class="row stats-container">
    <div class="col-lg-4 mb-4">
      <div class="stat-card">
        <div class="stat-card-header stat-card-users">
          <div class="stat-card-value"><?php echo $conn->query("SELECT * FROM users")->num_rows; ?></div>
          <div class="stat-card-label">Total Users</div>
          <i class="fa fa-users stat-card-icon"></i>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4 mb-4">
      <div class="stat-card">
        <div class="stat-card-header stat-card-topics">
          <div class="stat-card-value"><?php echo $conn->query("SELECT * FROM topics")->num_rows; ?></div>
          <div class="stat-card-label">Forum Topics</div>
          <i class="fa fa-comments stat-card-icon"></i>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4 mb-4">
      <div class="stat-card">
        <div class="stat-card-header stat-card-tags">
          <div class="stat-card-value"><?php echo $conn->query("SELECT * FROM categories")->num_rows; ?></div>
          <div class="stat-card-label">Available Tags</div>
          <i class="fa fa-tags stat-card-icon"></i>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section-header">
    <div class="section-icon">
      <i class="fa fa-tags"></i>
    </div>
    <h3 class="section-title">Forum Tags</h3>
  </div>
  
  <div class="row">
    <?php
     $tags = $conn->query("SELECT * FROM categories order by id DESC");
     while($row=$tags->fetch_assoc()):
    ?>
    <div class="col-12 mb-4">
      <div class="tag-card">
        <div class="tag-card-body">
          <div class="tag-name">
            <div class="tag-icon">
              <i class="fa fa-tag"></i>
            </div>
            <?php echo $row['name'] ?>
          </div>
          <div class="tag-description">
            <?php echo $row['description'] ?>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<script>
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }
</script>