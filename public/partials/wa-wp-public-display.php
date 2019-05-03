<?php
/**
 * Provide a public-facing view for the plugin
 */
 // // get data options
 $data = get_option('whatsapp_wpchat');
 if($data['pos']=='1') //bottom right
 {
   $disp='<a href="'. $whatsappApi.'" target="_blank" class="wac-stickytext-br">'.$data['cta'].'<img src="https://www.trippyigloo.com/static/falcon/img/stock/pix.png" style="height:1px;width:1px;" class="wac-wa-br"><div class="wac-wa-br"></div></a>';
   echo $disp;
 }
 else if($data['pos']=='2') //top right
 {
   $disp= '<a href="'. $whatsappApi.'" target="_blank" class="wac-stickytext-tr">'.$data['cta'].'<img src="https://www.trippyigloo.com/static/falcon/img/stock/pix.png" style="height:1px;width:1px;" class="wac-wa-tr"><div class="wac-wa-tr"></div></a>';
   echo $disp;
 }
 else if($data['pos']=='3') //bottom left
 {
   $disp= '<a href="'. $whatsappApi.'" target="_blank" class="wac-stickytext-bl">'.$data['cta'].'<img src="https://www.trippyigloo.com/static/falcon/img/stock/pix.png" style="height:1px;width:1px;" class="wac-wa-bl"><div class="wac-wa-bl"></div></a>';
   echo $disp;
 }
 else if($data['pos']=='4') //top left
 {
   $disp= '<a href="'. $whatsappApi.'" target="_blank" class="wac-stickytext-tl">'.$data['cta'].'<img src="https://www.trippyigloo.com/static/falcon/img/stock/pix.png" style="height:1px;width:1px;" class="wac-wa-tl"><div class="wac-wa-tl"></div></a>';
   echo $disp;
 }
 else if($data['pos']=='5') //middle right
 {
   $disp='<a href="'. $whatsappApi.'" target="_blank" class="wac-stickytext-mr">'.$data['cta'].'<img src="https://www.trippyigloo.com/static/falcon/img/stock/pix.png" style="height:1px;width:1px;" class="wac-wa-mr"><div class="wac-wa-mr"></div></a>';
   echo $disp;
 }
 else {
   // code...
   $disp= '<a href="'. $whatsappApi.'" target="_blank" class="wac-stickytext-br">'.$data["cta"].'<img src="https://www.trippyigloo.com/static/falcon/img/stock/pix.png" style="height:1px;width:1px;" class="wac-wa-br"><div class="wac-wa-br"></div></a>';
   echo $disp;
 }
