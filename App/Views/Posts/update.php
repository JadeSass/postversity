<?php include sectionStart; ?>
<div class="row">
<div class="card card-body bg-light col-md-4 mx-auto mt-3">
    <h2>Add Post</h2>
    <p>Create a post with this form</p>
    <form action="<?php echo URL; ?>/posts/update/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="image">Image: <sup>*</sup></label>
        <input type="file" name="image" class="form-control form-control-lg" value="<?php echo $data['image']; ?>/>
    </div>
    <div class="form-group">
        <label for="body">Body: <sup>*</sup></label>
        <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
    </div>

    <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
</div>
<?php include sectionStop; ?>