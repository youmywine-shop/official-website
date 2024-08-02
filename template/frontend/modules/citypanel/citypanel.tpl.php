

	       <!--normalcategory-->
	       <div class="citypan">
	       <div class="citypanScroll">
		    <ul>
			 <li> <b><font size="+1">▼ CITY AVAILABLE</font></b> <a class="trig_citypan" style="float: right; margin: -16px -16px 0 0; border: 3px solid #660000 !important; opacity: 1 !important;">Close</a></li>
                         <?php
                         foreach ($available_cities as $city) {
                             echo "<li>{$city['state']}";
                             if (!empty($city['city'])) {
                                 echo " » {$city['city']}";
                             }
                             echo "</li>";
                         }
                         ?>
		    </ul>
		    <style>
			 .citypan
			 { height: auto;
			   width: 250px;
			   max-height:100%;
			   position: fixed;
			   top: 68px; left: 0px;  margin-bottom: 30px;
			   z-index: 999999;
			   left: -280px;
			   text-align: left;
			   border: 3px solid #660000; border-radius: 3px; overflow: hidden;
			   box-shadow: 5px 5px 22px #333333, 0 0 222px #333333 inset;
			   background: #a90329;
			   background: -moz-linear-gradient(top, #a90329 0%, #8f0222 44%, #6d0019 100%);
			   background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a90329), color-stop(44%,#8f0222), color-stop(100%,#6d0019));
			   background: -webkit-linear-gradient(top, #a90329 0%,#8f0222 44%,#6d0019 100%);
			   background: -o-linear-gradient(top, #a90329 0%,#8f0222 44%,#6d0019 100%);
			   background: -ms-linear-gradient(top, #a90329 0%,#8f0222 44%,#6d0019 100%);
			   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019',GradientType=0 );
			   overflow: hidden; display: block;
			 }
			 .citypanScroll{ display: block; width:268px; height: 100%; max-height: 493px; overflow-y: scroll; }
			 .citypanScroll>ul { height: 100%; min-height: 100%; padding: 0 0 0 0; margin: 0 0 0 0; overflow-x: hidden; }
			 .citypanScroll>ul>li{ display: block; padding: 12px 12px 12px 12px; border-bottom: 1px dotted #660000;  color: #fff !important;}
		    </style>
		    <script>
			 $( document ).ready(function(){
			      var status_cityp = "closed";
			      $(".trig_citypan").click(function(){
				   if( status_cityp === "closed" || status_cityp !== "open" ){
					$(".citypan").animate({ left: "0", easing: "easeInOutQuint" },550);
					status_cityp = "open";
				   } else {
					$(".citypan").animate({ left: "-300", easing: "easeInOutQuint" },550);
					status_cityp = "closed";
				   }
			      });
			 });
		    </script>
	       </div>
	       </div>

