<?php
require_once realpath("vendor/autoload.php");
use Job_Portal\Job;
$portal = new Job();

$jobs_portal_id = isset($_GET['id']) ? $_GET['id'] : null;

if(isset($_POST['submit'])){
    $data = array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    if($portal->update($jobs_portal_id, $data)) {
        redirect('job_fetch.php', 'Your job has been updated', 'success');
    } else {
        redirect('job_fetch.php', 'Something went wrong', 'error');
    }
}

$jobs_portal = $portal->getJob($jobs_portal_id);
$get_categories = $portal->getCategories();
?>


    <h2 class="page-header">Edit Job Listing</h2>
    <form method="post" action="job_edit.php?id=<?php echo $jobs_portal->id; ?>">
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" name="company" value="<?php echo $jobs_portal->company; ?>">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
                <option value="0">Choose Category</option>
                <?php foreach($get_categories as $category): ?>
                    <?php if($jobs_portal->category_id == $category->id) : ?>
                        <option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $jobs_portal->job_title; ?>">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"><?php echo $jobs_portal->description; ?></textarea>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" class="form-control" name="location" value="<?php echo $jobs_portal->location; ?>">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" class="form-control" name="salary" value="<?php echo $jobs_portal->salary; ?>">
        </div>
        <div class="form-group">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $jobs_portal->contact_user; ?>">
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="text" class="form-control" name="contact_email" value="<?php echo $jobs_portal->contact_email; ?>">
        </div>
        <input type="submit" class="btn btn-default" value="Submit" name="submit">
    </form>
