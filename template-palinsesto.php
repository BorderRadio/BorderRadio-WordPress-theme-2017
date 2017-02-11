<?php
/**
* Template Name: Page Palinsesto
*/
get_header(); ?>

			<?php
				$palimpsest = new PalimpsestXML();
				$timestamp = $palimpsest->getTimeStamp();
				$todayId = date('w',$timestamp);
				$id = isset($_GET['id']) ? $_GET['id'] : $todayId;
			?>

	<div class="TabView" id="TabView">


<!-- ***** Tabs ************************************************************ -->

			<div class="Tabs" style="width: 440px;">
  				<a <?=($id == 1) ? 'class="Current"' : 'href="?id=1"';?>>Lunedi</a>
  				<a <?=($id == 2) ? 'class="Current"' : 'href="?id=2"';?>>Martedi</a>
  				<a <?=($id == 3) ? 'class="Current"' : 'href="?id=3"';?>>Mercoledi</a>
  				<a <?=($id == 4) ? 'class="Current"' : 'href="?id=4"';?>>Giovedi</a>
  				<a <?=($id == 5) ? 'class="Current"' : 'href="?id=5"';?>>Venerdi</a>
  				<a <?=($id == 6) ? 'class="Current"' : 'href="?id=6"';?>>Sabato</a>
  				<a <?=($id == 7) ? 'class="Current"' : 'href="?id=0"';?>>Domenica</a>
			</div>


<!-- ***** Pages *********************************************************** -->
			<?php
				require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/border-calendar/lib/palimpsestXML.class.php');
				$arrWeek = Array(SUNDAY,MONDAY,TUESDAY,WEDNESDAY,THURSDAY,FRIDAY,SATURDAY);
				$today = date('l', $timestamp);
				$now = date('H.i', $timestamp);
				for($i = 0; $i < 7; $i++)
				{
					echo '<div class="Pages">'."\n";
					echo '<div class="Page" style="display: '.(($id == $i) ? 'block' : 'none').'"><div class="Pad">'."\n";
					if($id ==$i)
					{
					$schedules = $palimpsest->getSchedules(ASC_ORDER, $arrWeek[$id]);
					foreach($schedules as $schedule)
					{
						if($schedule != NULL)
						{
							$currentStream = $schedule['title'];

							$currentStreamCSS = ' style="color:'.(($today == $arrWeek[$i] && $now >= $schedule['beginTime'] && ($now <= $schedule['endTime'] || $now == T00_00))?'red':'black').'"';
							if (!empty($schedule['link'])) $currentStream = '<a href="'.$schedule['link'].'"'.$currentStreamCSS.'>'.$currentStream.'</a>';
							echo '<p'.$currentStreamCSS.'>'.$schedule['beginTime'].' - '.(($schedule['endTime'] == T23_59)?T00_00:$schedule['endTime']).'<span class="elemento-palinsesto"> '.$currentStream."</span></p>\n";
						}
						else
	   						echo "NULL";
					}
				}
				echo '</div></div></div>';
	            }
                ?>

    </div>
    <div class="img_palinsesto">
    	<img src="<?php bloginfo('template_url'); ?>/images/br_palinsesto.jpg" alt="Border Radio - Just copyleft"  />
    </div>
    <div style="font-size: 10px; clear:both"><strong>Inteno Notte</strong> e <strong>After Mood</strong> sono rotazioni musicali.</div>
<script type="text/javascript" src="../distribution/tab-view.js"></script>
<script type="text/javascript">
tabview_initialize('TabView');
</script>



<?php get_footer(); ?>