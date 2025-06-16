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
  
  .main-container {
    padding: 2rem;
    background-color: #f0f2f5;
    padding-top: 80px;
    transition: margin-left 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  /* Page Header */
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
    max-width: 1000px;
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
  
  /* Modern Card Container */
  .topics-container {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    max-width: 1000px;
    margin: 0 auto;
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
  
  /* Topic List */
  .topics-list {
    padding: 1.5rem 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .topic-item {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: var(--border-radius);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
    width: 100%;
    max-width: 900px;
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
    cursor: pointer;
    transition: all 0.2s ease;
  }
  
  .stat-comments:hover {
    background: rgba(67, 97, 238, 0.2);
    transform: translateY(-1px);
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
  
  /* Modern Comment Section */
  .comment-section {
    border-top: 1px solid #e9ecef;
    background: #f8f9fa;
    display: none;
    animation: slideDown 0.3s ease-out;
  }
  
  .comment-section.active {
    display: block;
  }
  
  @keyframes slideDown {
    from {
      opacity: 0;
      max-height: 0;
    }
    to {
      opacity: 1;
      max-height: 1000px;
    }
  }
  
  .comment-header {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid #e9ecef;
    background: white;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

      .comment-item {
  position: relative;
}
.comment-like {
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 10;
  margin-top: 50px;
}

.like-btn {
  background: rgba(255, 255, 255, 0.9);
  border: 1px solid rgba(67, 97, 238, 0.2);
  border-radius: 20px;
  padding: 6px 12px;
  color: #007bff !important;
  cursor: pointer;
  font-size: 0.85rem;
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 0.25rem;
  transition: all 0.2s ease;
  backdrop-filter: blur(5px);
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.like-btn:hover {
  background: rgba(67, 97, 238, 0.1);
  border-color: rgba(67, 97, 238, 0.3);
  color: #4361ee !important;
  /* Removed transform to prevent layout shift */
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.like-btn:active {
  /* Scale slightly on click for feedback */
  transform: scale(0.98);
}

.like-btn i {
  font-size: 0.8rem;
}

.like-count {
  font-weight: 600;
  min-width: 14px;
  text-align: center;
}

/* Alternative: Jika ingin tetap ada efek gerakan, gunakan margin compensation */
.like-btn-with-movement {
  background: rgba(255, 255, 255, 0.9);
  border: 1px solid rgba(67, 97, 238, 0.2);
  border-radius: 20px;
  padding: 6px 12px;
  color: #007bff !important;
  cursor: pointer;
  font-size: 0.85rem;
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 0.25rem;
  transition: all 0.2s ease;
  backdrop-filter: blur(5px);
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  margin-top: 1px; /* Compensation for transform */
}

.like-btn-with-movement:hover {
  background: rgba(67, 97, 238, 0.1);
  border-color: rgba(67, 97, 238, 0.3);
  color: #4361ee !important;
  transform: translateY(-1px);
  margin-top: 2px; /* Adjust margin to compensate */
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}


  
  .comment-header-icon {
    width: 32px;
    height: 32px;
    background: var(--gradient-primary);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.9rem;
  }
  
  .comment-header h6 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--dark);
    margin: 0;
  }
  
  .comment-count {
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
  }
  
  /* Comment List */
  .comment-list {
    max-height: 400px;
    overflow-y: auto;
    padding: 1rem 1.5rem;
  }
  
  .comment-list::-webkit-scrollbar {
    width: 6px;
  }
  
  .comment-list::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
  }
  
  .comment-list::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 3px;
  }
  
.comment-item {
  background: white;
  border-radius: var(--border-radius);
  padding: 1rem;
  padding-right: 80px; /* Extra space for like button */
  margin-bottom: 1rem;
  box-shadow: var(--shadow-sm);
  transition: all 0.2s ease;
  border-left: 3px solid transparent;
  position: relative;
}
  
  .comment-item:hover {
    border-left-color: var(--primary);
    transform: translateX(5px);
  }
  
  .comment-item:last-child {
    margin-bottom: 0;
  }
  
  .comment-author {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
  }
  
  .comment-avatar {
    width: 36px;
    height: 36px;
    background: var(--gradient-secondary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
  }
  
  .comment-author-info {
    flex: 1;
  }
  
  .comment-author-info h6 {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--dark);
    margin: 0;
  }
  
  .comment-date {
    font-size: 0.8rem;
    color: #6c757d;
    margin: 0;
  }
  
  .comment-content {
    color: #495057;
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
  }
  
  /* Comment Actions */
  .comment-actions {
    position: absolute;
    top: 1rem;
    right: 1rem;
    opacity: 0;
    transition: opacity 0.2s ease;
  }
  
  .comment-item:hover .comment-actions {
    opacity: 1;
  }
  
  .comment-action-btn {
    background: none;
    border: none;
    color: #6c757d;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.8rem;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-left: 4px;
  }
  
  .comment-action-btn:hover {
    background: #f8f9fa;
    color: var(--primary);
  }
  
  .comment-action-btn.delete:hover {
    color: var(--danger);
  }
  
  /* Comment Form */
  .comment-form {
    padding: 1rem 1.5rem;
    background: white;
    border-top: 1px solid #e9ecef;
  }
  
  .comment-input-group {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
  }
  
  .comment-user-avatar {
    width: 40px;
    height: 40px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    flex-shrink: 0;
  }
  
  .comment-input-container {
    flex: 1;
  }
  
  .comment-textarea {
    width: 100%;
    min-height: 80px;
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: var(--border-radius);
    font-size: 0.9rem;
    font-family: inherit;
    resize: vertical;
    transition: all 0.3s ease;
  }
  
  .comment-textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
  }
  
  .comment-textarea::placeholder {
    color: #6c757d;
  }
  
  .comment-form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 0.75rem;
  }
  
  .comment-info {
    font-size: 0.8rem;
    color: #6c757d;
  }
  
  .comment-submit-btn {
    background: var(--gradient-primary);
    border: none;
    border-radius: var(--border-radius);
    padding: 0.5rem 1.5rem;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .comment-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
  }
  
  .comment-submit-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
  }
  
  /* Empty State */
  .empty-comments {
    text-align: center;
    padding: 2rem;
    color: #6c757d;
  }
  
  .empty-comments i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    opacity: 0.5;
  }
  
  .empty-comments p {
    margin: 0;
    font-size: 0.9rem;
  }
  
  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #6c757d;
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
    
    .comment-input-group {
      flex-direction: column;
      gap: 0.75rem;
    }
    
    .comment-user-avatar {
      align-self: flex-start;
    }
    
    .comment-form-actions {
      flex-direction: column;
      gap: 0.5rem;
      align-items: flex-start;
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
    
    .comment-list {
      padding: 0.75rem;
    }
    
    .comment-form {
      padding: 0.75rem;
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
            <div class="stat-item stat-comments" onclick="toggleComments(<?php echo $row['id'] ?>)">
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
        
        <!-- Comment Section -->
        <div class="comment-section" id="comments-<?php echo $row['id'] ?>">
          <div class="comment-header">
            <div class="comment-header-icon">
              <i class="fa fa-comments"></i>
            </div>
            <h6>Discussion</h6>
            <span class="comment-count" id="comment-count-<?php echo $row['id'] ?>"><?php echo $comments ?> comments</span>
          </div>
          
          <!-- Comment List -->
          <div class="comment-list" id="comment-list-<?php echo $row['id'] ?>">
            <?php
            $topic_comments = $conn->query("SELECT c.*, u.name as user_name FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.topic_id = ".$row['id']." ORDER BY c.likes DESC, c.date_created ASC");
            if($topic_comments->num_rows > 0):
              while($comment = $topic_comments->fetch_assoc()):
                $comment_initials = strtoupper(substr($comment['user_name'], 0, 1) . substr(strstr($comment['user_name'], ' '), 1, 1));
            ?>
            <div class="comment-item" data-comment-id="<?php echo $comment['id'] ?>">
              <div class="comment-author">
                <div class="comment-avatar">
                  <?php echo $comment_initials ?: substr($comment['user_name'], 0, 2) ?>
                </div>
                <div class="comment-author-info">
                  <h6><?php echo $comment['user_name'] ?></h6>
                  <p class="comment-date"><?php echo date('M d, Y \a\t g:i A', strtotime($comment['date_created'])) ?></p>
                </div>
              </div>
              
              <!-- Comment Actions (only for comment owner or admin) -->
              <?php if($_SESSION['login_id'] == $comment['user_id'] || $_SESSION['login_type'] == 1): ?>
              <div class="comment-actions">
                <button class="comment-action-btn edit-comment" data-id="<?php echo $comment['id'] ?>" title="Edit Comment">
                  <i class="fa fa-edit"></i>
                </button>
                <button class="comment-action-btn delete delete-comment" data-id="<?php echo $comment['id'] ?>" title="Delete Comment">
                  <i class="fa fa-trash"></i>
                </button>
              </div>
              <?php endif; ?>
              
             <div class="comment-content" id="comment-content-<?php echo $comment['id'] ?>">
             <?php echo html_entity_decode($comment['comment']); ?>
            </div>
              <div class="comment-like">
            <button class="like-btn" data-id="<?php echo $comment['id'] ?>">
           <i class="fa fa-thumbs-up"></i> 
            <span class="like-count"><?php echo $comment['likes'] ?? 0 ?></span>
           </button>
           </div>

            </div>
            <?php 
              endwhile;
            else:
            ?>
            <div class="empty-comments">
              <i class="fa fa-comment-o"></i>
              <p>No comments yet. Be the first to share your thoughts!</p>
            </div>
            <?php endif; ?>
          </div>
          
          <!-- Comment Form -->
          <div class="comment-form">
            <form class="comment-form-submit" data-topic-id="<?php echo $row['id'] ?>">
              <div class="comment-input-group">
                <div class="comment-user-avatar">
                  <?php 
                  $user_initials = strtoupper(substr($_SESSION['login_name'], 0, 1) . substr(strstr($_SESSION['login_name'], ' '), 1, 1));
                  echo $user_initials ?: substr($_SESSION['login_name'], 0, 2);
                  ?>
                </div>
                <div class="comment-input-container">
                  <textarea class="comment-textarea" name="comment" placeholder="Share your thoughts on this topic..." required></textarea>
                  <div class="comment-form-actions">
                    <span class="comment-info">
                      <i class="fa fa-info-circle mr-1"></i>
                      Be respectful and constructive
                    </span>
                    <button type="submit" class="comment-submit-btn">
                      <i class="fa fa-paper-plane"></i>
                      Post Comment
                    </button>
                  </div>
                </div>
              </div>
            </form>
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
  
  // Edit comment - using existing manage_comment.php
  $(document).on('click', '.edit-comment', function(){
    const commentId = $(this).data('id');
    uni_modal("Edit Comment", "manage_comment.php?id=" + commentId, 'mid-large');
  });
  
  // Delete comment
  $(document).on('click', '.delete-comment', function(){
    const commentId = $(this).data('id');
    _conf("Are you sure you want to delete this comment?", "delete_comment", [commentId]);
  });

  $('.like-btn').click(function() {
  const $btn = $(this);
  const commentId = $btn.data('id');

  $.ajax({
    url: 'ajax.php?action=like_comment',
    method: 'POST',
    data: { id: commentId },
    success: function(resp) {
      if (resp > 0) {
        const $count = $btn.find('.like-count');
        $count.text(parseInt($count.text()) + 1);
      }
    }
  });
});
  
  // Comment form submission - using existing save_comment action
  $('.comment-form-submit').submit(function(e){
    e.preventDefault();
    
    const $form = $(this);
    const $button = $form.find('.comment-submit-btn');
    const $textarea = $form.find('.comment-textarea');
    const topicId = $form.data('topic-id');
    const comment = $textarea.val().trim();
    
    if(!comment) {
      alert('Please enter a comment');
      return;
    }
    
    // Disable button and show loading
    $button.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Posting...');
    
    $.ajax({
      url: 'ajax.php?action=save_comment',
      method: 'POST',
      data: {
        topic_id: topicId,
        comment: comment
      },
      success: function(resp) {
        if(resp == 1) {
          // Clear textarea
          $textarea.val('');
          
          // Show success message
          alert_toast('Comment posted successfully!', 'success');
          
          // Reload comments section
          loadComments(topicId);
          
          // Update comment count
          updateCommentCount(topicId);
        } else {
          alert_toast('Failed to post comment', 'error');
        }
      },
      error: function() {
        alert_toast('Error posting comment', 'error');
      },
      complete: function() {
        // Re-enable button
        $button.prop('disabled', false).html('<i class="fa fa-paper-plane"></i> Post Comment');
      }
    });
  });
  
  // Pagination (if JPaging is available)
  if(typeof $.fn.JPaging !== 'undefined') {
    $('.topics-list').JPaging({
      pageSize: 10,
      visiblePageSize: 8
    });
  }
});

// Toggle comments section
function toggleComments(topicId) {
  const $commentSection = $('#comments-' + topicId);
  
  if($commentSection.hasClass('active')) {
    $commentSection.removeClass('active').slideUp(300);
  } else {
    // Close other open comment sections
    $('.comment-section.active').removeClass('active').slideUp(300);
    
    // Open this comment section
    $commentSection.addClass('active').slideDown(300);
    
    // Load fresh comments
    loadComments(topicId);
  }
}

// Load comments for a topic
function loadComments(topicId) {
  $.ajax({
    url: 'ajax.php?action=get_comments',
    method: 'POST',
    data: { topic_id: topicId },
    success: function(resp) {
      if(resp) {
        $('#comment-list-' + topicId).html(resp);
      }
    }
  });
}

// Update comment count
function updateCommentCount(topicId) {
  $.ajax({
    url: 'ajax.php?action=get_comment_count',
    method: 'POST',
    data: { topic_id: topicId },
    success: function(resp) {
      const count = parseInt(resp) || 0;
      
      // Update comment count in stats
      const $statComments = $('[onclick="toggleComments(' + topicId + ')"] span');
      $statComments.text(count + ' comments');
      
      // Update comment count in header
      $('#comment-count-' + topicId).text(count + ' comments');
    }
  });
}

// Delete comment function
function delete_comment(commentId) {
  start_load();
  $.ajax({
    url: 'ajax.php?action=delete_comment',
    method: 'POST',
    data: { id: commentId },
    success: function(resp) {
      if(resp == 1) {
        alert_toast("Comment successfully deleted", 'success');
        
        // Find the comment item and get topic ID
        const $commentItem = $('[data-comment-id="' + commentId + '"]');
        const $commentSection = $commentItem.closest('.comment-section');
        const topicId = $commentSection.attr('id').replace('comments-', '');
        
        // Reload comments and update count
        loadComments(topicId);
        updateCommentCount(topicId);
      } else {
        alert_toast("Failed to delete comment", 'error');
      }
      end_load();
    },
    error: function() {
      alert_toast("Error deleting comment", 'error');
      end_load();
    }
  });
}

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
