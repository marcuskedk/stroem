
<div class="row">
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
        <div class="col-lg-3">
            <a href="#" class="team-card">
                <div class="team-he-b">
                    <span></span>
                    <span></span>
                </div>
                <img src="<?=API_URL . '/images/team/' . $team_item['image'];?>" width="100%" alt="">
                <div class="team-he-f">
                    <span></span>
                    <span></span>
                    <div>
                        <h6><?=$team_item['name'];?></h6>
                        <p><?=$team_item['title'];?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>