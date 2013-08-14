<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'Result' => '',
)))) ?>
<?php if($match_list_first_round != null){?>
<table id="first_round">
  <tr>
    <td class="round_vertical">
      <div class="round_name">
        <?=$this -> Html -> image('result_page/result_round1.png') ?>
      </div>
    </td>
    <td class="round_horizontal">
      <table>
      	<?php 
      	foreach ($match_list_first_round as $date => $match) {?>
      	<?php
      	$i = 0;
      	foreach ($match as $m) {?>
      	<?php if($i == 0){?>
        <tr>
          <td class="date" colspan="3"><?=$date ?></td>
        </tr>
        <?php } ?>
        
        <tr>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_1']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_1']['team_1_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_1']['team_1_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
          <td class="score_result"><?=$m['m']['team_1_result'] . '-' . $m['m']['team_2_result'] ?></td>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_2']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_2']['team_2_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_2']['team_2_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
        </tr>
        <?$i++;
			}
		?>
        <?} ?>
      </table>
    </td>
  </tr>
</table>
<?php } ?>
<?php 
if($match_list_second_round != null){?>
<table class="seperate_round" id="second_round">
  <tr>
    <td class="round_vertical">
      <div class="round_name">
        <?=$this -> Html -> image('result_page/result_round2.png') ?>
      </div>
    </td>
    <td class="round_horizontal">
      <table>
      	<?php 
      	foreach ($match_list_second_round as $date => $match) {?>
      	<?php 
      	$i = 0;
      	foreach ($match as $m) {?>
      	<?php if($i == 0){?>
        <tr>
          <td class="date" colspan="3"><?=$date ?></td>
        </tr>
        <?php } ?>
        
        <tr>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_1']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_1']['team_1_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_1']['team_1_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
          <td class="score_result"><?=$m['m']['team_1_result'] . '-' . $m['m']['team_2_result'] ?></td>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_2']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_2']['team_2_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_2']['team_2_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
        </tr>
        <?$i++;
			}
		?>
        <?} ?>
      </table>
    </td>
  </tr>
</table>
<?php } ?>
<?php if($match_list_third_round != null) {?>
<table class="seperate_round" id="third_round">
  <tr>
    <td class="round_vertical">
      <div class="round_name">
        <?=$this -> Html -> image('result_page/result_round3.png') ?>
      </div>
    </td>
    <td class="round_horizontal">
      <table>
      	<?php 
      	foreach ($match_list_third_round as $date => $match) {?>
      	<?php 
      	$i = 0;
      	foreach ($match as $m) {?>
      	<?php if($i == 0){?>
        <tr>
          <td class="date" colspan="3"><?=$date ?></td>
        </tr>
        <?php } ?>
        
        <tr>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_1']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_1']['team_1_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_1']['team_1_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
          <td class="score_result"><?=$m['m']['team_1_result'] . '-' . $m['m']['team_2_result'] ?></td>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_2']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_2']['team_2_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_2']['team_2_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
        </tr>
        <?$i++;
			}
		?>
        <?} ?>
      </table>
    </td>
  </tr>
</table>
<?php } ?>
<?php if($match_list_top8_round != null) {?>
<table class="seperate_round" id="top8_round">
  <tr>
    <td class="round_vertical">
      <div class="round_name">
        <?=$this -> Html -> image('result_page/result_top8.png') ?>
      </div>
    </td>
    <td class="round_horizontal">
      <table>
      	<?php 
      	foreach ($match_list_top8_round as $date => $match) {?>
      	<?php 
      	$i = 0;
      	foreach ($match as $m) {?>
      	<?php if($i == 0){?>
        <tr>
          <td class="date" colspan="3"><?=$date ?></td>
        </tr>
        <?php } ?>
        
        <tr>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_1']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_1']['team_1_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_1']['team_1_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
          <td class="score_result"><?=$m['m']['team_1_result'] . '-' . $m['m']['team_2_result'] ?></td>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_2']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_2']['team_2_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_2']['team_2_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
        </tr>
        <?$i++;
			}
		?>
        <?} ?>
      </table>
    </td>
  </tr>
</table>
<?php } ?>
<?php if($match_list_top4_round != null) {?>
<table class="seperate_round" id="top4_round">
  <tr>
    <td class="round_vertical">
      <div class="round_name">
        <?=$this -> Html -> image('result_page/result_top4.png') ?>
      </div>
    </td>
    <td class="round_horizontal">
      <table>
      	<?php 
      	foreach ($match_list_top4_round as $date => $match) {?>
      	<?php 
      	$i = 0;
      	foreach ($match as $m) {?>
      	<?php if($i == 0){?>
        <tr>
          <td class="date" colspan="3"><?=$date ?></td>
        </tr>
        <?php } ?>
        
        <tr>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_1']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_1']['team_1_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_1']['team_1_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
          <td class="score_result"><?=$m['m']['team_1_result'] . '-' . $m['m']['team_2_result'] ?></td>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_2']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_2']['team_2_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_2']['team_2_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
        </tr>
        <?$i++;
			}
		?>
        <?} ?>
      </table>
    </td>
  </tr>
</table>
<?php } ?>
<?php if($match_list_final_round != null) {?>
<table class="seperate_round" id="final_round">
  <tr>
    <td class="round_vertical">
      <div class="round_name">
        <?=$this -> Html -> image('result_page/result_final.png') ?>
      </div>
    </td>
    <td class="round_horizontal">
      <table>
      	<?php 
      	foreach ($match_list_final_round as $date => $match) {?>
      	<?php 
      	$i = 0;
      	foreach ($match as $m) {?>
      	<?php if($i == 0){?>
        <tr>
          <td class="date" colspan="3"><?=$date ?></td>
        </tr>
        <?php } ?>
        
        <tr>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_1']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_1']['team_1_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_1']['team_1_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
          <td class="score_result"><?=$m['m']['team_1_result'] . '-' . $m['m']['team_2_result'] ?></td>
          <td>
            <div class="school_result">
              <?=$this -> Html -> image($m['team_2']['result_img_url']) ?>
              <div class="result_desc">
                <p>
                  <span class="school_city"><?=$m['team_2']['team_2_address'] ?></span></br>
                  <span class="school_name"><?=$m['team_2']['team_2_name'] ?></span>
                </p>
              </div>
            </div>
          </td>
        </tr>
        <?$i++;
			}
		?>
        <?} ?>
      </table>
    </td>
  </tr>
</table>
<?php } ?>