<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT t.*,u.name FROM topics t inner join users u on u.id = t.user_id where t.id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
$comments = $conn->query("SELECT c.*,u.name,u.username FROM comments c inner join users u on u.id = c.user_id where c.topic_id= ".$_GET['id']." order by unix_timestamp(c.date_created) asc");
$com_arr= array();
while($row= $comments->fetch_assoc()){
	$com_arr[] = $row;
}
$replies = $conn->query("SELECT r.*,u.name,u.username FROM replies r inner join users u on u.id = r.user_id where r.comment_id in (SELECT id FROM comments where topic_id= ".$_GET['id'].") order by unix_timestamp(r.date_created) asc");
$rep_arr= array();
while($row= $replies->fetch_assoc()){
	$rep_arr[$row['comment_id']][] = $row;
}
if($user_id != $_SESSION['login_id']){
$chk = $conn->query("SELECT * FROM forum_views where  topic_id=$id and user_id='{$_SESSION['login_id']}' ")->num_rows;
if($chk <= 0){
	$conn->query("INSERT INTO forum_views set  topic_id=$id , user_id='{$_SESSION['login_id']}' ");
}
}
$view = $conn->query("SELECT * FROM forum_views where topic_id=$id")->num_rows;
$tags = array();
if(!empty($category_ids)){
$tag = $conn->query("SELECT * FROM categories where id in ($category_ids) order by name asc");
	while($row= $tag->fetch_assoc()):
		$tags[$row['id']] = $row['name'];
	endwhile;
}
}
?>

<style>
/* Modern Forum View Styling */
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

.container-field {
  padding: 2rem;
  padding-top: 80px;
  transition: margin-left 0.3s ease;
}

/* Modern Card Styling */
.card {
  border: none;
  border-radius: var(--border-radius-lg);
  box-shadow: var(--shadow-md);
  margin-bottom: 2rem;
  overflow: hidden;
  background: white;
}

.card-body {
  padding: 2rem;
}

/* Topic Header */
.topic-header {
  background: var(--gradient-primary);
  color: white;
  padding: 2rem;
  margin: -2rem -2rem 2rem -2rem;
  position: relative;
  overflow: hidden;
}

.topic-header::before {
  content: "";
  position: absolute;
  top: -50%;
  right: -50%;
  width: 100%;
  height: 200%;
  background: rgba(255, 255, 255, 0.1);
  transform: rotate(30deg);
}

.topic-meta {
  position: relative;
  z-index: 1;
  display: flex;
  gap: 1rem;
  margin-bottom: 1rem;
  flex-wrap: wrap;
}

.topic-date, .topic-author {
  background: rgba(255, 255, 255, 0.2);
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 500;
}

.topic-title {
  position: relative;
  z-index: 1;
  font-size: 2rem;
  font-weight: 700;
  margin: 0;
  line-height: 1.3;
}

.topic-actions {
  position: absolute;
  top: 1rem;
  right: 1rem;
  z-index: 2;
}

.topic-dropdown {
  background: rgba(255, 255, 255, 0.2);
  border: none;
  border-radius: 8px;
  padding: 8px 12px;
  color: white;
  transition: all 0.2s ease;
}

.topic-dropdown:hover {
  background: rgba(255, 255, 255, 0.3);
}

/* Topic Content */
#content {
  max-height: 60vh;
  overflow: auto;
  line-height: 1.6;
  color: #333;
  padding: 1rem 0;
}

#content pre {
  background: #f8f9fa;
  padding: 1rem;
  border-radius: 8px;
  border-left: 4px solid var(--primary);
}

/* Topic Stats */
.topic-stats {
  display: flex;
  gap: 1rem;
  margin: 1rem 0;
  flex-wrap: wrap;
}

.badge {
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: 500;
  font-size: 0.85rem;
}

.badge-secondary {
  background: rgba(108, 117, 125, 0.1) !important;
  color: #6c757d !important;
}

.badge-primary {
  background: rgba(67, 97, 238, 0.1) !important;
  color: var(--primary) !important;
}

.badge-info {
  background: var(--gradient-secondary) !important;
  color: white !important;
}

.badge-default {
  background: rgba(108, 117, 125, 0.1) !important;
  color: #6c757d !important;
}

/* Comments Section */
.comments-header {
  background: #f8f9fa;
  padding: 1.5rem 2rem;
  margin: -2rem -2rem 2rem -2rem;
  border-bottom: 1px solid #e9ecef;
}

.comments-header h3 {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--dark);
  margin: 0;
  display: flex;
  align-items: center;
}

.comments-header h3 i {
  margin-right: 0.75rem;
  color: var(--primary);
}

/* Comment Item */
.comment {
  background: white;
  border: 1px solid #e0e0e0;
  border-radius: var(--border-radius);
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  position: relative;
  transition: all 0.3s ease;
}

.comment:hover {
  box-shadow: var(--shadow-sm);
  border-color: rgba(67, 97, 238, 0.2);
}

.comment-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 1rem;
}

.comment-author {
  font-weight: 700;
  color: var(--dark);
  font-size: 1rem;
}

.comment-username {
  color: var(--primary);
  font-style: italic;
  font-size: 0.9rem;
}

.comment-date {
  color: #6c757d;
  font-size: 0.85rem;
}

.comment-content {
  color: #333;
  line-height: 1.6;
  margin-bottom: 1rem;
}

/* Reply Button */
.c_reply {
  background: var(--primary) !important;
  border-color: var(--primary) !important;
  color: white !important;
  border-radius: 8px;
  padding: 8px 16px;
  font-size: 0.85rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.c_reply:hover {
  background: var(--secondary) !important;
  border-color: var(--secondary) !important;
  transform: translateY(-1px);
  box-shadow: var(--shadow-sm);
}

.c_reply i {
  margin-right: 0.5rem;
}

/* Replies Section */
.replies {
  background: #f8f9fa;
  border-radius: var(--border-radius);
  padding: 1rem;
  margin-top: 1rem;
}

.ty-compact-list {
  background: #e8f5e8;
  border: 1px solid #c3e6c3;
  border-radius: 8px;
  padding: 1rem;
  margin-bottom: 1rem;
  position: relative;
}

.ty-compact-list::before {
  content: '';
  position: absolute;
  left: -1rem;
  top: 1rem;
  width: 0.75rem;
  height: 2px;
  background: #28a745;
}

.show_all {
  color: var(--primary);
  font-weight: 500;
  text-decoration: none;
  font-size: 0.9rem;
}

.show_all:hover {
  text-decoration: underline;
  color: var(--secondary);
}

/* Reply Form */
.reply-field {
  background: #f8f9fa;
  border-radius: var(--border-radius);
  padding: 1.5rem;
  margin: 1rem 0;
  border-left: 4px solid var(--primary);
}

.reply-field .form-control {
  border: 2px solid #e9ecef;
  border-radius: 8px;
  padding: 0.75rem;
  transition: all 0.3s ease;
}

.reply-field .form-control:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
}

.reply-field .btn-primary {
  background: var(--primary);
  border-color: var(--primary);
  border-radius: 8px;
  padding: 0.75rem 1.5rem;
  font-weight: 600;
  transition: all 0.3s ease;
}

.reply-field .btn-primary:hover {
  background: var(--secondary);
  border-color: var(--secondary);
  transform: translateY(-1px);
}

/* Main Comment Form */
#manage-comment {
  background: #f8f9fa;
  border-radius: var(--border-radius);
  padding: 1.5rem;
  border-left: 4px solid var(--primary);
}

#manage-comment .form-control {
  border: 2px solid #e9ecef;
  border-radius: 8px;
  padding: 0.75rem;
  min-height: 120px;
  transition: all 0.3s ease;
}

#manage-comment .form-control:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
}

#manage-comment .btn-primary {
  background: var(--primary);
  border-color: var(--primary);
  border-radius: 8px;
  padding: 0.75rem 2rem;
  font-weight: 600;
  font-size: 1rem;
  transition: all 0.3s ease;
}

#manage-comment .btn-primary:hover {
  background: var(--secondary);
  border-color: var(--secondary);
  transform: translateY(-2px);
  box-shadow: var(--shadow-sm);
}

/* Dropdown Styling */
.dropleft .dropdown-menu {
  border: none;
  border-radius: 8px;
  box-shadow: var(--shadow-md);
  padding: 0.5rem 0;
}

.dropdown-item {
  padding: 0.75rem 1.25rem;
  font-weight: 500;
  transition: all 0.2s ease;
}

.dropdown-item:hover {
  background: rgba(67, 97, 238, 0.1);
  color: var(--primary);
}

/* Divider */
.divider {
  border: none;
  height: 2px;
  background: linear-gradient(to right, var(--primary), transparent);
  margin: 2rem 0;
}

/* Responsive */
@media (max-width: 1024px) {
  .container-field {
    margin-left: 70px;
    padding: 1.5rem;
  }
}

@media (max-width: 768px) {
  .container-field {
    margin-left: 0;
    padding: 1rem;
    padding-top: 120px;
  }
  
  .topic-title {
    font-size: 1.5rem;
  }
  
  .ty-compact-list {
    margin-left: 1rem;
  }
}

@media (max-width: 480px) {
  .container-field {
    padding: 0.5rem;
    padding-top: 100px;
  }
  
  .card-body {
    padding: 1rem;
  }
  
  .topic-header {
    padding: 1rem;
    margin: -1rem -1rem 1rem -1rem;
  }
  
  .comments-header {
    padding: 1rem;
    margin: -1rem -1rem 1rem -1rem;
  }
}
</style>

<div class="container-field">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<!-- Topic Header -->
				<div class="topic-header">
					<?php if($_SESSION['login_id'] == $user_id || $_SESSION['login_type'] == 1): ?>
					<div class="topic-actions">
						<div class="dropleft">
							<a class="topic-dropdown" href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="fa fa-ellipsis-v"></span>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item edit_topic" data-id="<?php echo $id ?>" href="javascript:void(0)">
									<i class="fa fa-edit mr-2"></i> Edit Topic
								</a>
								<a class="dropdown-item delete_topic" data-id="<?php echo $id ?>" href="javascript:void(0)">
									<i class="fa fa-trash mr-2"></i> Delete Topic
								</a>
							</div>
						</div>
					</div>
					<?php endif; ?>
					
					<div class="topic-meta">
						<span class="topic-date">
							<i class="fa fa-calendar mr-1"></i>
							<?php echo date('M d, Y h:i A', strtotime($date_created)) ?>
						</span>
						<span class="topic-author">
							<i class="fa fa-user mr-1"></i>
							<?php echo ucwords($name) ?>
						</span>
					</div>
					<h1 class="topic-title"><?php echo $title ?></h1>
				</div>

				<!-- Tags -->
				<?php if(count($tags) > 0): ?>
				<div class="topic-stats">
					<span class="badge badge-default">
						<i class="fa fa-tags mr-1"></i> Tags:
					</span>
					<?php foreach(explode(',',$category_ids) as $t): ?>
						<span class="badge badge-info"><?php echo $tags[$t] ?></span>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<!-- Stats -->
				<div class="topic-stats">
					<span class="badge badge-secondary">
						<i class="fa fa-eye mr-1"></i>
						<?php echo number_format($view) ?> views
					</span>
					<span class="badge badge-primary">
						<i class="fa fa-comments mr-1"></i>
						<?php echo number_format(count($com_arr)) ?> comments
					</span>
				</div>

				<!-- Content -->
				<div id="content" class="w-100 mt-4">
					<?php echo html_entity_decode($content) ?>
				</div>
			</div>
		</div>

		<!-- Comments Section -->
		<div class="card">
			<div class="card-body">
				<div class="comments-header">
					<h3><i class="fa fa-comments"></i> Comments</h3>
				</div>

				<div class="col-lg-12">
					<?php foreach($com_arr as $row): ?>
					<div class="form-group comment">
						<div class="comment-header">
							<div>
								<div class="comment-author"><?php echo $row['name'] ?></div>
								<div class="comment-username">@<?php echo $row['username'] ?></div>
							</div>
							<div style="text-align: right;">
								<div class="comment-date">
									<i class="fa fa-clock mr-1"></i>
									<?php echo date('M d, Y h:i A', strtotime($row['date_created'])) ?>
								</div>
								<?php if($_SESSION['login_id'] == $row['user_id']): ?>
								<div class="dropleft mt-2">
									<a class="text-dark" href="javascript:void(0)" data-toggle="dropdown">
										<span class="fa fa-ellipsis-v"></span>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item edit_comment" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">
											<i class="fa fa-edit mr-2"></i> Edit
										</a>
										<a class="dropdown-item delete_comment" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">
											<i class="fa fa-trash mr-2"></i> Delete
										</a>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="comment-content">
							<?php echo html_entity_decode($row['comment']) ?>
						</div>

						<div>
							<button class="btn c_reply" data-id='<?php echo $row['id'] ?>'>
								<i class="fa fa-reply"></i> Reply
							</button>
							<?php if(isset($rep_arr[$row['id']])): ?>
							<span class="text-primary ml-3">
								<i class="fa fa-comments mr-1"></i>
								<?php echo count($rep_arr[$row['id']]) . (count($rep_arr[$row['id']]) > 1 ? ' Replies' : ' Reply') ?>
							</span>
							<?php endif; ?>

							<?php if(isset($rep_arr[$row['id']])): ?>
							<div class="replies mt-3">
								<a href="javascript:void(0)" class="show_all" style="display: none">Show all replies</a>
								<?php foreach($rep_arr[$row['id']] as $rep): ?>
								<div class="form-group ty-compact-list">
									<div class="comment-header">
										<div>
											<div class="comment-author"><?php echo $rep['name'] ?></div>
											<div class="comment-username">@<?php echo $rep['username'] ?></div>
										</div>
										<div style="text-align: right;">
											<div class="comment-date">
												<i class="fa fa-clock mr-1"></i>
												<?php echo date('M d, Y h:i A', strtotime($rep['date_created'])) ?>
											</div>
											<?php if($_SESSION['login_id'] == $rep['user_id']): ?>
											<div class="dropleft mt-2">
												<a class="text-dark" href="javascript:void(0)" data-toggle="dropdown">
													<span class="fa fa-ellipsis-v"></span>
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item edit_reply" data-id="<?php echo $rep['id'] ?>" href="javascript:void(0)">
														<i class="fa fa-edit mr-2"></i> Edit
													</a>
													<a class="dropdown-item delete_reply" data-id="<?php echo $rep['id'] ?>" href="javascript:void(0)">
														<i class="fa fa-trash mr-2"></i> Delete
													</a>
												</div>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="comment-content">
										<?php echo html_entity_decode($rep['reply']) ?>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>

				<hr class="divider">

				<!-- Main Comment Form -->
				<div class="col-lg-12">
					<form action="" id="manage-comment">
						<div class="form-group">
							<input type="hidden" name="id" value="">
							<input type="hidden" name="topic_id" value="<?php echo isset($id) ? $id : '' ?>">
							<textarea class="form-control jqte" id="comment-txt" name="comment" cols="30" rows="5" placeholder="Share your thoughts on this topic..."></textarea>
						</div>
						<button class="btn btn-primary">
							<i class="fa fa-paper-plane mr-2"></i> Post Comment
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Reply Form Template (tetap sama) -->
<div id="reply_clone" style="display: none;">
	<div class="col-lg-8 offset-lg-2 reply-field">
		<hr>
		<form action="" id="">
			<div class="form-group">
				<input type="hidden" name="id" value="">
				<input type="hidden" name="comment_id" value="">
				<textarea class="form-control" name="" cols="30" rows="5" placeholder="Write your reply..."></textarea>
			</div>
			<button class="btn btn-primary">
				<i class="fa fa-reply mr-2"></i> Reply
			</button>
		</form>
	</div>
</div>

<script>
// Semua JavaScript tetap sama - tidak diubah
$('.jqte').jqte()
$('.edit_topic').click(function(){
	uni_modal("Edit Topic","manage_topic.php?id="+$(this).attr('data-id'),'mid-large')
})
$('.edit_comment').click(function(){
	uni_modal("Edit Comment","manage_comment.php?id="+$(this).attr('data-id'),'mid-large')
})
$('.edit_reply').click(function(){
	uni_modal("Edit Reply","manage_reply.php?id="+$(this).attr('data-id'),'mid-large')
})

$('.replies').each(function(){
	if ($(this).find('.ty-compact-list').length > 4) {
		var i = $(this).find('.ty-compact-list').length - 5;
		for(i; i >= 0 ; i--){
		$(this).find('.ty-compact-list:nth("'+i+'")').hide()
		}
	  $(this).find('.show_all').show();
	}
})

$('.replies .show_all').click(function(){
	var i = $(this).siblings('.ty-compact-list').length - 5;
	for(i; i >= 0 ; i--){
	$(this).siblings('.ty-compact-list:nth("'+i+'")').toggle()
	}
	if($(this).text() == 'Show all replies')
		$(this).text('Show less')
	else
		$(this).text('Show all replies')
})

$('.c_reply').click(function(){
	if($('.reply-field[data-id="'+$(this).attr('data-id')+'"]').length >0){
		return false;
	}else{
		$('.comment .reply-field').remove()
	}
	var rtf= $('#reply_clone .reply-field').clone()
	rtf.find('form').attr('id','manage-reply')
	rtf.find('[name="comment_id"]').val($(this).attr('data-id'))
	rtf.find('textarea').attr({'name':"reply",'id':"reply-txt"}).jqte()
	rtf.attr('data-id',$(this).attr('data-id'))
	if($(this).parent().parent().find('.replies').length > 0)
	$(this).parent().parent().find('.replies').parent().after(rtf)
	else
	$(this).parent().append(rtf)
	submit_reply_func()
})

$('.delete_topic').click(function(){
	_conf("Are you sure to delete this topic?","delete_topic",[$(this).attr('data-id')],'mid-large')
})

function delete_topic($id){
	start_load()
	$.ajax({
		url:'ajax.php?action=delete_topic',
		method:'POST',
		data:{id:$id},
		success:function(resp){
			if(resp==1){
				alert_toast("Data successfully deleted",'success')
				setTimeout(function(){
					location.reload()
				},1500)
			}
		}
	})
}

function submit_reply_func(){
	$('#manage-reply').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_reply',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
}

$('#manage-comment').submit(function(e){
	e.preventDefault()
	start_load()
	$.ajax({
		url:'ajax.php?action=save_comment',
		method:'POST',
		data:$(this).serialize(),
		success:function(resp){
			if(resp == 1){
				alert_toast("Data successfully saved.",'success')
				setTimeout(function(){
					location.reload()
				},1000)
			}
		}
	})
})

$('.delete_comment').click(function(){
	_conf("Are you sure to delete this comment?","delete_comment",[$(this).attr('data-id')],'mid-large')
})

function delete_comment($id){
	start_load()
	$.ajax({
		url:'ajax.php?action=delete_comment',
		method:'POST',
		data:{id:$id},
		success:function(resp){
			if(resp==1){
				alert_toast("Data successfully deleted",'success')
				setTimeout(function(){
					location.reload()
				},1500)
			}
		}
	})
}

$('.delete_reply').click(function(){
	_conf("Are you sure to delete this reply?","delete_reply",[$(this).attr('data-id')],'mid-large')
})

function delete_reply($id){
	start_load()
	$.ajax({
		url:'ajax.php?action=delete_reply',
		method:'POST',
		data:{id:$id},
		success:function(resp){
			if(resp==1){
				alert_toast("Data successfully deleted",'success')
				setTimeout(function(){
					location.reload()
				},1500)
			}
		}
	})
}
</script>
