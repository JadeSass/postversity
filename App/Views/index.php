<?php include sectionStart; ?>
<style>
.cust{
    background-position: center !important;
    background-size: cover !important;
    height: 60vh !important;
    background-repeat: no-repeat;
}
</style>

<div id="carouselExampleSlidesOnly" class="carousel slide mb-3" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo URL; ?>/img/03.jpg" class="d-block w-100 cust" alt="...">
            <div class="carousel-caption d-md-block">
                <h5 class="card-title text-dark">Share your thoughts among people</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo URL; ?>/img/07.jpg" class="d-block w-100 cust" alt="...">
            <div class="carousel-caption d-md-block">
                <h5 class="card-title text-dark">Share your ideas</h5>
            </div>
        </div>
    </div>
</div>

    <div class="container">

    <?php flash('success'); ?>
        <?php flash('danger'); ?>
        <div class="row">
            <?php foreach($data['posts'] as $post) : ?>
                <div class="col-lg-3">
                    <img src="<?php echo URL; ?>/uploads/<?php echo $post->image; ?>" class="img-fluid" alt="<?php echo $post->title; ?>">
                    <div class="card card-body pt-1 pb-1">
                        <h4 class="card-title text-dark"><a href="<?php echo URL; ?>/posts/content/<?php echo $post->postId; ?>"><?php echo $post->title; ?></a></h4>
                        <div class="bg-light p-2 mb-3">
                            Written by <b> <?php echo $post->name; ?> </b> on <?php echo date("d/m/Y", strtotime($post->postCreated)); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php include sectionStop; ?>