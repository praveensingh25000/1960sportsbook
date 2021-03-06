<?php
$show_draw_time_str = $start_prize_amount = $id = $name = $lottery_type_name = $num_lott_ball = $lottery_fee = $draw_time = $is_stuff = $is_active = $prize_level = '';
if(!empty($data[0]['Lottery'])) {
   $id			= $data[0]['Lottery']['id'];
   $name		= $data[0]['Lottery']['name'];
   $lottery_type_name   = $data[0]['Lottery']['lottery_type_name'];
   $num_lott_ball	= $data[0]['Lottery']['num_lott_ball'];
   $lottery_fee		= $data[0]['Lottery']['lottery_fee'];
   $draw_time		= $data[0]['Lottery']['draw_time'];  
   $is_stuff		= $data[0]['Lottery']['is_stuff'];  
   $is_active		= $data[0]['Lottery']['is_active'];
   $logo		= $data[0]['Lottery']['logo'];
   $prize_level		= $data[0]['Lottery']['prize_level'];
   $start_prize_amount  = $data[0]['Lottery']['start_prize_amount'];
   if($draw_time!=''){
      $draw_time_Arr  = explode('/',$draw_time);
      if(!empty($draw_time_Arr)) {
	 foreach($draw_time_Arr as $key => $draw_time_one){
	   $show_draw_time[] = date('d M Y h:i',strtotime($draw_time_one));
         }
	 $show_draw_time_str = implode(' | ' , $show_draw_time);
      }
   }
}
?>

<div id="account">
    <?php echo $this->Session->Flash(); ?>
    
    <?php echo $this->element('lottery_tab'); ?>

    <?php echo $this->Form->create();?>

    <table class="marginTable default-table">

        <tr>
            <td><label><?php echo __('Lottery Type'); ?></label></td>
            <td><label><?php echo __($lottery_type_name);?></label></td>	    
        </tr>

	<tr>
            <td><label><?php echo __('Lottery Name'); ?></label></td>
            <td><label><?php echo $name; ?></label></td>	    
        </tr>

	<tr>
            <td><label><?php echo __('Number of lottery ball'); ?></label></td>
            <td><label><?php echo $num_lott_ball; ?></label></td>
        </tr>

	<tr>
            <td><label><?php echo __('Starting Prize Amount'); ?></label></td>
            <td><label><?php echo $start_prize_amount.' '.$currency; ?></label></td>
        </tr>

	<tr>
            <td><label><?php echo __('Prize Level'); ?></label></td>
            <td><label><?php echo $prize_level; ?></label></td>
        </tr>

	<tr>
            <td><label><?php echo __('Lottery Fee'); ?></label></td>
            <td><label><?php echo $lottery_fee.' '.$currency; ?></label></td>
        </tr>

	<tr>
            <td><label><?php echo __('Lottery Logo'); ?></label></td>
            <td><label><?php
		$imagepath= '/img/lottery/'.$logo;
		echo $this->MyHtml->image(''.$imagepath.'', array('alt' => ''.$logo.'','class'=>'logomedium'));
		?>
	     </label></td>
        </tr>

	<tr>
            <td><label><?php echo __('Stuff'); ?></label></td>
            <td><label>		
		<?php if(isset($is_stuff) && $is_stuff==1) { echo 'Yes'; } else { echo 'No';} ?>
	    </label></td>
        </tr>

	<tr>
            <td><label><?php echo __('Lottery drawn Time'); ?></label></td>
            <td><label><?php echo $show_draw_time_str; ?></label></td>
        </tr>

    </table>
    
    <?php echo $this->Form->end(); ?>

</div>