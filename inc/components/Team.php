
<div class="row g-4">
    <div class="col-12 text-center">
        <h4 class="fs-2">Vores <span class="text-stroem">team</span></h4>
        <p>Lorem ipsum dolor sit amet consectetur</p>
        <div class="line-mark justify-content-center">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <?php foreach ($getTeamResult as $team_key => $team_item) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
            <a href="#" class="team-card">
                <div class="team-he-b">
                    <span></span>
                </div>
                <img src="<?=API_URL . '/images/team/' . $team_item['image'];?>" width="100%" alt="">
                <div class="team-he-f">
                    <span></span>
                    <div>
                        <h6><?=$team_item['name'];?></h6>
                        <p><?=$team_item['title'];?></p>
                        <span>
                            <i class="fa fa-facebook text-white me-3"></i>
                            <i class="fa fa-twitter text-white me-3"></i>
                            <i class="fab fa-linkedin-in text-white me-3"></i>
                            <i class="fab fa-pinterest-p text-white"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>