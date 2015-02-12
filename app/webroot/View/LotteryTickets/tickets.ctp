<?php $this->groupid = $this->Session->read('Auth.User.group_id');?>

<div id="" class="index">    
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('lottery_tab'); ?>    
    <table class="marginTable default-table">
	    <tr>				
		<th><?php echo $this->Paginator->sort('LotteryTicket.id', __('TICKET ID')); ?></th>
		<!-- <th><?php echo $this->Paginator->sort('LotteryTicket.user_id', __('PLAYER USERNAME')); ?></th> -->
		<th><?php echo $this->Paginator->sort('LotteryTicket.ticket_id', __('TICKET BALL')); ?></th>	
		<th><?php echo $this->Paginator->sort('LotteryTicket.stuff_ball', __('STUFF BALL')); ?></th>	
		<th><?php echo $this->Paginator->sort('LotteryTicket.lottery_fee', __('LOTTERY FEE')); ?></th>
		<th><?php echo $this->Paginator->sort('LotteryTicket.is_draw', __('STATUS')); ?></th>
		<th><?php echo $this->Paginator->sort('LotteryTicket.draw_date', __('DRAW DATE')); ?></th>
		<th style="font-size:9px;"><?php echo __('TICKET BALL STATUS'); ?></th>
		<th style="font-size:9px;"><?php echo __('STUFF BALL STATUS'); ?></th>
		<!-- <th><?php echo $this->Paginator->sort('LotteryTicket.added_on', __('ADDED ON')); 
		?></th> --> 
		<th><?php echo $this->Paginator->sort('LotteryTicket.id', __('ACTION')); 
		?></th>
	    </tr>

	    <?php if (!empty($data)){ ?>

	    <?php foreach ($data as $key => $row){
	           
		   $player = $status = $ticket_number = $stuff_ball = $is_active = $is_stuff = $logo = $ticket_id = $lottery_id = $name = $lottery_type_name = $num_lott_ball = $lottery_fee = $draw_time = $is_stuff = $is_active = $prize_level = $jackpotnumber = $matchticketnumber = $winticketnumber = '';
	           
		   $lottery_id		= $row['Lottery']['id'];
		   $name		= $row['Lottery']['name'];
		   $num_lott_ball	= $row['Lottery']['num_lott_ball'];
		   $lottery_fee		= $row['Lottery']['lottery_fee'];
		   $draw_time		= $row['Lottery']['draw_time'];
		   $prize_level		= $row['Lottery']['prize_level'];
		   $logo		= $row['Lottery']['logo'];
		   $ticket_id		= $row['LotteryTicket']['id'];
		   $ticket_number	= $row['LotteryTicket']['ticket_id'];
		   $stuff_ball		= $row['LotteryTicket']['stuff_ball'];
		   $status		= $row['LotteryTicket']['status'];
		   $lottery_type_name   = $row['Lottery']['lottery_type_name'];
		   $player		= $row['User']['username'];
		   $win_ticket		= $row['winData']['win_ticket'];
		   $draw_date		= $row['winData']['draw_date'];
		   if($stuff_ball=='') {		        	
			$jackpotnumber     = '';
			$winticketnumber   = implode('-',explode(',',$win_ticket));
			$matchticketnumber = $win_ticket;			
		   } else if($win_ticket!='' && $win_ticket!=null) {
		       $jackpotnumber      = end(explode(',',$win_ticket));
		       $winticketnumberArr = explode(',',$win_ticket);
		       if(isset($winticketnumberArr)){
		       unset($winticketnumberArr[count($winticketnumberArr)-1]);
		       $winticketnumber    = implode('-',$winticketnumberArr);
		       $matchticketnumber  = implode(',',$winticketnumberArr);
		     }
		   }
		   ?>
                   <tr>
		    <td><?php echo $ticket_id;?></td>
		    <!-- <td><?php echo $player;?></td> -->
		    <td><?php echo $ticket_number; ?></td>
		    <td><?php if($stuff_ball!=''){echo $stuff_ball;} else {echo 'None';}?></td>
		    <td><?php echo $lottery_fee.' '.$currency; ?></td>
		    <td>
		       <?php 
		       if(isset($status) && $status==0){
		          echo '<span class="">Not drawn</span>';
		       } else if(isset($status) && $status==1){		          
		          echo 'Drawn';
		       } else if(isset($status) && $status==2){
		          echo 'Drawn';
		       } else if(isset($status) && $status==3){
		          echo 'Cancel';
		       } else if(isset($status) && $status==4){
		          echo 'Deleted';
		       }
		       ?>
		    </td>

		    <td><?php if($draw_date!='' && $draw_date!='0000-00-00'){echo date('d M Y h:i',strtotime($draw_date));} else { echo '<span class="">Not drawn</span>';} ?></td>

		    <td>
			<?php
			if($matchticketnumber==''){
			    echo '<span class="">Not drawn</span>';
			} else if($ticket_number == $matchticketnumber) {	
			    echo '<span class="colorgreen">Winner</span>';
			} else if($ticket_number != $matchticketnumber) {
			    echo '<span class="colorred">Lost</span>';
			}
			?>
		    </td>

		    <td>
			<?php
			if($stuff_ball=='') {
			   echo 'Not available';
			} else if($jackpotnumber==''){
			    echo '<span class="">Not drawn</span>';
			} else if($stuff_ball == $jackpotnumber) {
			   echo '<span class="colorgreen">Winner</span>';
			} else if($stuff_ball != $jackpotnumber) {
			    echo '<span class="colorred">Lost</span>';
			}
			?>
		    </td>

		    <!-- <td><?php echo date('d M Y h:i',strtotime($row['LotteryTicket']['added_on'])); ?></td> -->
		    
		    <td>
			<?php echo $this->MyHtml->spanLink(__('View'), array('action' => 'view',$ticket_id,'history'), array('class' => '')); ?>
		    </td>

                </tr>

            <?php } ?> 
	    
	    <?php if(isset($totalitemsPage) && isset($itemsPerPage) && $totalitemsPage > $itemsPerPage){?>
	    <tr>
		<td colspan="10">
		    <?php echo $this->element('paginator'); ?>  
		</td>
	    </tr>		    
	    <?php } ?>     
	
	 <?php } else { ?>

	   <tr><td colspan="11"></td></tr>
	   <tr>
	       <td colspan="11">
	           <?php echo __('There are no records'); ?>
	       </td>   
	   </tr>  
	
        <?php } ?>

    </table>
    
</div>