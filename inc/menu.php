<?php

function menu($sessi){
    if($sessi!='')
    $sessi='admin';
    
	switch($sessi){
		case 'admin': {
	

?>




 <div class=" well sidebar-nav" >
            <ul class="nav nav-list ">
       
            
             <li class="nav-header">Meals</li>
            
         
            
           
          
            <li>
            <a href="index.php?mod=UserInfo&pg=UserInfo_view"> <i class='icon-folder-close'></i>User List</a>
            </li>
            
              <li>
            <a href="index.php?mod=BazarList&pg=BazarList_view"> <i class='icon-folder-close'></i> Bazar List</a>
            </li>
          
            <li>
            <a href="index.php?mod=Meals&pg=Meals_view"> <i class='icon-folder-close'></i>Assign  Meals </a>
            </li>
            
               <li>
            <a href="index.php?mod=MonthlyMealDetails&pg=MonthlyMealDetails_view&d=  <?php echo 	$rows -> ID;?>                      "  title="Halaman Depan"><i class='icon-home'></i>Meal Details</a>
            </li>
          
          
   
        
                 <li>
            <a href="index.php?mod=Others&pg=DateWiseMeals_view"> <i class='icon-folder-close'></i>Date Wise Meals</a>
            </li>
            
            
            
           
               <li>
            <a href="index.php?mod=Others&pg=MealRateMonthWise"  title="Halaman Depan"><i class='icon-home'></i>Meal Rate</a>
            </li>
          
            
                

            
            
            
            <!--<li>-->
            <!--<li class="nav-header">Location</li>-->
            <!--<li>			-->
            <!--<a href="index.php?mod=Hospital&pg=Hospital_view"> <i class='icon-home'></i>Hospitals</a>-->
            <!--</li>-->
            
            <!--<li>-->
            
            <!--<a href="index.php?mod=FillingStation&pg=FillingStation_view"> <i class='icon-tint'></i>Filling Station</a>-->
            <!--</li>-->
            
            
            <!--<li>-->
            
            <!--<a href="index.php?mod=Police&pg=Police_view"> <i class='icon-list'></i>Ploice Station</a>-->
            <!--</li>-->
            
            
            <!--<li class="nav-header">System</li>-->
            
            
            <!--<li>-->
            <!--<a href="index.php?mod=admin&pg=admin_view"><i class='icon-user'></i> Admin</a>-->
            <!--</li>-->
            
            
            
            </ul>
            </div>
        </div>
<?php		}
			break;

			default:
			{?>
			
			
			

             </div>
<?php
} //end of case no login;
} //end of switch
} //end of function
