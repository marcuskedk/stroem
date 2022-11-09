
    <div class="testimonial-info text-center text-white" style="background-image: url('<?=API_URL . '/images/extra/pinwheels.jpg'?>');">
        <h4>Vores <span class="text-stroem">kunder siger</span></h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <div class="line-mark justify-content-center">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="testimonial-container container">
        <div class="testimonial-slider">
            <?php foreach ($getTestimonialResult as $testimonial_key => $testimonial_item) { ?>
                <article>
                    <div class="card testimonial-card rounded-1 border-0 h-100">
                        <img src="<?=API_URL . '/images/testimonial/' . $testimonial_item['image'];?>" class="testimonial-img" alt="">
                        <div class="card-body text-center">
                            <h5 class="text-danger"><?=$testimonial_item['name'];?></h5>
                            <p class="text-stroem"><?=$testimonial_item['title'];?></p>
                            <p class="text-secondary"><?=$testimonial_item['review'];?></p>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </div>
    </div>