<?php include sectionStart; ?>

    <div class="container">
    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
        <hr>
        <a href="<?php echo URL; ?>/posts/update/<?php echo $data['post']->id; ?>" class="btn btn-dark mb-3">Edit</a>

        <form class="pull-right float-right mb-3" action="<?php echo URL; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        <?php endif; ?>
        <div class="row">
                <div class="col-lg-12">
                    <img src="<?php echo URL; ?>/uploads/<?php echo $data['post']->image; ?>" class="img-fluid" alt="<?php echo $data['post']->title; ?>">
                    <div class="card card-body pt-1 pb-1">
                        <h4 class="card-title text-dark"><?php echo $data['post']->title; ?></h4>
                        <div class="bg-light p-2 mb-3">
                            Written by <b> <?php echo $data['user']->name; ?> </b> on <?php echo date("d/m/Y", strtotime($data['post']->created_at)); ?>
                        </div>
                        <p><?php echo $data['post']->body; ?></p>
                    </div>
                </div>
        </div>
    </div>

<?php include sectionStop; ?>