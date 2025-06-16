<?php include('db_connect.php');?>

<style>
  /* Modern Categories Styling */
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
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  /* PERUBAHAN: Mengganti nama class menjadi .main-container agar konsisten */
  .main-container {
    padding: 2rem;
    background-color: #f0f2f5;
  }
  
  /* Page Header */
  .page-header {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    border-radius: 15px;
    padding: 2rem;
    color: white;
    margin-bottom: 1.5rem; 
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
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
  
  .page-header h2 {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
  }
  
  .page-header p {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0;
    position: relative;
    z-index: 1;
  }
  
  .header-icon {
    position: absolute;
    right: 2rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 5rem;
    opacity: 0.2;
  }
  
  /* Add Button */
  .add-category-btn {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    border: none;
    border-radius: 12px;
    padding: 12px 24px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    transition: all 0.3s ease;
    margin-bottom: 1.5rem;
  }
  
  .add-category-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
    color: white;
  }
  
  .add-category-btn i {
    margin-right: 8px;
  }

  .content-wrapper {
    max-width: 1400px;
    margin: 0 auto;
  }
  
  /* Modern Card */
  .modern-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    border: none;
    overflow: hidden;
  }
  
  .modern-card-header {
    background: linear-gradient(135deg, rgba(67, 97, 238, 0.1), rgba(58, 12, 163, 0.05));
    padding: 1.5rem;
    border-bottom: 1px solid rgba(67, 97, 238, 0.1);
  }
  
  .modern-card-header h5 {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--dark);
    margin: 0;
    display: flex;
    align-items: center;
  }
  
  .card-icon {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.75rem;
    box-shadow: 0 4px 8px rgba(67, 97, 238, 0.2);
  }
  
  .modern-card-body {
    padding: 1.5rem;
  }
  
  /* Modern Table */
  .modern-table {
    margin: 0;
    width: 100% !important; 
    border-collapse: separate;
    border-spacing: 0;
  }
  
  .modern-table thead th {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    color: white;
    font-weight: 600;
    padding: 1rem;
    border: none;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  
  .modern-table thead th:first-child {
    border-top-left-radius: 10px;
  }
  
  .modern-table thead th:last-child {
    border-top-right-radius: 10px;
  }
  
  .modern-table tbody tr {
    transition: all 0.2s ease;
  }
  
  .modern-table tbody tr:hover {
    background-color: rgba(67, 97, 238, 0.05);
  }
  
  .modern-table tbody td {
    padding: 1rem 1.5rem; 
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
  }
  
  .category-info h6 {
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
  }
  
  .category-description {
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
  }
  
  .action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
    align-items: center;
  }
  
  .action-btn {
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
  }
  
  .btn-edit {
    background-color: #4361ee;
    color: white;
  }
  
  .btn-edit:hover {
    background-color: #3a0ca3;
    color: white;
    transform: translateY(-1px);
  }
  
  .btn-delete {
    background-color: #e63946;
    color: white;
  }
  
  .btn-delete:hover {
    background-color: #d62d20;
    color: white;
    transform: translateY(-1px);
  }
  
  #categoryModal .modal-content {
    border-radius: 15px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  }
  
  #categoryModal .modal-header {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 1.5rem;
  }
  
  #categoryModal .modal-title {
    font-weight: 600;
    display: flex;
    align-items: center;
  }
  
  #categoryModal .modal-title i {
    margin-right: 0.5rem;
  }
  
  #categoryModal .modal-body {
    padding: 2rem;
  }
  
  #categoryModal .form-group label {
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.5rem;
  }
  
  #categoryModal .form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
  }
  
  #categoryModal .form-control:focus {
    border-color: #4361ee;
    box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
  }
  
  #categoryModal .modal-footer {
    padding: 1.5rem 2rem;
    border-top: 1px solid #e9ecef;
  }
  
  #categoryModal .btn-modal-save {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    border: none;
    border-radius: 10px;
    padding: 10px 24px;
    color: white;
    font-weight: 600;
  }
  
  #categoryModal .btn-modal-cancel {
    background-color: #6c757d;
    border: none;
    border-radius: 10px;
    padding: 10px 24px;
    color: white;
    font-weight: 600;
  }
  
  /* PERUBAHAN: Mengganti nama class menjadi .main-container agar konsisten */
  .main-container .dataTables_wrapper .dataTables_length,
  .main-container .dataTables_wrapper .dataTables_filter {
    float: none; 
  }

  .main-container .dataTables_wrapper > div.row:first-child {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
  }

  .main-container .dataTables_wrapper > div.row:first-child > div {
    flex-grow: 1;
  }

  .main-container .dataTables_wrapper > div.row:first-child > div:last-child {
    text-align: right;
  }

  .main-container .dataTables_wrapper .dataTables_filter input {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 6px 12px;
    margin-left: 8px;
  }
  
  .main-container .dataTables_wrapper .dataTables_length select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 4px 8px;
    margin: 0 8px;
  }
  
  .main-container .dataTables_wrapper .dataTables_info,
  .main-container .dataTables_wrapper .dataTables_paginate {
    padding-top: 1.5em;
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
  
  /* Responsive */
  @media (max-width: 768px) {
    /* PERUBAHAN: Mengganti nama class menjadi .main-container agar konsisten */
    .main-container {
      padding: 1rem;
    }
    
    .page-header {
      padding: 1.5rem;
    }
    
    .header-icon {
      font-size: 3rem;
    }
    
    .modern-table {
      font-size: 0.85rem;
    }
    
    .action-buttons {
      flex-direction: column;
      gap: 4px;
    }
    
    .action-btn {
      padding: 6px 12px;
      font-size: 0.8rem;
      width: 100%;
      justify-content: center;
    }
    
    /* PERUBAHAN: Mengganti nama class menjadi .main-container agar konsisten */
    .main-container .dataTables_wrapper > div.row:first-child {
        flex-direction: column;
        gap: 1rem;
    }
    .main-container .dataTables_wrapper > div.row:first-child > div:last-child {
        text-align: left;
    }
  }
</style>

<?php include('db_connect.php'); ?>
<!-- You can reuse your entire <style> section here or put in a shared CSS file -->

<?php
$categories = [];
$cat_q = $conn->query("SELECT * FROM categories ORDER BY name ASC");
while($cat = $cat_q->fetch_assoc()) {
  $categories[$cat['id']] = $cat['name'];
}
?>


<div class="main-container">
  <div class="page-header">
    <h2><i class="fa fa-chalkboard-teacher mr-2"></i> Live Classes</h2>
    <p>Manage upcoming live sessions for students</p>
    <i class="fa fa-video header-icon"></i>
  </div>

  <div class="content-wrapper">
    <button class="btn add-category-btn" data-toggle="modal" data-target="#classModal">
      <i class="fa fa-plus"></i> Add New Class
    </button>

   <div class="modern-card">
  <div class="modern-card-header">
    <h5>
      <div class="card-icon">
        <i class="fa fa-calendar"></i>
      </div>
      Scheduled Classes
    </h5>
  </div>
  <div class="modern-card-body">
    <table class="table modern-table" id="class-table">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th>Class Info</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        $classes = $conn->query("SELECT * FROM live_classes ORDER BY start_time ASC");
        while($row = $classes->fetch_assoc()):
        ?>
        <tr>
          <td class="text-center"><?php echo $i++ ?></td>
          <td>
            <div class="category-info">
              <h6><?php echo $row['title'] ?> - <?php echo date('M d, Y H:i', strtotime($row['start_time'])) ?></h6>
              <p class="category-description">
                <?php echo $row['description'] ?><br>
                <strong>Instructor:</strong> <?php echo $row['instructor'] ?><br>
                <strong>Link:</strong> <a href="<?php echo $row['platform_link'] ?>" target="_blank">Join</a>
              </p>
            </div>

             <div class="topic-tags">
                <span class="topic-tags-label">Tags:</span>
             <?php 
        if (!empty($row['category_ids'])) {
    foreach (explode(",", $row['category_ids']) as $cat_id) {
      if (isset($categories[$cat_id])) {
        echo '<span class="topic-tag">' . htmlspecialchars($categories[$cat_id]) . '</span>';
      }
    }
  }
  ?>
</div>
          </td>
          <td class="text-center">
            <?php if ($row['created_by'] == $_SESSION['login_id']): ?>
              <div class="action-buttons">
                <button class="btn action-btn btn-edit edit_class"
                  data-id="<?php echo $row['id'] ?>"
                  data-title="<?php echo htmlspecialchars($row['title']) ?>"
                  data-description="<?php echo htmlspecialchars($row['description']) ?>"
                  data-instructor="<?php echo htmlspecialchars($row['instructor']) ?>"
                  data-start_time="<?php echo $row['start_time'] ?>"
                  data-platform_link="<?php echo htmlspecialchars($row['platform_link']) ?>">
                  <i class="fa fa-edit"></i> Edit
                </button>
                <button class="btn action-btn btn-delete delete_class" data-id="<?php echo $row['id'] ?>">
                  <i class="fa fa-trash"></i> Delete
                </button>
              </div>
            <?php else: ?>
              <!-- Optional: You can show a dash or a message like "Not allowed" -->
              <span class="text-muted">—</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

  </div>
</div>

<!-- Modal for Add/Edit -->
<div class="modal fade" id="classModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="manage-class">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-video"></i> Class Form</h5>
          <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Instructor</label>
            <input type="text" name="instructor" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Platform Link (Zoom/Meet)</label>
            <input type="url" name="platform_link" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3" class="form-control" required></textarea>
          </div>
          <div class="form-group">
  <label for="category_ids">Tags/Categories</label>
  <select name="category_ids[]" id="category_ids" class="form-control" multiple>
    <?php foreach ($categories as $id => $name): ?>
      <option value="<?php echo $id; ?>"
        <?php if (isset($row['category_ids']) && in_array($id, explode(",", $row['category_ids']))) echo 'selected'; ?>>
        <?php echo htmlspecialchars($name); ?>
      </option>
    <?php endforeach; ?>
  </select>
  <small class="form-text text-muted">Hold Ctrl or Cmd to select multiple tags.</small>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-modal-cancel" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-modal-save">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#manage-class').submit(function(e){
    e.preventDefault()
    start_load()
    $.ajax({
      url: 'ajax.php?action=save_class',
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(resp){
        if(resp == 1 || resp == 2){
          alert_toast('Class saved successfully', 'success')
          setTimeout(() => location.reload(), 1500)
        }
      }
    })
  })

//   $('.edit_class').click(function(){
//     var form = $('#manage-class')
//     form.get(0).reset()
//     form.find('[name="id"]').val($(this).data('id'))
//     form.find('[name="title"]').val($(this).data('title'))
//     form.find('[name="description"]').val($(this).data('description'))
//     form.find('[name="instructor"]').val($(this).data('instructor'))
//     form.find('[name="start_time"]').val($(this).data('start_time'))
//     form.find('[name="platform_link"]').val($(this).data('platform_link'))
//     $('#classModal').modal('show')
//   })

$('.edit_class').click(function(){
  var form = $('#manage-class')
  form.get(0).reset()

  form.find('[name="id"]').val($(this).data('id'))
  form.find('[name="title"]').val($(this).data('title'))
  form.find('[name="description"]').val($(this).data('description'))
  form.find('[name="instructor"]').val($(this).data('instructor'))
  form.find('[name="start_time"]').val($(this).data('start_time'))
  form.find('[name="platform_link"]').val($(this).data('platform_link'))

  // Parse category_ids from hidden data or Ajax
  $.ajax({
    url: 'ajax.php?action=get_class_categories&id=' + $(this).data('id'),
    method: 'GET',
    dataType: 'json',
    success: function(resp) {
      $('#category_ids').val(resp).trigger('change')
    }
  })

  $('#classModal').modal('show')
})


  $('.delete_class').click(function(){
    _conf("Are you sure to delete this class?", "delete_class", [$(this).data('id')])
  })

  $('#class-table').dataTable()

  $('#classModal').on('hidden.bs.modal', function () {
    $('#manage-class').get(0).reset()
  })
})

function delete_class(id){
  start_load()
  $.ajax({
    url: 'ajax.php?action=delete_class',
    method: 'POST',
    data: { id },
    success: function(resp){
      if(resp == 1){
        alert_toast("Class deleted", 'success')
        setTimeout(() => location.reload(), 1500)
      }
    }
  })
}
</script>
