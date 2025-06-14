<?php include('db_connect.php');?>

<style>
  /* Modern Topics Page Styling */
  :root {
    --primary: #4361ee;
    --secondary: #3f37c9;
    --success: #4cc9f0;
    --info: #4895ef;
    --warning: #f72585;
    --danger: #e63946;
    --light: #f8f9fa;
    --dark: #212529;
    --gradient-primary: linear-gradient(135deg, #4361ee, #3a0ca3);
    --gradient-secondary: linear-gradient(135deg, #4895ef, #4cc9f0);
    --shadow-sm: 0 2px 4px rgba(0,0,0,0.1);
    --shadow-md: 0 4px 12px rgba(0,0,0,0.15);
    --shadow-lg: 0 8px 25px rgba(0,0,0,0.15);
    --border-radius: 12px;
    --border-radius-lg: 16px;
  }
  
  body {
    background-color: #f0f2f5;
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  /* Center the main container content */
  .main-container {
    padding: 2rem;
    background-color: #f0f2f5;
    padding-top: 80px;
    transition: margin-left 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center; /* Center all content */
  }
  
  /* Center the page header */
  .page-header {
    background: var(--gradient-primary);
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    width: 100%;
    max-width: 1000px; /* Match topics container width */
  }
  
  .page-header::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: rgba(255, 255, 255, 0.1);
    transform: rotate(30deg);
  }
  
  .page-header-content {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }
  
  .page-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
  }
  
  .page-title i {
    margin-right: 0.75rem;
    font-size: 2rem;
  }
  
  .page-subtitle {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0.5rem 0 0 0;
  }
  
  /* Create Topic Button */
  .create-topic-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: var(--border-radius);
    padding: 12px 24px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .create-topic-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-2px);
    color: white;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
  }
  
  /* Center the topics container */
  .topics-container {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    max-width: 1000px; /* Set maximum width */
    margin: 0 auto; /* Center the container */
  }
  
  .topics-header {
    background: linear-gradient(135deg, rgba(67, 97, 238, 0.1), rgba(58, 12, 163, 0.05));
    padding: 1.5rem 2rem;
    border-bottom: 1px solid rgba(67, 97, 238, 0.1);
  }
  
  .topics-header h5 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
    display: flex;
    align-items: center;
  }
  
  .topics-header .header-icon {
    background: var(--gradient-primary);
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.75rem;
    box-shadow: var(--shadow-sm);
  }
  
  /* Center the topics list */
  .topics-list {
    padding: 1.5rem 2rem;
    display: flex;
    flex-direction: column;
    align-items: center; /* Center align the topic items */
  }
  
  .topic-item {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: var(--border-radius);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
    width: 100%; /* Full width within the centered container */
    max-width: 900px; /* Maximum width for topic cards */
  }
  
  .topic-item:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(67, 97, 238, 0.2);
  }
  
  .topic-item::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: var(--gradient-primary);
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .topic-item:hover::before {
    opacity: 1;
  }
  
  /* Topic Header */
  .topic-header {
    padding: 1.5rem;
    border-bottom: 1px solid #f0f0f0;
    position: relative;
  }
  
  .topic-actions {
    position: absolute;
    top: 1rem;
    right: 1rem;
    display: flex;
    gap: 0.5rem;
  }
  
  .topic-dropdown {
    background: #f8f9fa;
    border: none;
    border-radius: 8px;
    padding: 8px 12px;
    color: #6c757d;
    transition: all 0.2s ease;
  }
  
  .topic-dropdown:hover {
    background: #e9ecef;
    color: var(--primary);
  }
  
  .topic-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
  }
  
  .topic-date {
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
  }
  
  .topic-author {
    background: rgba(76, 201, 240, 0.1);
    color: #0891b2;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
  }
  
  .topic-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--dark);
    text-decoration: none;
    line-height: 1.4;
    display: block;
    margin-bottom: 0.75rem;
    transition: color 0.2s ease;
  }
  
  .topic-title:hover {
    color: var(--primary);
    text-decoration: none;
  }
  
  /* Topic Content */
  .topic-content {
    padding: 0 1.5rem 1.5rem;
  }
  
  .topic-excerpt {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  
  /* Topic Footer */
  .topic-footer {
    padding: 1rem 1.5rem;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }
  
  .topic-stats {
    display: flex;
    gap: 1rem;
    align-items: center;
  }
  
  .stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
  }
  
  .stat-views {
    background: rgba(108, 117, 125, 0.1);
    color: #6c757d;
  }
  
  .stat-comments {
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
  }
  
  .topic-tags {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    flex-wrap: wrap;
  }
  
  .topic-tags-label {
    font-size: 0.85rem;
    color: #6c757d;
    font-weight: 500;
  }
  
  .topic-tag {
    background: var(--gradient-secondary);
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s ease;
  }
  
  .topic-tag:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
    color: white;
    text-decoration: none;
  }
  
  /* Center empty state */
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #6c757d;
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
  }
  
  .empty-state i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
  }
  
  .empty-state h4 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }
  
  .empty-state p {
    font-size: 1rem;
    margin-bottom: 2rem;
  }
  
  /* Responsive Design */
  @media (max-width: 1024px) {
    .main-container {
    
      padding: 1.5rem;
    }
    
    .topics-container,
    .page-header {
      max-width: 100%;
      margin: 0 auto;
    }
  }
  
  @media (max-width: 768px) {
    .main-container {
      margin-left: 0;
      padding: 1rem;
      padding-top: 120px;
    }
    
    .topics-list {
      padding: 1rem;
    }
    
    .topic-item {
      max-width: 100%;
    }
  }
  
  @media (max-width: 480px) {
    .main-container {
      padding: 0.5rem;
      padding-top: 100px;
    }
    
    .page-header {
      padding: 1rem;
      margin-bottom: 1rem;
    }
    
    .page-title {
      font-size: 1.3rem;
    }
    
    .topic-item {
      margin-bottom: 1rem;
    }
    
    .topic-header,
    .topic-content,
    .topic-footer {
      padding: 0.75rem;
    }
    
    .topic-title {
      font-size: 1.1rem;
    }
    
    .topic-stats {
      flex-direction: column;
      align-items: flex-start;
      gap: 0.5rem;
    }
  }
</style>

<div class="main-container">
  <!-- Page Header -->
  <div class="page-header">
    <div class="page-header-content">
      <div>
        <h1 class="page-title">
          <i class="fa fa-comments"></i>
          Forum Discussions
        </h1>
        <p class="page-subtitle">Explore and participate in community discussions</p>
      </div>
      <button class="btn create-topic-btn" id="new_topic">
        <i class="fa fa-plus"></i>
        Create New Topic
      </button>
    </div>
  </div>
  
  <!-- Topics Container -->
  <div class="topics-container">
    <div class="topics-header">
      <h5>
        <div class="header-icon">
          <i class="fa fa-list"></i>
        </div>
        Recent Topics
      </h5>
    </div>
    
    <div class="topics-list">
      <?php
      // Get categories for tags
      $tag = $conn->query("SELECT * FROM categories order by name asc");
      while($row = $tag->fetch_assoc()):
        $tags[$row['id']] = $row['name'];
      endwhile;
      
      // Get topics
      $topic = $conn->query("SELECT t.*,u.name FROM topics t inner join users u on u.id = t.user_id order by unix_timestamp(date_created) desc");
      $topic_count = $topic->num_rows;
      
      if($topic_count > 0):
        while($row = $topic->fetch_assoc()):
          $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
          unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
          $desc = strtr(html_entity_decode($row['content']),$trans);
          $desc = str_replace(array("<li>","</li>"), array("",","), $desc);
          $view = $conn->query("SELECT * FROM forum_views where topic_id=".$row['id'])->num_rows;
          $comments = $conn->query("SELECT * FROM comments where topic_id=".$row['id'])->num_rows;
          $replies = $conn->query("SELECT * FROM replies where comment_id in (SELECT id FROM comments where topic_id=".$row['id'].")")->num_rows;
      ?>
      
      <div class="topic-item">
        <!-- Topic Header -->
        <div class="topic-header">
          <?php if($_SESSION['login_id'] == $row['user_id'] || $_SESSION['login_type'] == 1): ?>
          <div class="topic-actions">
            <div class="dropdown">
              <button class="topic-dropdown dropdown-toggle" type="button" data-toggle="dropdown">
                <i class="fa fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item edit_topic" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">
                  <i class="fa fa-edit mr-2"></i> Edit Topic
                </a>
                <a class="dropdown-item delete_topic" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">
                  <i class="fa fa-trash mr-2"></i> Delete Topic
                </a>
              </div>
            </div>
          </div>
          <?php endif; ?>
          
          <div class="topic-meta">
            <span class="topic-date">
              <i class="fa fa-calendar mr-1"></i>
              <?php echo date('M d, Y', strtotime($row['date_created'])) ?>
            </span>
            <span class="topic-author">
              <i class="fa fa-user mr-1"></i>
              <?php echo $row['name'] ?>
            </span>
          </div>
          
          <a href="index.php?page=view_forum&id=<?php echo $row['id'] ?>" class="topic-title">
            <?php echo $row['title'] ?>
          </a>
        </div>
        
        <!-- Topic Content -->
        <div class="topic-content">
          <p class="topic-excerpt"><?php echo strip_tags($desc) ?></p>
        </div>
        
        <!-- Topic Footer -->
        <div class="topic-footer">
          <div class="topic-stats">
            <div class="stat-item stat-views">
              <i class="fa fa-eye"></i>
              <span><?php echo number_format($view) ?> views</span>
            </div>
            <div class="stat-item stat-comments">
              <i class="fa fa-comments"></i>
              <span><?php echo number_format($comments) ?> comments<?php echo $replies > 0 ? ' • '.number_format($replies).' replies':'' ?></span>
            </div>
          </div>
          
          <div class="topic-tags">
            <span class="topic-tags-label">Tags:</span>
            <?php 
            foreach(explode(",",$row['category_ids']) as $cat):
              if(isset($tags[$cat])):
            ?>
            <span class="topic-tag"><?php echo $tags[$cat] ?></span>
            <?php 
              endif;
            endforeach; 
            ?>
          </div>
        </div>
      </div>
      
      <?php 
        endwhile;
      else:
      ?>
      
      <!-- Empty State -->
      <div class="empty-state">
        <i class="fa fa-comments"></i>
        <h4>No Topics Yet</h4>
        <p>Be the first to start a discussion in this forum!</p>
        <button class="btn create-topic-btn" id="new_topic_empty">
          <i class="fa fa-plus"></i>
          Create First Topic
        </button>
      </div>
      
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // Create topic functionality
  $('#new_topic, #new_topic_empty').click(function(){
    uni_modal("Create New Topic","manage_topic.php",'mid-large')
  });
  
  // Edit topic
  $('.edit_topic').click(function(){
    uni_modal("Edit Topic","manage_topic.php?id="+$(this).attr('data-id'),'mid-large')
  });
  
  // Delete topic
  $('.delete_topic').click(function(){
    _conf("Are you sure you want to delete this topic?","delete_topic",[$(this).attr('data-id')],'mid-large')
  });
  
  // Pagination (if JPaging is available)
  if(typeof $.fn.JPaging !== 'undefined') {
    $('.topics-list').JPaging({
      pageSize: 10,
      visiblePageSize: 8
    });
  }
});

function delete_topic($id){
  start_load()
  $.ajax({
    url:'ajax.php?action=delete_topic',
    method:'POST',
    data:{id:$id},
    success:function(resp){
      if(resp==1){
        alert_toast("Topic successfully deleted",'success')
        setTimeout(function(){
          location.reload()
        },1500)
      }
    }
  })
}
</script>
